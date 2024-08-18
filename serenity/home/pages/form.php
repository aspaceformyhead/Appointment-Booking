<link rel="stylesheet" href="serenity\static\css\forms.css">


<head>

    <link href="https://fonts.cdnfonts.com/css/perpetua-titling-mt" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div>
    <div class="blob"></div>
    <div class="blob"></div>
    <div class="blob"></div>
    <div class="blob"></div>
    <div class="blob"></div>
    <div class="blob"></div>

</div>
<div class="container">
    <div class="login-form show" id="login-form">
        <h2 id="form-title">Login</h2>
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <a href="" id="forgot-password">Forgot Password?</a>
            <button type="submit" class="primary" id="login-submit-btn">LOGIN</button>
            <h3>OR</h3>
            <button type="button" class="secondary" id="login-toggle-btn">SIGN UP</button>
        </form>
    </div>
    <div class="login-form hide" id="signup-form">
        <h2 id="form-title-signup">Sign Up</h2>
        <form>
            <label for="signup-email">Email:</label>
            <input type="email" id="signup-email" name="signup-email" required>
            <label for="signup-password">Password:</label>
            <input type="password" id="signup-password" name="signup-password" required>
            <label for="signup-confirm-password">Confirm Password:</label>
            <input type="password" id="signup-confirm-password" name="signup-confirm-password" required>
            <button type="submit" class="primary" id="signup-submit-btn">SIGN UP</button>
            <h3>OR</h3>
            <button type="button" class="secondary" id="signup-toggle-btn">LOGIN</button>
        </form>
    </div>



</div>

<script>const loginToggleBtn = document.getElementById('login-toggle-btn'); // Changed ID
    const signupToggleBtn = document.getElementById('signup-toggle-btn'); // Changed ID
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');

    loginToggleBtn.addEventListener('click', function () {
        // Switching from Login to Sign Up
        loginForm.classList.remove('show');
        loginForm.classList.add('hide');
        signupForm.classList.remove('hide');
        signupForm.classList.add('show');
    });

    signupToggleBtn.addEventListener('click', function () { // Added event listener for signup form toggle
        // Switching from Sign Up to Login
        signupForm.classList.remove('show');
        signupForm.classList.add('hide');
        loginForm.classList.remove('hide');
        loginForm.classList.add('show');
    }); 
</script>