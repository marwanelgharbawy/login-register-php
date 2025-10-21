switchButton = document.getElementById('switch')
submitButton = document.getElementById('submit_button')
confirmPasswordLabel = document.getElementById('confirm_password_label')
confirmPasswordField = document.getElementById('confirm_password')
formTitle = document.getElementById('form_title')
actionTypeField = document.getElementById('action_type')

// Button to switch between login and register
switchButton.addEventListener('click', function() {
    if (this.value === "Don't have an account? Register") {
        this.value = "Already have an account? Login";
        confirmPasswordField.style.display = "inline";
        confirmPasswordLabel.style.display = "inline";
        confirmPasswordField.required = true;   
        submitButton.value = "Register";
        formTitle.textContent = "Register";
        actionTypeField.value = "register";
    } else {
        this.value = "Don't have an account? Register";
        confirmPasswordField.style.display = "none";
        confirmPasswordLabel.style.display = "none";
        confirmPasswordField.required = false;
        submitButton.value = "Login";
        formTitle.textContent = "Login";
        actionTypeField.value = "login";
    }
});