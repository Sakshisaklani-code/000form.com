@extends('layouts.app')

@section('title', 'Terms - 000forms')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16 mt-8 mb-16">

    <div class="mb-12 text-center mt-4">
        <h1 class="text-4xl font-bold text-white">Refund Policy for 000form.com</h1>
        <p class="text-sm text-gray-400 mt-2">Last updated: March 23, 2026</p>
    </div>

    <div class="space-y-10 text-gray-300 leading-relaxed text-base">

        <p>
            Thank you for using <strong class="text-white">000form.com</strong>! These Terms of Service ("Terms") govern your ! We strive to provide a high-quality online form creation and management service. The Service is owned and operated by <strong class="text-white">172 Tech</strong> and developed by <strong class="text-white">ESS ENN Associates</strong>.
        </p>


        {{-- Service Description --}}
        <section>
            <h2 class="text-2xl font-bold text-white mb-4 pb-2 border-b border-gray-700">No Refunds Policy</h2>
            <p>
                All purchases and payments made for our services, including but not limited to subscriptions, one-time fees, or in-app purchases, are non-refundable. Once a payment is processed, you will not be entitled to a refund for any reason, including but not limited to:
            </p>
        </section>

        {{-- User Content --}}
        <section>
            <h2 class="text-2xl font-bold text-white mb-4 pb-2 border-b border-gray-700">Dissatisfaction with the Service.</h2>
            <p class="mb-4">
                Non-usage of the Service after purchase.Changes to the features of the Service.Cancellation or termination of your account.Any technical issues that may arise, unless we are unable to resolve them.
            </p>
            <p class="mb-8">
                We encourage you to use our free features or trial periods (if available) to evaluate the Service before making a purchase.
            </p>
        </section>


    </div>

    {{-- Contact --}}
        <section>
            <h2 class="text-2xl font-bold text-white mb-4 pb-2 border-b border-gray-700">Contact Us</h2>
            <p>If you have any questions about this policy, please contact us at:</p>
            <ul class="mt-4 space-y-2 text-gray-300">
                <li>
                    <span class="text-green-400 font-semibold">Email:</span>
                    <a href="mailto:info@172tech.com" class="text-green-400 hover:text-green-300 underline ml-1">info@172tech.com</a>
                </li>
                <li>
                    <span class="text-green-400 font-semibold">Mail:</span>
                    <span class="ml-1">SCO 197, Sector 7C, Chandigarh, India - 160019</span>
                </li>
            </ul>
        </section>
</div>
@endsection