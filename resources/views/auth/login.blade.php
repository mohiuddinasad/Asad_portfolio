<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-page">

        {{-- LEFT: Form side --}}
        <div class="form-side">



            <div class="form-header">
                <h1 class="form-title">Sign in</h1>
                <p class="form-subtitle">Enter your credentials to access your account</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                {{-- Email --}}
                <div class="field-group">
                    <x-input-label for="email" :value="__('Email')" class="field-label" />
                    <x-text-input
                        id="email" class="field-input" type="email"
                        name="email" :value="old('email')"
                        required autofocus autocomplete="username"
                        placeholder="you@example.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="field-error" />
                </div>

                {{-- Password --}}
                <div class="field-group">
                    <div class="label-row">
                        <x-input-label for="password" :value="__('Password')" class="field-label" />
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>
                    <x-text-input
                        id="password" class="field-input" type="password"
                        name="password" required autocomplete="current-password"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password')" class="field-error" />
                </div>

                <div class="form-divider"></div>

                {{-- Remember Me --}}
                <label for="remember_me" class="remember-label">
                    <input id="remember_me" type="checkbox" name="remember" class="remember-checkbox" />
                    <span>{{ __('Keep me signed in') }}</span>
                </label>

                {{-- Submit --}}
                <x-primary-button class="submit-btn">
                    {{ __('Sign in') }}
                </x-primary-button>

            </form>
        </div>



    </div>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: #f0f4fb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            padding: 1.5rem;
        }

        /* ── Page shell ── */
        .login-page {
            display: flex;
            width: 100%;
            max-width: 960px;
            /* min-height: 580px; */
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 32px rgba(6, 92, 194, 0.08);
        }

        /* ══════════════════════════
           FORM SIDE (left)
        ══════════════════════════ */
        .form-side {
            flex: 1;
            background: #ffffff;
            padding: 3.5rem 3rem;
            /* display: flex; */
            flex-direction: column;
            justify-content: center;
        }

        .form-logo {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 2.75rem;
        }

        .logo-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #065CC2;
            flex-shrink: 0;
        }

        .logo-text {
            font-size: 15px;
            font-weight: 700;
            color: #0f1a2e;
            letter-spacing: -0.01em;
        }

        .form-header {
            margin-bottom: 2rem;
        }

        .form-title {
            font-size: clamp(1.5rem, 2.5vw, 1.875rem);
            font-weight: 700;
            color: #0f1a2e;
            letter-spacing: -0.025em;
            margin-bottom: 0.375rem;
        }

        .form-subtitle {
            font-size: 0.9rem;
            color: #64748b;
        }

        /* ── Form fields ── */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.125rem;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 0.375rem;
        }

        .field-label,
        .field-group label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #374151;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.25rem;
        }

        .field-input,
        input.field-input {
            width: 100%;
            height: 46px;
            padding: 0 1rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.9375rem;
            color: #0f1a2e;
            background: #fafbff;
            transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
            outline: none;
            appearance: none;
        }

        .field-input:hover { border-color: #b8cde8; }

        .field-input:focus {
            border-color: #065CC2;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(6, 92, 194, 0.11);
        }

        .field-input::placeholder { color: #b0bac9; }

        .field-error { font-size: 0.8rem; color: #dc2626; }

        .forgot-link {
            font-size: 0.8rem;
            font-weight: 500;
            color: #065CC2;
            text-decoration: none;
            white-space: nowrap;
            transition: color 0.15s;
        }
        .forgot-link:hover { color: #0448a0; text-decoration: underline; }

        .form-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 0.25rem 0;
        }

        .remember-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
            cursor: pointer;
            user-select: none;
        }

        .remember-checkbox {
            width: 15px;
            height: 15px;
            accent-color: #065CC2;
            cursor: pointer;
            flex-shrink: 0;
        }

        .submit-btn,
        button.submit-btn {
            width: 100%;
            height: 48px;
            background: #065CC2;
            color: #ffffff;
            font-size: 0.9375rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            letter-spacing: 0.015em;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.15s, transform 0.1s;
            margin-top: 0.25rem;
        }

        .submit-btn:hover { background: #0448a0; }
        .submit-btn:active { transform: scale(0.985); background: #03398a; }

        /* ══════════════════════════
           BRAND SIDE (right)
        ══════════════════════════ */
        .brand-side {
            width: 42%;
            background: #065CC2;
            padding: 3.5rem 2.75rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand-icon-box {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .brand-tagline {
            font-size: clamp(1.375rem, 2vw, 1.75rem);
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
            letter-spacing: -0.025em;
        }

        .brand-tagline-muted { color: rgba(255, 255, 255, 0.45); }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 1.125rem;
        }

        .brand-feat {
            display: flex;
            align-items: flex-start;
            gap: 0.875rem;
        }

        .feat-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .feat-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 3px;
        }

        .feat-desc {
            font-size: 0.8125rem;
            color: rgba(255, 255, 255, 0.65);
            line-height: 1.45;
        }

        /* ════════════════════════════
           RESPONSIVE BREAKPOINTS
        ════════════════════════════ */

        /* Tablet: hide brand panel, center form */
        @media (max-width: 768px) {
            body { padding: 1rem; background: #f0f4fb; }

            .login-page {
                flex-direction: column;
                max-width: 480px;
                min-height: auto;
                border-radius: 16px;
            }

            .brand-side { display: none; }

            .form-side {
                padding: 2.5rem 2rem;
            }
        }

        /* Mobile: full screen */
        @media (max-width: 480px) {
            body { padding: 0; background: #ffffff; align-items: flex-start; }

            .login-page {
                border-radius: 0;
                border: none;
                box-shadow: none;
                max-width: 100%;
                min-height: 100vh;
            }

            .form-side {
                padding: 3.5rem 1.5rem 2.5rem;
                min-height: 100vh;
                justify-content: flex-start;
            }

            .field-input, input.field-input { height: 50px; font-size: 1rem; }
            .submit-btn, button.submit-btn { height: 52px; font-size: 1rem; }
        }

        /* Large desktop */
        @media (min-width: 1280px) {
            .login-page { max-width: 1080px;  }
            .form-side { padding: 4rem 3.5rem; }
            .brand-side { padding: 4rem 3.25rem; }
        }
    </style>
</x-guest-layout>
