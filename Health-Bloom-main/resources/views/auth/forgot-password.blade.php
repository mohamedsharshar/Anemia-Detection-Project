<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health & Clinic Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .auth-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .auth-card h1 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 1.5rem;
        }
        .auth-card img {
            width: 80px;
            margin-bottom: 1rem;
        }
        .auth-card input {
            width: 100%;
            padding: 12px 0px 12px 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }
        .auth-card button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 1rem;
        }
        .auth-card button:hover {
            background-color: #45a049;
        }
        .auth-card a {
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
        }
        .auth-card a:hover {
            text-decoration: underline;
        }
        .auth-card .footer {
            margin-top: 1.5rem;
            font-size: 14px;
            color: #666;
        }
        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 14px;
            display: none; /* Hidden by default */
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .info-text {
            font-size: 14px;
            color: #666;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <h1>Forgot Password</h1>

        <!-- Success Alert -->
        <div id="success-alert" class="alert alert-success">
            Password reset link sent to your email!
        </div>

        <!-- Error Alert -->
        <div id="error-alert" class="alert alert-error">
            Please provide a valid email address.
        </div>

        <div class="info-text">
            Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <form id="forgot-password-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <input id="email" type="email" name="email" placeholder="Email" required autofocus>
            </div>
            <button type="submit">Email Password Reset Link</button>
            <div class="footer">
                <a href="{{ route('login') }}">Back to Login</a>
            </div>
        </form>
    </div>

</body>
</html>
