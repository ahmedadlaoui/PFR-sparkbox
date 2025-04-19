<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - SparkBox</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0049FF;
            --primary-hover: #0040E0;
            --text-primary: #1A1A1A;
            --text-secondary: #666666;
            --background-light: #F8F9FA;
            --border-color: #E5E7EB;
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
        }

        .signup-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
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

        .role-selector {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin: 1rem 0 1.5rem 0;
        }

        .role-option {
            position: relative;
            border: 1.5px solid #E5E7EB;
            border-radius: 12px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .role-option:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .role-option.selected {
            border-color: var(--primary-color);
            background-color: #f0f4ff;
        }

        .role-icon {
            width: 40px;
            height: 40px;
            margin: 0 auto 0.75rem;
            padding: 0.6rem;
            background: var(--background-light);
            border-radius: 10px;
        }

        .role-icon svg {
            width: 100%;
            height: 100%;
            stroke: var(--primary-color);
            fill: none;
        }

        .role-title {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--text-primary);
        }

        .role-description {
            font-size: 0.8rem;
            color: var(--text-secondary);
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

        .login-prompt {
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.8rem;
        }

        .login-prompt a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .login-prompt a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .signup-container {
                padding: 1.5rem;
                border-radius: 12px;
            }

            .role-selector {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <div class="logo">
            <span>SparkBox</span>
        </div>

        <h2 class="title">Create your account</h2>
        <p class="subtitle">Start your investment journey with SparkBox</p>

        <form id="signupForm">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-input" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email address</label>
                <input type="email" class="form-input" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-input" placeholder="Create a password" required>
            </div>

            <label class="form-label">Choose your role</label>
            <div class="role-selector">
                <div class="role-option" onclick="selectRole('investor')">
                    <div class="role-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 4v16m-8-8h16M8 8l8 8m-8 0l8-8" />
                        </svg>
                    </div>
                    <h3 class="role-title">Investor</h3>
                    <p class="role-description">I want to invest in startups</p>
                </div>

                <div class="role-option" onclick="selectRole('entrepreneur')">
                    <div class="role-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path
                                d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 004.561 21h14.878a2 2 0 001.94-1.515L22 17" />
                        </svg>
                    </div>
                    <h3 class="role-title">Entrepreneur</h3>
                    <p class="role-description">I have a startup project</p>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>

            <div class="login-prompt">
                Already have an account? <a href="sign_in.html">Sign in</a>
            </div>
        </form>
    </div>

    <script>
        function selectRole(role) {
            document.querySelectorAll('.role-option').forEach(option => {
                option.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');
        }

        document.getElementById('signupForm').addEventListener('submit', (e) => {
            e.preventDefault();

            console.log('Form submitted');
        });
    </script>
</body>

</html>