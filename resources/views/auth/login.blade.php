<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Suku Marori Wasur</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #8B0000;
            --secondary-color: #DC143C;
            --accent-color: #1a1a1a;
            --light-bg: #F8F9FA;
            --text-primary: #1a1a1a;
            --text-secondary: #4a4a4a;
            --border-color: rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #F8F9FA 0%, #E9ECEF 100%);
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
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
        }

        /* Left Side - Logo & Branding */
        .login-brand {
            flex: 1;
            background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 50%, #1a1a1a 100%);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-brand::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .logo-container {
            width: 180px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 1;
        }

        .brand-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 400;
            opacity: 0.95;
            line-height: 1.6;
            position: relative;
            z-index: 1;
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
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .form-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            color: var(--text-secondary);
            font-weight: 400;
        }

        /* Status Message */
        .status-message {
            padding: 12px 16px;
            background: #FFE5E5;
            border: 2px solid rgba(139, 0, 0, 0.3);
            border-left: 4px solid #8B0000;
            color: #1a1a1a;
            border-radius: 6px;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            margin-bottom: 20px;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 8px;
            font-family: 'Inter', sans-serif;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.95rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
        }

        .error-message {
            font-family: 'Inter', sans-serif;
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
            font-family: 'Inter', sans-serif;
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
            font-family: 'Inter', sans-serif;
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
            background: #8B0000;
            color: white;
            border: 2px solid #8B0000;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 2px 8px rgba(139, 0, 0, 0.2);
        }

        .btn-primary:hover {
            background: #DC143C;
            border-color: #DC143C;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(139, 0, 0, 0.2);
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
                width: 140px;
                height: 140px;
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
                <img src="{{ asset('img/marori.png') }}" alt="Logo Marori">
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