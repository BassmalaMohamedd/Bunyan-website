<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Bunyan</title>
    <meta name="description" content="Sign in to your Bunyan account.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; font-family: 'Inter', sans-serif; }

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
                rgba(13, 20, 10, 0.95) 0%,
                rgba(13, 20, 10, 0.50) 50%,
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
            font-size: clamp(2.6rem, 4vw, 3.4rem);
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
            margin-bottom: 48px;
        }

        .auth-visual__stats {
            display: flex;
            gap: 40px;
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 40px;
        }
        .stat-item h4 { font-size: 1.8rem; font-weight: 700; color: #86b56a; letter-spacing: -1px; }
        .stat-item p { font-size: 0.7rem; color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 2px; margin-top: 4px; font-weight: 600; }

        /* ─── RIGHT PANEL ─── */
        .auth-form-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            max-width: 520px;
            padding: 48px 52px;
            background: #111;
            overflow-y: auto;
        }
        @media(max-width: 1023px) { .auth-form-panel { max-width: 100%; } }

        .auth-logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            margin-bottom: 56px;
        }
        .auth-logo__mark {
            width: 38px; height: 38px;
            background: #446E2E;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .auth-logo__mark svg { width: 18px; height: 18px; fill: #fff; }
        .auth-logo__name { font-weight: 800; font-size: 1.2rem; color: #fff; letter-spacing: 1px; }

        .auth-form__heading { font-size: 2rem; font-weight: 700; color: #fff; letter-spacing: -0.5px; margin-bottom: 6px; }
        .auth-form__sub { font-size: 0.9rem; color: rgba(255,255,255,0.38); font-weight: 400; margin-bottom: 36px; }

        .form-group { display: flex; flex-direction: column; gap: 7px; margin-bottom: 20px; }
        .form-label { font-size: 0.72rem; font-weight: 600; color: rgba(255,255,255,0.45); text-transform: uppercase; letter-spacing: 1.5px; }
        .form-input {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 12px;
            padding: 14px 18px;
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
        .form-input::placeholder { color: rgba(255,255,255,0.2); }
        .form-error { font-size: 0.72rem; color: #f87171; font-weight: 600; margin-top: 4px; }

        .form-row-flex { display: flex; align-items: center; justify-content: space-between; }

        .form-check { display: flex; align-items: center; gap: 10px; }
        .form-check input[type=checkbox] { width: 16px; height: 16px; accent-color: #446E2E; border-radius: 4px; cursor: pointer; }
        .form-check label { font-size: 0.78rem; color: rgba(255,255,255,0.35); cursor: pointer; }

        .form-forgot { font-size: 0.75rem; color: #86b56a; text-decoration: none; font-weight: 600; transition: color 0.2s; }
        .form-forgot:hover { color: #a3c785; }

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
            margin-top: 28px;
            font-family: 'Inter', sans-serif;
        }
        .btn-primary-auth:hover { background: #3a5e26; box-shadow: 0 8px 30px rgba(68,110,46,0.3); transform: translateY(-1px); }
        .btn-primary-auth:active { transform: translateY(0); }

        .auth-divider { display: flex; align-items: center; gap: 16px; margin: 28px 0; }
        .auth-divider span { font-size: 0.7rem; color: rgba(255,255,255,0.2); font-weight: 600; white-space: nowrap; }
        .auth-divider hr { flex: 1; border: none; border-top: 1px solid rgba(255,255,255,0.07); }

        .btn-secondary-auth {
            width: 100%;
            background: transparent;
            color: rgba(255,255,255,0.6);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 14px 24px;
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

        .status-alert { background: rgba(68,110,46,0.12); border: 1px solid rgba(68,110,46,0.25); border-radius: 10px; padding: 12px 16px; color: #86b56a; font-size: 0.8rem; font-weight: 600; margin-bottom: 24px; }
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
                <span>Trusted Platform</span>
            </div>
            <h2 class="auth-visual__headline">
                Where <em>Vision 2030</em><br>Meets Real Estate.
            </h2>
            <p class="auth-visual__sub">
                Access your personalized dashboard, manage your portfolio, and explore the most comprehensive property intelligence in the Kingdom.
            </p>
            <div class="auth-visual__stats">
                <div class="stat-item">
                    <h4>850+</h4>
                    <p>Projects Valued</p>
                </div>
                <div class="stat-item">
                    <h4>15+</h4>
                    <p>Years Active</p>
                </div>
                <div class="stat-item">
                    <h4>SAR 2.5B</h4>
                    <p>Assets Managed</p>
                </div>
            </div>
        </div>
    </div>

    {{-- RIGHT: Form Panel --}}
    <div class="auth-form-panel">
        <a href="/" class="auth-logo">
            <div class="auth-logo__mark">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <span class="auth-logo__name">BUNYAN</span>
        </a>

        <h1 class="auth-form__heading">Welcome back</h1>
        <p class="auth-form__sub">Sign in to your account to continue.</p>

        @if (session('status'))
            <div class="status-alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input id="email" class="form-input" type="email" name="email"
                       value="{{ old('email') }}" required autofocus autocomplete="username"
                       placeholder="you@company.com">
                @error('email')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="password">Password</label>
                <input id="password" class="form-input" type="password" name="password"
                       required autocomplete="current-password" placeholder="••••••••">
                @error('password')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-row-flex" style="margin-top: 14px;">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Keep me signed in</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="form-forgot">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn-primary-auth">Sign In</button>
        </form>

        <div class="auth-divider">
            <hr><span>Don't have an account?</span><hr>
        </div>

        <a href="{{ route('register') }}" class="btn-secondary-auth">Create a free account</a>
    </div>

</div>
</body>
</html>
