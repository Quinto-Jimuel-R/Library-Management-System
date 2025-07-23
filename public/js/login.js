const form = document.getElementById('loginForm');
const loginButton = document.getElementById('loginButton');
const buttonSpinner = document.getElementById('buttonSpinner');
const buttonText = document.getElementById('buttonTextLogin');

form.addEventListener('submit', function () {
    // Disable the button
    loginButton.disabled = true;

    // Show spinner and hide text
    buttonSpinner.classList.remove('hidden');
    buttonText.classList.add('hidden');
});

const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    toggleButton.addEventListener('click', () => {
        const isPassword = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
        
        // Toggle the icon
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });