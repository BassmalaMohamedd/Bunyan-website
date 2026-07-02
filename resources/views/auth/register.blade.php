<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Bunyan</title>
    <meta name="description" content="Create your Bunyan account.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700&family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; font-family: 'Inter', sans-serif; }
        [dir="rtl"] body, [dir="rtl"] input, [dir="rtl"] button { font-family:'Noto Sans Arabic',sans-serif; }
        [dir="rtl"] h1, [dir="rtl"] h2 { font-family:'Noto Kufi Arabic','Noto Sans Arabic',sans-serif !important; }

        .auth-shell {
            display: flex;
            min-height: 100vh;
            background: #0d0d0d;
        }

        /* ─── LEFT PANEL ─── */
        .auth-visual {
            display: none;
            position: relative;
            flex: 1;
            overflow: hidden;
            flex-direction: column;
            justify-content: flex-end;
        }
        @media(min-width: 1024px) { .auth-visual { display: flex; } }

        .auth-visual__img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 12s ease;
        }
        .auth-shell:hover .auth-visual__img { transform: scale(1.04); }

        .auth-visual__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(13, 20, 10, 0.97) 0%,
                rgba(13, 20, 10, 0.55) 45%,
                rgba(13, 20, 10, 0.15) 100%
            );
        }

        .auth-visual__content {
            position: relative;
            z-index: 10;
            padding: 60px 56px;
        }
        .auth-visual__badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(68, 110, 46, 0.15);
            border: 1px solid rgba(68, 110, 46, 0.35);
            padding: 8px 18px;
            border-radius: 100px;
            margin-bottom: 28px;
        }
        .auth-visual__badge span { color: #86b56a; font-size: 0.7rem; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; }
        .auth-visual__dot { width: 7px; height: 7px; border-radius: 50%; background: #86b56a; animation: pulse 2s ease infinite; }
        @keyframes pulse { 0%,100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.5; transform: scale(0.8); } }

        .auth-visual__headline {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(2.4rem, 3.6vw, 3.2rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.15;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }
        .auth-visual__headline em { font-style: italic; color: #86b56a; }

        .auth-visual__sub {
            color: rgba(255,255,255,0.45);
            font-size: 1rem;
            line-height: 1.8;
            font-weight: 300;
            max-width: 380px;
            margin-bottom: 40px;
        }

        .auth-feature-list { display: flex; flex-direction: column; gap: 14px; }
        .auth-feature {
            display: flex;
            align-items: center;
            gap: 14px;
            color: rgba(255,255,255,0.55);
            font-size: 0.9rem;
        }
        .auth-feature__icon {
            width: 34px; height: 34px; border-radius: 9px;
            background: rgba(68,110,46,0.15);
            border: 1px solid rgba(68,110,46,0.25);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 1rem;
        }

        /* ─── RIGHT PANEL ─── */
        .auth-form-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            max-width: 560px;
            padding: 56px 52px;
            background: #111;
            overflow-y: auto;
        }
        @media(max-width: 1023px) { .auth-form-panel { max-width: 100%; } }
        @media(max-width: 600px) { .auth-form-panel { padding: 40px 24px; } }

        .auth-logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            margin-bottom: 44px;
        }
        .auth-logo__mark {
            width: 38px; height: 38px;
            background: #446E2E;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .auth-logo__mark svg { width: 18px; height: 18px; fill: none; stroke: #fff; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .auth-logo__name { font-weight: 800; font-size: 1.2rem; color: #fff; letter-spacing: 1px; }

        .auth-form__heading { font-size: 2rem; font-weight: 700; color: #fff; letter-spacing: -0.5px; margin-bottom: 6px; }
        .auth-form__sub { font-size: 0.9rem; color: rgba(255,255,255,0.38); font-weight: 400; margin-bottom: 32px; }

        .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media(max-width: 500px) { .form-grid-2 { grid-template-columns: 1fr; } }

        .form-group { display: flex; flex-direction: column; gap: 7px; margin-bottom: 16px; }
        .form-label { font-size: 0.72rem; font-weight: 600; color: rgba(255,255,255,0.45); text-transform: uppercase; letter-spacing: 1.5px; }
        .form-input {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 12px;
            padding: 13px 18px;
            color: #fff;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
            width: 100%;
        }
        .form-input:focus {
            border-color: rgba(68, 110, 46, 0.6);
            background: rgba(68, 110, 46, 0.05);
            box-shadow: 0 0 0 3px rgba(68, 110, 46, 0.12);
        }
        .form-input::placeholder { color: rgba(255,255,255,0.18); }
        .form-error { font-size: 0.72rem; color: #f87171; font-weight: 600; margin-top: 2px; }

        .btn-primary-auth {
            width: 100%;
            background: #446E2E;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 15px 24px;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            margin-top: 24px;
            font-family: 'Inter', sans-serif;
        }
        .btn-primary-auth:hover { background: #3a5e26; box-shadow: 0 8px 30px rgba(68,110,46,0.3); transform: translateY(-1px); }
        .btn-primary-auth:active { transform: translateY(0); }

        .terms-note { font-size: 0.72rem; color: rgba(255,255,255,0.22); text-align: center; margin-top: 16px; line-height: 1.6; }
        .terms-note a { color: rgba(134,181,106,0.7); text-decoration: none; }
        .terms-note a:hover { color: #86b56a; text-decoration: underline; }

        .auth-divider { display: flex; align-items: center; gap: 16px; margin: 24px 0; }
        .auth-divider span { font-size: 0.7rem; color: rgba(255,255,255,0.2); font-weight: 600; white-space: nowrap; }
        .auth-divider hr { flex: 1; border: none; border-top: 1px solid rgba(255,255,255,0.07); }

        .btn-secondary-auth {
            width: 100%;
            background: transparent;
            color: rgba(255,255,255,0.6);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 13px 24px;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
            text-decoration: none;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Inter', sans-serif;
        }
        .btn-secondary-auth:hover { background: rgba(255,255,255,0.05); border-color: rgba(255,255,255,0.2); color: #fff; }

        .optional-tag {
            display: inline-block;
            font-size: 0.6rem;
            font-weight: 700;
            color: rgba(255,255,255,0.25);
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 4px;
            padding: 1px 6px;
            text-transform: uppercase;
            letter-spacing: 1px;
            vertical-align: middle;
            margin-left: 6px;
        }
    </style>
</head>
<body>
<div class="auth-shell">

    {{-- LEFT: Cinematic Visual Panel --}}
    <div class="auth-visual">
        <img class="auth-visual__img"
             src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=85&w=1600"
             alt="Bunyan Real Estate">
        <div class="auth-visual__overlay"></div>
        <div class="auth-visual__content">
            <div class="auth-visual__badge">
                <span class="auth-visual__dot"></span>
                <span>Join Bunyan Today</span>
            </div>
            <h2 class="auth-visual__headline">
                Build your <em>real estate</em><br>future with us.
            </h2>
            <p class="auth-visual__sub">
                Get instant access to property intelligence, valuation tools, and market insights that power the Kingdom's elite investors.
            </p>
            <div class="auth-feature-list">
                <div class="auth-feature">
                    <div class="auth-feature__icon">📊</div>
                    <span>Live market data & neighborhood scoring</span>
                </div>
                <div class="auth-feature">
                    <div class="auth-feature__icon">🏗️</div>
                    <span>Premium property listings & valuation reports</span>
                </div>
                <div class="auth-feature">
                    <div class="auth-feature__icon">🔒</div>
                    <span>Secure, compliant data management</span>
                </div>
            </div>
        </div>
    </div>

    {{-- RIGHT: Form Panel --}}
    <div class="auth-form-panel">
        <a href="/" class="auth-logo">
            <div class="auth-logo__mark">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <span class="auth-logo__name">BUNYAN</span>
        </a>

        <h1 class="auth-form__heading">Create your account</h1>
        <p class="auth-form__sub">Join thousands of professionals on the platform.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label" for="first_name">First Name</label>
                    <input id="first_name" class="form-input" type="text" name="first_name"
                           value="{{ old('first_name') }}" required autofocus autocomplete="given-name"
                           placeholder="Ahmed">
                    @error('first_name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="last_name">Last Name</label>
                    <input id="last_name" class="form-input" type="text" name="last_name"
                           value="{{ old('last_name') }}" required autocomplete="family-name"
                           placeholder="Al-Rashidi">
                    @error('last_name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input id="email" class="form-input" type="email" name="email"
                       value="{{ old('email') }}" required autocomplete="username"
                       placeholder="you@company.com">
                @error('email')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="phone">
                    Phone Number
                    <span class="optional-tag">Optional</span>
                </label>
                <input id="phone" class="form-input" type="text" name="phone"
                       value="{{ old('phone') }}" placeholder="+966 5x xxx xxxx">
                @error('phone')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" class="form-input" type="password" name="password"
                           required autocomplete="new-password" placeholder="Min. 8 characters">
                    @error('password')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="form-input" type="password"
                           name="password_confirmation" required autocomplete="new-password"
                           placeholder="Repeat password">
                </div>
            </div>

            <button type="submit" class="btn-primary-auth">Create Account</button>

            <p class="terms-note">
                By creating an account you agree to our
                <a href="#">{{ app()->isLocale('ar') ? 'شروط الخدمة' : 'Terms of Service' }}</a> {{ app()->isLocale('ar') ? 'و' : 'and' }} <a href="#">{{ app()->isLocale('ar') ? 'سياسة الخصوصية' : 'Privacy Policy' }}</a>.
            </p>
        </form>

        <div class="auth-divider">
            <hr><span>Already have an account?</span><hr>
        </div>

        <a href="{{ route('login') }}" class="btn-secondary-auth">Sign in instead</a>
    </div>

</div>
</body>
</html>
