nameField = document.getElementById('name')
emailField = document.getElementById('email')
passwordField = document.getElementById('password')
confirmPasswordField = document.getElementById('confirm_password')
errorMessageDiv = document.getElementById('error_message')

// Hidden field to determine action type
action = document.getElementById('action_type').value

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    // For login, only email and password are required
    if (action === 'login' || action === 'register') {
        if (!emailField.value || !passwordField.value) {
            errorMessageDiv.textContent = 'Fields cannot be empty.';
            return;
        }

        if (!validateEmail(emailField)) {
            errorMessageDiv.textContent = 'Invalid email address.';
            return;
        }

        if (passwordField.value.length < 8) {
        errorMessageDiv.textContent = 'Password must be at least 8 characters long.';
        return;
        }

        // The extra validation for registration 
        if (action === 'register') {
            if (!nameField.value || !confirmPasswordField.value) {
                errorMessageDiv.textContent = 'Fields cannot be empty.';
               return;
            }

            if (passwordField.value !== confirmPasswordField.value) {
                errorMessageDiv.textContent = 'Passwords do not match.';
                return;
            }
        }   
    } else {
        // Should be unreachable
        errorMessageDiv.textContent = 'Unknown action.';
        return;
    }

    this.submit();
});

function validateEmail(email) {
    const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if (email.value.match(emailPattern)) {
        return true;
    } else {
        return false;
    }
}