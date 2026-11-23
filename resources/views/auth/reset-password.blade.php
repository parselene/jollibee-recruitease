
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Change Password | Jollibee RecruitEase</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        :root {
            --primary: #D71920;
            --primary-dark: #A80F18;
            --accent: #FFC72C;
            --background: #FFF9F0;
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
                radial-gradient(circle at 10% 15%, rgba(255,199,44,.15), transparent 30%),
                radial-gradient(circle at 90% 85%, rgba(215,25,32,.08), transparent 30%),
                var(--background);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .reset-wrapper {
            width: 100%;
            max-width: 490px;
        }

        /* BRAND */

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
            background: white;
            padding: 3px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
        }

        .brand h2 {
            font-size: 19px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.5px;
        }

        .brand small {
            display: block;
            font-size: 8px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: var(--muted);
            margin-top: 3px;
        }

        /* RESET CARD */

        .reset-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 22px 65px rgba(100,30,20,.10);
        }

        .card-accent {
            height: 7px;
            background: linear-gradient(90deg, var(--primary-dark), var(--primary), var(--accent));
        }

        .card-content {
            padding: 43px 42px 38px;
        }

        /* HEADER */

        .reset-icon {
            width: 68px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF0F0;
            color: var(--primary);
            border-radius: 19px;
            font-size: 29px;
            margin-bottom: 25px;
            position: relative;
        }

        .reset-icon::after {
            content: "";
            position: absolute;
            width: 11px;
            height: 11px;
            background: var(--accent);
            border: 3px solid white;
            border-radius: 50%;
            top: -3px;
            right: -3px;
        }

        .eyebrow {
            color: var(--primary);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .heading h1 {
            font-size: 27px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.8px;
            margin-bottom: 11px;
        }

        .heading p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
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
            padding: 14px 45px 14px 43px;
            border: 1px solid var(--border);
            background: #FFFCF9;
            border-radius: 10px;
            outline: none;
            font-size: 12px;
            color: var(--text);
            transition: .2s;
        }

        .form-control:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(215,25,32,.08);
        }

        .form-control::placeholder {
            color: #B5ADA8;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9B928D;
            cursor: pointer;
            font-size: 16px;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        /* PASSWORD REQUIREMENTS */

        .password-hint {
            background: #FFFAF0;
            border: 1px solid #F7E9C8;
            border-radius: 10px;
            padding: 13px 15px;
            margin: 5px 0 23px;
        }

        .password-hint-title {
            font-size: 10px;
            font-weight: 800;
            color: #6F5A2B;
            margin-bottom: 7px;
        }

        .password-hint p {
            font-size: 10px;
            color: #8B7953;
            line-height: 1.7;
        }

        /* BUTTON */

        .reset-btn {
            width: 100%;
            border: none;
            padding: 15px;
            background: linear-gradient(100deg, #B5121B, #D71920);
            color: white;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .6px;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 6px 15px rgba(215,25,32,.17);
        }

        .reset-btn:hover {
            background: linear-gradient(100deg, #A80F18, #C81720);
            transform: translateY(-2px);
            box-shadow: 0 9px 20px rgba(215,25,32,.23);
        }

        .reset-btn i {
            margin-left: 8px;
        }

        /* MESSAGES */

        .error-message {
            background: #FFF0F0;
            border: 1px solid #FFD1D1;
            color: #B42332;
            padding: 13px;
            border-radius: 9px;
            font-size: 11px;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        /* FOOTER */

        .card-footer {
            border-top: 1px solid var(--border);
            padding: 19px;
            text-align: center;
            color: var(--muted);
            font-size: 11px;
        }

        .card-footer a {
            color: var(--primary);
            font-weight: 800;
            text-decoration: none;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        .security-note {
            text-align: center;
            color: var(--muted);
            font-size: 10px;
            margin-top: 22px;
        }

        .security-note i {
            color: #29965B;
            margin-right: 5px;
        }

        @media(max-width: 520px) {
            body {
                padding: 16px;
            }

            .card-content {
                padding: 32px 23px;
            }

            .heading h1 {
                font-size: 24px;
            }

            .brand h2 {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>

<div class="reset-wrapper">

    <!-- BRAND -->

    <div class="brand">

        <img src="{{ asset('images/jollibee-logo.png') }}"
             alt="Jollibee Logo"
             class="brand-logo">

        <div>
            <h2>Jollibee RecruitEase</h2>
            <small>INTELLIGENT RECRUITMENT</small>
        </div>

    </div>


    <!-- RESET CARD -->

    <div class="reset-card">

        <div class="card-accent"></div>

        <div class="card-content">

            <!-- HEADING -->

            <div class="reset-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <div class="heading">

                <div class="eyebrow">
                    ACCOUNT SECURITY
                </div>

                <h1>Create a New Password</h1>

                <p>
                    You're almost there! Set a new password for your
                    RecruitEase account. Your new password will replace
                    your previous one.
                </p>

            </div>


            <!-- ERRORS -->

            @if($errors->any())
                <div class="error-message">
                    <i class="bi bi-exclamation-circle-fill me-1"></i>
                    {{ $errors->first() }}
                </div>
            @endif


            <!-- RESET FORM -->

            <form method="POST" action="{{ route('password.update') }}">

                @csrf

                <input type="hidden" name="token" value="{{ $token }}">


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">Registered Email Address</label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter your registered email"
                            value="{{ old('email', $email) }}"
                            autocomplete="email"
                            required
                        >

                    </div>

                </div>


                <!-- NEW PASSWORD -->

                <div class="form-group">

                    <label for="password">New Password</label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your new password"
                            autocomplete="new-password"
                            required
                        >

                        <button type="button"
                                class="password-toggle"
                                data-target="password"
                                aria-label="Show password">
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="form-group">

                    <label for="password_confirmation">Confirm New Password</label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock-fill input-icon"></i>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Re-enter your new password"
                            autocomplete="new-password"
                            required
                        >

                        <button type="button"
                                class="password-toggle"
                                data-target="password_confirmation"
                                aria-label="Show password">
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>

                </div>


                <!-- PASSWORD REQUIREMENTS -->

                <div class="password-hint">

                    <div class="password-hint-title">
                        <i class="bi bi-info-circle me-1"></i>
                        PASSWORD REQUIREMENTS
                    </div>

                    <p>
                        Use at least 8 characters. Make sure both
                        password fields match.
                    </p>

                </div>


                <!-- SUBMIT -->

                <button type="submit" class="reset-btn">
                    SAVE NEW PASSWORD
                    <i class="bi bi-arrow-right"></i>
                </button>

            </form>

        </div>


        <!-- FOOTER -->

        <div class="card-footer">

            <i class="bi bi-arrow-left me-1"></i>

            Changed your mind?

            <a href="{{ route('login') }}">
                Back to Login
            </a>

        </div>

    </div>


    <!-- SECURITY NOTE -->

    <div class="security-note">

        <i class="bi bi-shield-check"></i>
        Your account credentials are protected by RecruitEase.

    </div>

</div>


<!-- PASSWORD VISIBILITY -->

<script>

    document.querySelectorAll('.password-toggle').forEach(function(button) {

        button.addEventListener('click', function() {

            const input = document.getElementById(this.dataset.target);
            const isPassword = input.type === 'password';

            input.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword
                ? '<i class="bi bi-eye-slash"></i>'
                : '<i class="bi bi-eye"></i>';

            this.setAttribute(
                'aria-label',
                isPassword ? 'Hide password' : 'Show password'
            );

        });

    });

</script>

</body>
</html>
