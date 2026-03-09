<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormValidationController extends Controller
{
    public function store(Request $request, string $formId)
    {
        $form = Auth::user()->forms()->findOrFail($formId);

        $request->validate([
            'field_name'  => 'required|string|max:255',
            'field_type'  => 'required|in:text,email,number',
            'is_required' => 'nullable|boolean',
            'min_length'  => 'nullable|integer|min:1',
            'max_length'  => 'nullable|integer|min:1',
        ]);

        $validation = FormValidation::create([
            'form_id'     => $form->id,
            'field_name'  => $request->field_name,
            'field_type'  => $request->field_type,
            'is_required' => $request->is_required ?? false,
            'min_length'  => $request->min_length,
            'max_length'  => $request->max_length,
        ]);

        return response()->json($validation, 201);
    }

    public function update(Request $request, string $formId, string $id)
    {
        $form       = Auth::user()->forms()->findOrFail($formId);
        $validation = FormValidation::where('form_id', $form->id)->findOrFail($id);

        $request->validate([
            'field_name'  => 'required|string|max:255',
            'field_type'  => 'required|in:text,email,number',
            'is_required' => 'nullable|boolean',
            'min_length'  => 'nullable|integer|min:1',
            'max_length'  => 'nullable|integer|min:1',
        ]);

        $validation->update([
            'field_name'  => $request->field_name,
            'field_type'  => $request->field_type,
            'is_required' => $request->is_required ?? false,
            'min_length'  => $request->min_length,
            'max_length'  => $request->max_length,
        ]);

        return response()->json($validation);
    }

    public function destroy(string $formId, string $id)
    {
        $form       = Auth::user()->forms()->findOrFail($formId);
        $validation = FormValidation::where('form_id', $form->id)->findOrFail($id);
        $validation->delete();

        return response()->json(['success' => true]);
    }
}