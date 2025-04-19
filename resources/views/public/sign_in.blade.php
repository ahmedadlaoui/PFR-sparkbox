<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - SparkBox</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0049FF;
            --primary-hover: #0040E0;
            --text-primary: #1A1A1A;
            --text-secondary: #666666;
            --background-light: #FAFBFC;
            --border-color: #F0F0F0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            color: var(--text-primary);
        }

        .sign-in-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            width: 100%;
            max-width: 460px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .logo span {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .title {
            font-size: 1.75rem;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
            font-weight: 700;
        }

        .subtitle {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            outline: none;
            background-color: #FAFBFC;
        }

        .form-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 73, 255, 0.05);
            background-color: white;
        }

        .forgot-password {
            display: block;
            text-align: right;
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.8rem;
            margin-top: 0.25rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
            margin-bottom: 1.5rem;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .signup-prompt {
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.8rem;
        }

        .signup-prompt a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .signup-prompt a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .sign-in-container {
                padding: 1.5rem;
                border-radius: 12px;
            }

            .title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="sign-in-container">
        <div class="logo">
            <span>SparkBox</span>
        </div>

        <h1 class="title">Welcome back</h1>
        <p class="subtitle">Sign in to continue your journey</p>

        <form>
            <div class="form-group">
                <label class="form-label">Email address</label>
                <input type="email" class="form-input" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-input" placeholder="Enter your password" required>
            </div>

            <a href="#" class="forgot-password">Forgot password?</a>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <div class="signup-prompt">
                Don't have an account? <a href="#">Create an account</a>
            </div>
        </form>
    </div>
</body>

</html>