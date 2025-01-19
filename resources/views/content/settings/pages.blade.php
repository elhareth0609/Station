@extends('layouts.app')

@section('title', __('Pages'))

@section('content')

<div class="accordion accordion-v1 {{ app()->getLocale() == 'ar' ? 'accordion-rtl' : '' }}" id="appInfoAccordion">
    <!-- Android App Info -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="androidHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#androidCollapse" aria-expanded="false" aria-controls="androidCollapse">
                <span class="mdi mdi-android mdi-24px {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></span>
                Android App Info
            </button>
        </h2>
        <div id="androidCollapse" class="accordion-collapse collapse" aria-labelledby="androidHeading" data-bs-parent="#appInfoAccordion">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="android-version" class="form-label">Version:</label>
                        <input type="text" class="form-control" id="android-version" value="1.0.0">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="android-release-date" class="form-label">Release Date:</label>
                        <input type="date" class="form-control" id="android-release-date" value="2023-10-01">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="android-features" class="form-label">Features:</label>
                        <textarea class="form-control" id="android-features">Feature 1\nFeature 2\nFeature 3</textarea>
                    </div>
                </div>
            </div>
            <div class="accordion-footer p-2 {{ app()->getLocale() == 'ar' ? 'text-start' : 'text-end' }}">
                <button class="btn btn-primary">
                    <span class="mdi mdi-content-save"></span>
                    Save Changes
                </button>
            </div>
        </div>
    </div>
    <!-- iOS App Info -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="iosHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iosCollapse" aria-expanded="false" aria-controls="iosCollapse">
                <span class="mdi mdi-apple mdi-24px {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></span>
                iOS App Info
            </button>
        </h2>
        <div id="iosCollapse" class="accordion-collapse collapse" aria-labelledby="iosHeading" data-bs-parent="#appInfoAccordion">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="ios-version" class="form-label">Version:</label>
                        <input type="text" class="form-control" id="ios-version" value="1.0.0">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="ios-release-date" class="form-label">Release Date:</label>
                        <input type="date" class="form-control" id="ios-release-date" value="2023-10-01">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="ios-features" class="form-label">Features:</label>
                        <textarea class="form-control" id="ios-features">Feature 1\nFeature 2\nFeature 3</textarea>
                    </div>
                </div>
            </div>
            <div class="accordion-footer p-2 {{ app()->getLocale() == 'ar' ? 'text-start' : 'text-end' }}">
                <button class="btn btn-primary">
                    <span class="mdi mdi-content-save"></span>
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>


<div class="accordion accordion-v1 {{ app()->getLocale() == 'ar' ? 'accordion-rtl' : '' }} mt-3" id="pagesAccordion">
    <!-- Terms of Use -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="termsOfUseHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#termsOfUseCollapse" aria-expanded="false" aria-controls="termsOfUseCollapse">
                <span class="mdi mdi-file-document-outline mdi-24px {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></span>
                Terms of Use
            </button>
        </h2>
        <div id="termsOfUseCollapse" class="accordion-collapse collapse" aria-labelledby="termsOfUseHeading" data-bs-parent="#pagesAccordion">
            <div class="accordion-body">
                <label for="termsOfUseContent" class="form-label">Content:</label>
                <textarea id="termsOfUseContent" class="form-control">
This is the content for Terms of Use. You can edit this text directly in the textarea.
                </textarea>
            </div>
            <div class="accordion-footer p-2 {{ app()->getLocale() == 'ar' ? 'text-start' : 'text-end' }}">
                <button class="btn btn-primary">
                    <span class="mdi mdi-content-save"></span>
                    Save Changes
                </button>
            </div>
        </div>
    </div>
    <!-- About Us -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="aboutUsHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aboutUsCollapse" aria-expanded="false" aria-controls="aboutUsCollapse">
                <span class="mdi mdi-information-outline mdi-24px {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></span>
                About Us
            </button>
        </h2>
        <div id="aboutUsCollapse" class="accordion-collapse collapse" aria-labelledby="aboutUsHeading" data-bs-parent="#pagesAccordion">
            <div class="accordion-body">
                <label for="aboutUsContent" class="form-label">Content:</label>
                <textarea id="aboutUsContent" class="form-control">
This is the content for About Us. You can edit this text directly in the textarea.
                </textarea>
                <div class="accordion-footer p-2 {{ app()->getLocale() == 'ar' ? 'text-start' : 'text-end' }}">
                    <button class="btn btn-primary">
                        <span class="mdi mdi-content-save"></span>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Privacy and Policy -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="privacyPolicyHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacyPolicyCollapse" aria-expanded="false" aria-controls="privacyPolicyCollapse">
                <span class="mdi mdi-shield-lock-outline mdi-24px {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></span>
                Privacy and Policy
            </button>
        </h2>
        <div id="privacyPolicyCollapse" class="accordion-collapse collapse" aria-labelledby="privacyPolicyHeading" data-bs-parent="#pagesAccordion">
            <div class="accordion-body">
                <label for="privacyPolicyContent" class="form-label">Content:</label>
                <textarea id="privacyPolicyContent" class="form-control">
This is the content for Privacy and Policy. You can edit this text directly in the textarea.
                </textarea>
                <div class="accordion-footer p-2 {{ app()->getLocale() == 'ar' ? 'text-start' : 'text-end' }}">
                    <button class="btn btn-primary">
                        <span class="mdi mdi-content-save"></span>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delivery -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="deliveryHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#deliveryCollapse" aria-expanded="false" aria-controls="deliveryCollapse">
                <span class="mdi mdi-truck-delivery-outline mdi-24px {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></span>
                Delivery
            </button>
        </h2>
        <div id="deliveryCollapse" class="accordion-collapse collapse" aria-labelledby="deliveryHeading" data-bs-parent="#pagesAccordion">
            <div class="accordion-body">
                <label for="deliveryContent" class="form-label">Content:</label>
                <textarea id="deliveryContent" class="form-control">
This is the content for Delivery. You can edit this text directly in the textarea.
                </textarea>
                <div class="accordion-footer p-2 {{ app()->getLocale() == 'ar' ? 'text-start' : 'text-end' }}">
                    <button class="btn btn-primary">
                        <span class="mdi mdi-content-save"></span>
                        Save Changes
                    </button>
                </div>    
            </div>
        </div>
    </div>
    <!-- Secure Payment -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="securePaymentHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#securePaymentCollapse" aria-expanded="false" aria-controls="securePaymentCollapse">
                <span class="mdi mdi-credit-card-lock-outline mdi-24px {{ app()->getLocale() == 'ar' ? 'ms-2' : 'me-2' }}"></span>
                Secure Payment
            </button>
        </h2>
        <div id="securePaymentCollapse" class="accordion-collapse collapse" aria-labelledby="securePaymentHeading" data-bs-parent="#pagesAccordion">
            <div class="accordion-body">
                <label for="securePaymentContent" class="form-label">Content:</label>
                <textarea id="securePaymentContent" class="form-control">
This is the content for Secure Payment. You can edit this text directly in the textarea.
                </textarea>
                <div class="accordion-footer p-2 {{ app()->getLocale() == 'ar' ? 'text-start' : 'text-end' }}">
                    <button class="btn btn-primary">
                        <span class="mdi mdi-content-save"></span>
                        Save Changes
                    </button>
                </div>    
            </div>
        </div>
    </div>
</div>

@endsection
