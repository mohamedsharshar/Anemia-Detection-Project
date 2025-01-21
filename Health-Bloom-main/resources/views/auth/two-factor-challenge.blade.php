<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health & Clinic Two-Factor Authentication</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
        .toggle-link {
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }
        .toggle-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <h1>Two-Factor Authentication</h1>

        <!-- Success Alert -->
        <div id="success-alert" class="alert alert-success">
            Authentication successful! Redirecting...
        </div>

        <!-- Error Alert -->
        <div id="error-alert" class="alert alert-error">
            Authentication failed. Please try again.
        </div>

        <div x-data="{ recovery: false }">
            <div class="info-text" x-show="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </div>

            <div class="info-text" x-show="recovery">
                Please confirm access to your account by entering one of your emergency recovery codes.
            </div>

            <form id="two-factor-form" method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div x-show="! recovery">
                    <input id="code" type="text" name="code" placeholder="Authentication Code" x-ref="code" autofocus>
                </div>

                <div x-show="recovery">
                    <input id="recovery_code" type="text" name="recovery_code" placeholder="Recovery Code" x-ref="recovery_code">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="toggle-link" x-show="! recovery" x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })">
                        Use a recovery code
                    </button>

                    <button type="button" class="toggle-link" x-show="recovery" x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })">
                        Use an authentication code
                    </button>

                    <button type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
