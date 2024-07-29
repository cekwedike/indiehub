document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Add login form validation logic here
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    if (email && password) {
        alert('Login successful');
        // Redirect to another page or perform further actions
    } else {
        alert('Please fill in all fields');
    }
});

document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Add registration form validation logic here
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const role = document.getElementById('role').value;
    if (name && email && password && role) {
        alert('Registration successful');
        // Redirect to another page or perform further actions
    } else {
        alert('Please fill in all fields');
    }
});
