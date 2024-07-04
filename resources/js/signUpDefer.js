window.initializedSignUpDefer = function initializedSignUpDefer() {
    const steps = document.querySelectorAll('.step');
    const indicators = document.querySelectorAll('.step-indicator div');
    let currentStep = 0;

    function updateStepIndicator() {
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('current', index === currentStep);
            if (index < currentStep) {
                indicator.classList.add('done');
            } else {
                indicator.classList.remove('done');
            }
        });
    }

    function showStep(step) {
        steps.forEach((s, index) => {
            s.classList.toggle('hidden', index !== step);
        });
        updateStepIndicator();
    }

    function nextStep() {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }

    document.querySelectorAll('.next').forEach(button => {
        button.addEventListener('click', nextStep);
    });

    document.querySelectorAll('.prev').forEach(button => {
        button.addEventListener('click', prevStep);
    });

    showStep(currentStep);
}