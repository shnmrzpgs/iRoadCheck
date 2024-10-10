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
        clearError(); // Clear error when moving to a new step
    }

    // Custom validation for age and phone number
    function validateStep() {
        const currentForm = steps[currentStep].querySelector('form');

        if (!currentForm.reportValidity()) {
            return false;  // Built-in validation fails
        }

        // Custom validation for birthdate (Step 1)
        if (currentStep === 0) {
            const birthdateInput = document.getElementById('birthdate');
            if (!validateAge(birthdateInput.value)) {
                displayError('You must be at least 18 years old.');
                return false;
            }
        }

        // Custom validation for phone number format (Step 2)
        if (currentStep === 1) {
            const phoneInput = document.getElementById('phone');
            if (!validatePhoneNumber(phoneInput.value)) {
                displayError('Please enter a valid phone number in the +63 format.');
                return false;
            }
        }

        return true;  // Everything is valid
    }

    // Function to validate age (must be 18+)
    function validateAge(birthdate) {
        const birthDate = new Date(birthdate);
        const today = new Date();
        const age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();

        // Adjust age if the birthday hasn't occurred yet this year
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        return age >= 18;  // Return true if 18 or older
    }

    // Function to validate phone number format
    function validatePhoneNumber(phone) {
        const phoneRegex = /^\+63\d{10}$/;  // Matches +63 followed by 10 digits
        return phoneRegex.test(phone);
    }

    // Display error message
    function displayError(message) {
        const errorContainer = document.querySelector('.error-message');
        errorContainer.textContent = message;
        errorContainer.classList.remove('invisible');
    }

    // Clear error message
    function clearError() {
        const errorContainer = document.querySelector('.error-message');
        errorContainer.textContent = '';
        errorContainer.classList.add('invisible');
    }

    function nextStep() {
        if (validateStep()) {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
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








//PSGC DON'T TOUCH


function updateProvinces() {
    const country = document.getElementById('country').value;
    if (country === 'PH') {
        fetch('https://psgc-api.ph/provinces')
            .then(response => response.json())
            .then(data => {
                const provinceSelect = document.getElementById('province');
                provinceSelect.innerHTML = '<option value="" hidden>Select province</option>';
                data.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.code;
                    option.text = province.name;
                    provinceSelect.appendChild(option);
                });
            });
    }
}

function updateCities() {
    const provinceCode = document.getElementById('province').value;
    fetch(`https://psgc-api.ph/cities?provinceCode=${provinceCode}`)
        .then(response => response.json())
        .then(data => {
            const citySelect = document.getElementById('city');
            citySelect.innerHTML = '<option value="" hidden>Select city/municipality</option>';
            data.forEach(city => {
                const option = document.createElement('option');
                option.value = city.code;
                option.text = city.name;
                citySelect.appendChild(option);
            });
        });
}

function updateBarangays() {
    const cityCode = document.getElementById('city').value;
    fetch(`https://psgc-api.ph/barangays?cityCode=${cityCode}`)
        .then(response => response.json())
        .then(data => {
            const barangaySelect = document.getElementById('barangay');
            barangaySelect.innerHTML = '<option value="" hidden>Select barangay</option>';
            data.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.code;
                option.text = barangay.name;
                barangaySelect.appendChild(option);
            });
        });
}
