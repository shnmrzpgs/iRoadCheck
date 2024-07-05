const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const passwordRequirements = document.getElementById('password-requirements');
const passwordError = document.getElementById('password-error');
const confirmPasswordError = document.getElementById('confirm-password-error');
const specialChar = document.getElementById('special-char');
const minChar = document.getElementById('min-char');
const numChar = document.getElementById('num-char');

    // Password requirements function
    function validatePasswordRequirements(password) {
        const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        const hasMinLength = password.length >= 8;
        const hasNumber = /[0-9]/.test(password);

        specialChar.style.color = hasSpecialChar ? 'green' : 'inherit';
        minChar.style.color = hasMinLength ? 'green' : 'inherit';
        numChar.style.color = hasNumber ? 'green' : 'inherit';

        return hasSpecialChar && hasMinLength && hasNumber;
    }

    // Event listeners for input validation
    emailInput.addEventListener('input', function() {
        emailError.classList.add('invisible');
    });

    passwordInput.addEventListener('input', function() {
        passwordError.classList.add('invisible');
        const isValidPassword = validatePasswordRequirements(passwordInput.value);
        passwordRequirements.classList.toggle('invisible', passwordInput.value === '');
        passwordRequirements.style.display = passwordInput.value === '' ? 'none' : 'block';
    });

    confirmPasswordInput.addEventListener('input', function() {
        confirmPasswordError.classList.add('invisible');
    });

// Form submission
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    const isValidEmail = emailInput.checkValidity();
    const isValidPassword = validatePasswordRequirements(passwordInput.value);
    const passwordsMatch = passwordInput.value === confirmPasswordInput.value;

    emailError.classList.toggle('invisible', isValidEmail);
    passwordError.classList.toggle('invisible', isValidPassword);
    confirmPasswordError.classList.toggle('invisible', passwordsMatch);

    if (isValidEmail && isValidPassword && passwordsMatch) {
        // Perform registration or form submission logic here
        alert('Form submitted successfully!');
    }
});