<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormButtonController extends Controller
{
    /**
     * Dashboard embed page — show the copy-paste snippet.
     */
    public function embed($id)
    {
        $form = Form::findOrFail($id);

        abort_if($form->user_id !== auth()->id(), 403);

        return response()->view('forms.embed', [
            'form'      => $form,
            'widgetUrl' => route('formbutton.widget', $form->slug),
        ]);
    }

    /**
     * Public widget endpoint — serves the configured JS file.
     * Called by the user's website via the <script> tag.
     */
    public function widget(string $slug)
    {
        $form = Form::where('slug', $slug)->firstOrFail();

        $config = array_merge([
            'title'       => 'Contact Us',
            'description' => "We'll get back to you as soon as possible.",
            'buttonColor' => '#166d49',
            'buttonText'  => 'Contact',
        ], $form->popup_config ?? []);

        // Points to the existing form submit route
        // Widget sends captcha_verified=1 and _captcha=disabled to bypass captcha redirect
        $actionUrl = url('/f/' . $form->slug);

        $js = view('formbutton.widget', compact('form', 'config', 'actionUrl'))->render();

        return response($js, 200)
            ->header('Content-Type', 'application/javascript')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
            ->header('Cache-Control', 'no-store');
    }

    /**
     * Save popup config from dashboard settings form.
     */
    public function saveConfig(Request $request, $id)
    {
        $form = Form::findOrFail($id);

        abort_if($form->user_id !== auth()->id(), 403);

        $validated = $request->validate([
            'title'       => 'nullable|string|max:80',
            'description' => 'nullable|string|max:200',
            'buttonColor' => 'nullable|regex:/^#[0-9a-fA-F]{6}$/',
            'buttonText'  => 'nullable|string|max:30',
        ]);

        $form->update(['popup_config' => $validated]);

        return back()->with('success', 'Popup settings saved.');
    }
}