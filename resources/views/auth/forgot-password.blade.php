
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password | Jollibee RecruitEase</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        :root {
            --primary: #D71920;
            --primary-dark: #A80F18;
            --primary-light: #FFF0F0;
            --accent: #FFC72C;
            --background: #FFF9F0;
            --white: #FFFFFF;
            --text: #302B2B;
            --muted: #8C8580;
            --border: #F0E5DC;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'DM Sans', sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at 10% 15%, rgba(255,199,44,.12), transparent 30%),
                radial-gradient(circle at 90% 85%, rgba(215,25,32,.07), transparent 30%),
                var(--background);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1080px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--white);
            border-radius: 22px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 25px 70px rgba(100, 30, 20, .10);
        }

        /* BRAND PANEL */

        .brand-panel {
            background: linear-gradient(145deg, #A80F18 0%, #C81720 48%, #D71920 100%);
            color: white;
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            border-bottom: 6px solid var(--accent);
        }

        .brand-panel::before {
            content: "";
            position: absolute;
            width: 390px;
            height: 390px;
            border: 55px solid rgba(255,255,255,.06);
            border-radius: 50%;
            bottom: -180px;
            right: -140px;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: rgba(255,199,44,.12);
            border-radius: 50%;
            top: 180px;
            right: -90px;
        }

        .brand,
        .brand-content,
        .brand-footer {
            position: relative;
            z-index: 2;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 17px;
            margin-bottom: 55px;
        }

        .brand-logo {
            width: 76px;
            height: 76px;
            object-fit: contain;
            background: white;
            padding: 5px;
            border-radius: 18px;
            flex-shrink: 0;
            box-shadow: 0 8px 22px rgba(0,0,0,.18);
        }

        .brand h2 {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 5px;
            letter-spacing: -.7px;
        }

        .brand small {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #FFE2DF;
        }

        .brand-content {
            max-width: 400px;
        }

        .brand-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 30px;
            padding: 9px 15px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 27px;
        }

        .brand-content h1 {
            font-size: 42px;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -1.5px;
            margin-bottom: 22px;
            max-width: 390px;
        }

        .brand-content h1 span {
            color: var(--accent);
            display: block;
            margin-top: 5px;
        }

        .brand-content p {
            color: #FFE4E2;
            font-size: 14px;
            line-height: 1.9;
            max-width: 365px;
        }

        .brand-features {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 12px;
            color: #FFF1EF;
        }

        .feature-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,.13);
            border-radius: 10px;
            color: var(--accent);
            font-size: 16px;
            flex-shrink: 0;
        }

        .brand-footer {
            color: #FFD8D6;
            font-size: 11px;
            line-height: 1.8;
            margin-top: 35px;
        }

        /* FORM PANEL */

        .login-panel {
            padding: 65px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-heading {
            margin-bottom: 32px;
        }

        .login-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 23px;
        }

        .login-heading h2 {
            font-size: 28px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.8px;
            margin-bottom: 9px;
        }

        .login-heading p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 9px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #AAA09A;
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            padding: 14px 15px 14px 43px;
            border: 1px solid var(--border);
            background: #FFFCF9;
            border-radius: 10px;
            outline: none;
            font-size: 13px;
            color: var(--text);
            transition: .2s;
        }

        .form-control::placeholder {
            color: #B5ADA8;
        }

        .form-control:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(215,25,32,.08);
        }

        .login-btn {
            width: 100%;
            border: none;
            padding: 15px;
            background: linear-gradient(100deg, #B5121B, #D71920);
            color: white;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .5px;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 6px 15px rgba(215,25,32,.17);
        }

        .login-btn:hover {
            background: linear-gradient(100deg, #A80F18, #C81720);
            transform: translateY(-2px);
            box-shadow: 0 9px 20px rgba(215,25,32,.23);
        }

        .login-btn i {
            margin-left: 7px;
        }

        .error-message {
            background: #FFF0F0;
            border: 1px solid #FFD1D1;
            color: #B42332;
            padding: 13px;
            border-radius: 9px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .success-message {
            background: #EAF8EF;
            border: 1px solid #C5E8D0;
            color: #217A43;
            padding: 13px;
            border-radius: 9px;
            font-size: 12px;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .login-note {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .login-note a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .login-note a:hover {
            text-decoration: underline;
        }

        @media(max-width: 850px) {
            .login-wrapper {
                max-width: 600px;
                grid-template-columns: 1fr;
            }

            .brand-panel {
                min-height: 380px;
                padding: 35px;
            }

            .brand {
                margin-bottom: 35px;
            }

            .brand-logo {
                width: 65px;
                height: 65px;
            }

            .brand-content h1 {
                font-size: 34px;
            }

            .brand-features {
                display: none;
            }

            .login-panel {
                padding: 45px 40px;
            }
        }

        @media(max-width: 480px) {
            body {
                padding: 15px;
            }

            .login-wrapper {
                border-radius: 16px;
            }

            .brand-panel {
                min-height: 330px;
                padding: 25px;
            }

            .brand {
                gap: 12px;
                margin-bottom: 30px;
            }

            .brand-logo {
                width: 55px;
                height: 55px;
            }

            .brand h2 {
                font-size: 20px;
            }

            .brand small {
                font-size: 8px;
            }

            .brand-tag {
                font-size: 9px;
                padding: 8px 12px;
                margin-bottom: 20px;
            }

            .brand-content h1 {
                font-size: 29px;
                margin-bottom: 15px;
            }

            .brand-content p {
                font-size: 12px;
                line-height: 1.8;
            }

            .brand-footer {
                font-size: 10px;
            }

            .login-panel {
                padding: 35px 25px;
            }

            .login-heading h2 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- BRAND PANEL -->

    <section class="brand-panel">

        <div class="brand">
            <img src="{{ asset('images/jollibee-logo.png') }}"
                 alt="Jollibee Logo"
                 class="brand-logo">

            <div>
                <h2>Jollibee RecruitEase</h2>
                <small>INTELLIGENT RECRUITMENT</small>
            </div>
        </div>

        <div class="brand-content">

            <div class="brand-tag">
                <i class="bi bi-shield-lock"></i>
                ACCOUNT SECURITY
            </div>

            <h1>
                Your account.
                <span>Your security.</span>
            </h1>

            <p>
                Forgot your password? Don't worry. We'll help you
                regain access to your Jollibee RecruitEase account
                through a secure password recovery link sent to your email.
            </p>

            <div class="brand-features">

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-envelope-check"></i>
                    </div>
                    <span>Secure email verification</span>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-key"></i>
                    </div>
                    <span>Create a new password securely</span>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <span>Protected account access</span>
                </div>

            </div>

        </div>

        <div class="brand-footer">
            &copy; {{ date('Y') }} Jollibee RecruitEase. All rights reserved.
            <br>
            Intelligent Resume Screening and Candidate Ranking System
        </div>

    </section>


    <!-- FORGOT PASSWORD PANEL -->

    <section class="login-panel">

        <div class="login-heading">

            <div class="login-icon">
                <i class="bi bi-envelope-lock"></i>
            </div>

            <h2>Forgot password?</h2>

            <p>
                Enter the email address associated with your account.
                We'll send you a link to reset your password.
            </p>

        </div>


        <!-- ERROR MESSAGE -->

        @if($errors->any())
            <div class="error-message">
                <i class="bi bi-exclamation-circle me-1"></i>
                {{ $errors->first() }}
            </div>
        @endif


        <!-- SUCCESS MESSAGE -->

        @if(session('status'))
            <div class="success-message">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('status') }}
            </div>
        @endif


        <!-- EMAIL FORM -->

        <form method="POST" action="{{ route('password.email') }}">

            @csrf

            <div class="form-group">

                <label for="email">Email Address</label>

                <div class="input-wrapper">

                    <i class="bi bi-envelope input-icon"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your registered email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                        autofocus
                    >

                </div>

            </div>

            <button type="submit" class="login-btn">
                SEND PASSWORD RESET LINK
                <i class="bi bi-arrow-right"></i>
            </button>

        </form>


        <!-- BACK TO LOGIN -->

        <div class="login-note">

            <i class="bi bi-arrow-left me-1"></i>
            Remembered your password?
            <a href="{{ route('login') }}">Back to Login</a>

        </div>

    </section>

</div>

</body>
</html>
