<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Wizard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Icons -->
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
      padding: 2rem;
    }
    .wizard {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }
    .wizard-step {
      display: flex;
      align-items: center;
      flex: 1;
    }
    .wizard-step .step-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #e9ecef;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 0.5rem;
    }
    .wizard-step.active .step-icon {
      background-color: #0d6efd;
      color: white;
    }
    .wizard-step.completed .step-icon {
      background-color: #198754;
      color: white;
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
    .wizard-step .step-arrow {
      margin: 0 1rem;
      color: #6c757d;
    }
    .wizard-content {
      background-color: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <!-- Wizard Steps -->
  <div class="wizard">
    <!-- Step 1: Cart -->
    <div class="wizard-step active">
      <div class="step-icon">
        <i class="mdi mdi-cart"></i>
      </div>
      <div class="step-text">Cart</div>
      <div class="step-arrow">
        <i class="mdi mdi-chevron-right"></i>
      </div>
    </div>

    <!-- Step 2: Address -->
    <div class="wizard-step">
      <div class="step-icon">
        <i class="mdi mdi-map-marker"></i>
      </div>
      <div class="step-text">Address</div>
      <div class="step-arrow">
        <i class="mdi mdi-chevron-right"></i>
      </div>
    </div>

    <!-- Step 3: Payment -->
    <div class="wizard-step">
      <div class="step-icon">
        <i class="mdi mdi-credit-card"></i>
      </div>
      <div class="step-text">Payment</div>
      <div class="step-arrow">
        <i class="mdi mdi-chevron-right"></i>
      </div>
    </div>

    <!-- Step 4: Finish -->
    <div class="wizard-step">
      <div class="step-icon">
        <i class="mdi mdi-check-circle"></i>
      </div>
      <div class="step-text">Finish</div>
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

  <!-- Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>