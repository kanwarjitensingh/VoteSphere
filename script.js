// Switch between login and signup
function switchTab(tabName) {
    var i, tabcontent;
    
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }

    document.getElementById(tabName).classList.add("active");
}

// Redirect to homepage after login or signup
function redirectToHomepage() {
    window.location.href = "homepage.html";  // Redirect to homepage
}

// Handle login form submission
function handleLogin(event) {
    event.preventDefault(); // Prevent the default form submission

    const username = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;

    if (username && password) {
        // You can add login validation logic here (like checking against a database)
        redirectToHomepage();  // Redirect to homepage after successful login
    } else {
        alert("Please enter both username and password");
    }
}

// Handle signup form submission
function handleSignup(event) {
    event.preventDefault(); // Prevent the default form submission

    const username = document.getElementById('signup-username').value;
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;

    if (username && email && password) {
        // You can add signup validation logic here (like saving user data)
        switchTab('login');  // Switch to login tab after successful signup
        alert("Signup successful! Please log in.");
    } else {
        alert("Please fill in all fields");
    }
}

// Default tab on page load
document.addEventListener("DOMContentLoaded", function () {
    switchTab('signup');  // Show signup tab by default
});