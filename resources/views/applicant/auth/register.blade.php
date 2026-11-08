
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Applicant Registration | Jollibee RecruitEase</title>

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

        /* MAIN WRAPPER */

        .register-wrapper {
            width: 100%;
            max-width: 1080px;
            min-height: 680px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            background: var(--white);
            border-radius: 22px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 25px 70px rgba(100, 30, 20, .10);
        }

        /* =====================================
           BRAND PANEL
        ===================================== */

        .brand-panel {
            background: linear-gradient(
                145deg,
                #A80F18 0%,
                #C81720 48%,
                #D71920 100%
            );
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

        /* BRANDING */

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

        /* BRAND CONTENT */

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

        /* FEATURES */

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

        /* BRAND FOOTER */

        .brand-footer {
            color: #FFD8D6;
            font-size: 11px;
            line-height: 1.8;
            margin-top: 35px;
        }

        /* =====================================
           REGISTRATION PANEL
        ===================================== */

        .register-panel {
            padding: 45px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-heading {
            margin-bottom: 25px;
        }

        .register-icon {
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

        .register-heading h2 {
            font-size: 28px;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.8px;
            margin-bottom: 9px;
        }

        .register-heading p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        /* FORM */

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
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
            padding: 13px 45px 13px 43px;
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

        /* PASSWORD TOGGLE */

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

        /* REGISTER BUTTON */

        .register-btn {
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

        .register-btn:hover {
            background: linear-gradient(100deg, #A80F18, #C81720);
            transform: translateY(-2px);
            box-shadow: 0 9px 20px rgba(215,25,32,.23);
        }

        .register-btn i {
            margin-left: 7px;
        }

        /* ERRORS AND SUCCESS */

        .error-message {
            background: #FFF0F0;
            border: 1px solid #FFD1D1;
            color: #B42332;
            padding: 12px;
            border-radius: 9px;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .success-message {
            background: #EFFAF2;
            border: 1px solid #C7EBD0;
            color: #217A3B;
            padding: 12px;
            border-radius: 9px;
            font-size: 12px;
            margin-bottom: 18px;
        }

        /* FOOTER */

        .register-note {
            margin-top: 22px;
            padding-top: 19px;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .register-note a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .register-note a:hover {
            text-decoration: underline;
        }

        /* =====================================
           RESPONSIVE DESIGN
        ===================================== */

        @media(max-width: 850px) {

            .register-wrapper {
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

            .register-panel {
                padding: 40px;
            }
        }

        @media(max-width: 480px) {

            body {
                padding: 15px;
            }

            .register-wrapper {
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

            .register-panel {
                padding: 35px 25px;
            }

            .register-heading h2 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="register-wrapper">

    <!-- =====================================
         BRAND PANEL
    ====================================== -->

    <section class="brand-panel">

        <!-- JOLLIBEE BRANDING -->

        <div class="brand">

            <img src="{{ asset('images/jollibee-logo.png') }}"
                 alt="Jollibee Logo"
                 class="brand-logo">

            <div>
                <h2>Jollibee RecruitEase</h2>
                <small>INTELLIGENT RECRUITMENT</small>
            </div>

        </div>


        <!-- BRAND MESSAGE -->

        <div class="brand-content">

            <div class="brand-tag">
                <i class="bi bi-stars"></i>
                YOUR NEXT OPPORTUNITY STARTS HERE
            </div>

            <h1>
                Take the next step.
                <span>Build your future.</span>
            </h1>

            <p>
                Create your Jollibee RecruitEase account to discover
                available job opportunities, submit your resume, and
                keep track of your job applications in one place.
            </p>


            <!-- FEATURES -->

            <div class="brand-features">

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <span>Explore available job opportunities</span>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </div>
                    <span>Submit your resume online</span>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <span>Keep track of your applications</span>
                </div>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="brand-footer">
            &copy; {{ date('Y') }} Jollibee RecruitEase. All rights reserved.
            <br>
            Intelligent Resume Screening and Candidate Ranking System
        </div>

    </section>


    <!-- =====================================
         REGISTRATION PANEL
    ====================================== -->

    <section class="register-panel">

        <div class="register-heading">

            <div class="register-icon">
                <i class="bi bi-person-plus"></i>
            </div>

            <h2>Create your account</h2>

            <p>
                Join Jollibee RecruitEase and start exploring career
                opportunities. Fill in your information below.
            </p>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if (session('success'))
            <div class="success-message">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
            </div>
        @endif


        <!-- VALIDATION ERRORS -->

        @if ($errors->any())
            <div class="error-message">
                <i class="bi bi-exclamation-circle me-1"></i>

                <ul style="margin: 5px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- REGISTRATION FORM -->

        <form method="POST" action="{{ route('applicant.register.store') }}">

            @csrf

            <!-- FULL NAME -->

            <div class="form-group">

                <label for="full_name">Full Name</label>

                <div class="input-wrapper">

                    <i class="bi bi-person input-icon"></i>

                    <input
                        type="text"
                        id="full_name"
                        name="full_name"
                        class="form-control"
                        placeholder="Enter your full name"
                        value="{{ old('full_name') }}"
                        autocomplete="name"
                        maxlength="255"
                        required
                    >

                </div>

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">Email Address</label>

                <div class="input-wrapper">

                    <i class="bi bi-envelope input-icon"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email address"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >

                </div>

            </div>


            <!-- PHONE -->

            <div class="form-group">

                <label for="phone">
                    Phone Number
                    <span style="font-weight:400; color:var(--muted);">
                        (Optional)
                    </span>
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-telephone input-icon"></i>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        class="form-control"
                        placeholder="Enter your phone number"
                        value="{{ old('phone') }}"
                        autocomplete="tel"
                        maxlength="30"
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label for="password">Password</label>

                <div class="input-wrapper">

                    <i class="bi bi-lock input-icon"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="At least 8 characters"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        data-toggle-password="password"
                        aria-label="Show password"
                    >
                        <i class="bi bi-eye"></i>
                    </button>

                </div>

            </div>


            <!-- CONFIRM PASSWORD -->

            <div class="form-group">

                <label for="password_confirmation">Confirm Password</label>

                <div class="input-wrapper">

                    <i class="bi bi-shield-lock input-icon"></i>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Re-enter your password"
                        autocomplete="new-password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        data-toggle-password="password_confirmation"
                        aria-label="Show password"
                    >
                        <i class="bi bi-eye"></i>
                    </button>

                </div>

            </div>


            <!-- SUBMIT BUTTON -->

            <button type="submit" class="register-btn">

                CREATE APPLICANT ACCOUNT
                <i class="bi bi-arrow-right"></i>

            </button>

        </form>


        <!-- LOGIN LINK -->

        <div class="register-note">

            <i class="bi bi-shield-lock me-1"></i>
            Your account information is used for recruitment purposes.
            <br>

            Already have an account?
            <a href="{{ route('login') }}">
                Sign in here
            </a>

        </div>

    </section>

</div>


<!-- =====================================
     PASSWORD VISIBILITY TOGGLE
====================================== -->

<script>

    document.querySelectorAll('[data-toggle-password]').forEach(button => {

        button.addEventListener('click', function () {

            const inputId = this.getAttribute('data-toggle-password');
            const passwordInput = document.getElementById(inputId);

            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';

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
