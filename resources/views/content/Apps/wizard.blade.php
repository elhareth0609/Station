@extends('layouts.app')

@section('title', __('Wizard'))

@section('content')

  <style>
    .wizard {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin-bottom: 2rem;
    }
    .wizard-step {
      display: flex;
      align-items: center;
    }
    .wizard-step .step-icon {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 0.5rem;
    }
    .wizard-step .step-text {
      font-size: 0.9rem;
      color: #6c757d;
    }
    .wizard-step.active .step-text {
      color: #000;
      font-weight: bold;
    }
    .wizard-step.completed .step-text {
      color: #198754;
    }
    .wizard .step-arrow {
      width: 28px;
      height: 28px;
      color: #6c757d;
    }
    /* .wizard-content {
      background-color: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    } */
  </style>

<div class="card">
  <div class="card-body">

  <!-- Wizard Steps -->
<div class="wizard">
  <!-- Step 1: Cart -->
  <div class="wizard-step active">
    <div class="step-icon">
      <img class="w-100" src="{{ asset('assets/my/icons/wizard/shopping-basket-purchase.svg') }}" alt="Cart Icon" />
    </div>
    <h4 class="mb-0 text-dark">Cart</h4>
  </div>
  <div class="step-arrow">
    <img class="w-100" src="{{ asset('assets/my/icons/wizard/right-2.svg') }}" alt="Cart Icon" />
  </div>

  <!-- Step 2: Address -->
  <div class="wizard-step">
    <div class="step-icon">
      <img class="w-100" src="{{ asset('assets/my/icons/wizard/tracking-track.svg') }}" alt="Cart Icon" />
    </div>
    <h4 class="mb-0 text-secondary">Address</h4>
  </div>
  <div class="step-arrow">
    <img class="w-100" src="{{ asset('assets/my/icons/wizard/right-2.svg') }}" alt="Cart Icon" />
  </div>

  <!-- Step 3: Payment -->
  <div class="wizard-step">
    <div class="step-icon">
      <img class="w-100" src="{{ asset('assets/my/icons/wizard/payment-method-bank.svg') }}" alt="Cart Icon" />
    </div>
    <h4 class="mb-0 text-secondary">Payment</h4>
  </div>
  <div class="step-arrow">
    <img class="w-100" src="{{ asset('assets/my/icons/wizard/right-2.svg') }}" alt="Cart Icon" />
  </div>

  <!-- Step 4: Finish -->
  <div class="wizard-step">
    <div class="step-icon">
      <img class="w-100" src="{{ asset('assets/my/icons/wizard/trolley-box.svg') }}" alt="Cart Icon" />
    </div>
    <h4 class="mb-0 text-secondary">Finish</h4>
  </div>
</div>

  <!-- Wizard Content -->
<div class="wizard-content">
  <!-- Step 1: Cart Content -->
  <div id="step1" class="wizard-step-content">
    <h3>Cart</h3>
    <p>Review your cart items.</p>
    <button class="btn btn-primary" onclick="nextStep(2)">Next</button>
  </div>

  <!-- Step 2: Address Content -->
  <div id="step2" class="wizard-step-content" style="display: none;">
    <h3>Address</h3>
    <p>Enter your shipping address.</p>
    <button class="btn btn-secondary" onclick="previousStep(1)">Previous</button>
    <button class="btn btn-primary" onclick="nextStep(3)">Next</button>
  </div>

  <!-- Step 3: Payment Content -->
  <div id="step3" class="wizard-step-content" style="display: none;">
    <h3>Payment</h3>
    <p>Enter your payment details.</p>
    <button class="btn btn-secondary" onclick="previousStep(2)">Previous</button>
    <button class="btn btn-primary" onclick="nextStep(4)">Next</button>
  </div>

  <!-- Step 4: Finish Content -->
  <div id="step4" class="wizard-step-content" style="display: none;">
    <h3>Finish</h3>
    <p>Your order has been placed successfully!</p>
    <button class="btn btn-secondary" onclick="previousStep(3)">Previous</button>
    <button class="btn btn-success" onclick="resetWizard()">Finish</button>
  </div>
</div>

  </div>
</div>

  <!-- Custom JS for Wizard -->
  <script>
    function nextStep(step) {
      // Hide all steps
      document.querySelectorAll('.wizard-step-content').forEach(el => {
        el.style.display = 'none';
      });

      // Show the current step
      document.getElementById(`step${step}`).style.display = 'block';

      // Update wizard steps
      updateWizardSteps(step);
    }

    function previousStep(step) {
      // Hide all steps
      document.querySelectorAll('.wizard-step-content').forEach(el => {
        el.style.display = 'none';
      });

      // Show the previous step
      document.getElementById(`step${step}`).style.display = 'block';

      // Update wizard steps
      updateWizardSteps(step);
    }

    function updateWizardSteps(step) {
      // Reset all steps
      document.querySelectorAll('.wizard-step').forEach(el => {
        el.classList.remove('active', 'completed');
      });

      // Mark current and previous steps
      for (let i = 1; i <= step; i++) {
        const stepElement = document.querySelector(`.wizard-step:nth-child(${i})`);
        if (i === step) {
          stepElement.classList.add('active');
        } else {
          stepElement.classList.add('completed');
        }
      }
    }

    function resetWizard() {
      // Reset to step 1
      nextStep(1);
    }

    // Initialize wizard
    document.addEventListener('DOMContentLoaded', () => {
        nextStep(1);
    });
  </script>

@endsection