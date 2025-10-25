<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Suku Marori Wasur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2C3E50;
            --secondary-color: #7D6E5C;
            --accent-color: #A68B6C;
            --light-bg: #F8F9FA;
            --text-primary: #1a1a1a;
            --text-secondary: #6c757d;
            --border-color: rgba(0,0,0,0.08);
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: var(--light-bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
        }

        /* Left Side - Logo & Branding */
        .login-brand {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        .logo-container {
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            font-size: 3rem;
            backdrop-filter: blur(10px);
        }

        .brand-title {
            font-size: 1.8rem;
            font-weight: 300;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 1rem;
            font-weight: 300;
            opacity: 0.9;
            line-height: 1.6;
        }

        /* Right Side - Login Form */
        .login-form-container {
            flex: 1;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 400;
            color: var(--primary-color);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .form-subtitle {
            font-size: 0.95rem;
            color: var(--text-secondary);
            font-weight: 300;
        }

        /* Status Message */
        .status-message {
            padding: 12px 16px;
            background: #d1fae5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 400;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.95rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            transition: all 0.2s;
            font-family: inherit;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.08);
        }

        .error-message {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 6px;
            display: block;
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .checkbox-input {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            cursor: pointer;
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: var(--text-secondary);
            cursor: pointer;
            user-select: none;
        }

        /* Footer buttons */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px;
        }

        .forgot-link {
            font-size: 0.9rem;
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: var(--primary-color);
        }

        .btn-primary {
            padding: 12px 32px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 400;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-1px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 0;
            }

            .login-container {
                flex-direction: column;
                border-radius: 0;
                min-height: 100vh;
            }

            .login-brand {
                padding: 40px 30px;
            }

            .logo-container {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
                margin-bottom: 20px;
            }

            .brand-title {
                font-size: 1.5rem;
            }

            .brand-subtitle {
                font-size: 0.9rem;
            }

            .login-form-container {
                padding: 40px 30px;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .form-footer {
                flex-direction: column-reverse;
                gap: 16px;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Logo & Branding -->
        <div class="login-brand">
            <div class="logo-container">
                🏝️
            </div>
            <h1 class="brand-title">Suku Marori Wasur</h1>
            <p class="brand-subtitle">Melestarikan budaya, memberdayakan ekonomi lokal Papua</p>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-form-container">
            <div class="form-header">
                <h2 class="form-title">Masuk ke Akun</h2>
                <p class="form-subtitle">Selamat datang kembali! Silakan masuk ke akun Anda.</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input 
                        id="email" 
                        class="form-input" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="username"
                        placeholder="nama@email.com"
                    >
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input 
                        id="password" 
                        class="form-input"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="checkbox-group">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="checkbox-input" 
                        name="remember"
                    >
                    <label for="remember_me" class="checkbox-label">{{ __('Remember me') }}</label>
                </div>

                <!-- Submit Button & Forgot Password -->
                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <button type="submit" class="btn-primary">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>