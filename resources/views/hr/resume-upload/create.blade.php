
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upload Resume | RecruitEase</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 35px 38px;
        }

        /* PAGE HEADER */

        .back-link {
            display: inline-block;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .back-link:hover {
            color: var(--primary-dark);
        }

        .page-heading h4 {
            font-weight: 800;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 12px;
            margin: 0;
        }

        /* UPLOAD CARD */

        .upload-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(100, 30, 20, .05);
            max-width: 950px;
        }

        .section-heading {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .section-heading i {
            color: var(--primary);
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 11px 13px;
            font-family: inherit;
            font-size: 12px;
            color: var(--text);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(215, 25, 32, .08);
        }

        .form-control::placeholder {
            color: #aaa29b;
        }

        hr {
            border-color: var(--border);
            opacity: 1;
        }

        /* FILE UPLOAD */

        .upload-area {
            border: 2px dashed #E6C9A8;
            border-radius: 14px;
            padding: 30px;
            text-align: center;
            background: #FFFCF7;
            transition: .2s ease;
        }

        .upload-area:hover {
            border-color: var(--primary);
            background: #FFF9F5;
        }

        .upload-area > i {
            font-size: 38px;
            color: var(--primary);
        }

        .upload-area h6 {
            font-size: 14px;
            font-weight: 800;
        }

        .upload-area p {
            font-size: 11px;
            color: var(--muted);
            margin-top: 8px;
        }

        /* INFORMATION NOTE */

        .info-note {
            background: #FFF8E5;
            border: 1px solid #F5E3AE;
            border-radius: 12px;
            padding: 15px;
            font-size: 11px;
            line-height: 1.7;
            color: #75551B;
        }

        /* BUTTONS */

        .btn-submit {
            background: var(--primary);
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            transition: .2s ease;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .btn-submit:disabled {
            background: #C9A3A3;
            cursor: not-allowed;
            transform: none;
        }

        /* ALERTS */

        .alert {
            max-width: 950px;
            border-radius: 12px;
            font-size: 12px;
        }

        .alert ul {
            padding-left: 20px;
        }

        /* FOOTER */

        .footer {
            text-align: center;
            color: #A3A5AD;
            font-size: 10px;
            padding: 30px 0 5px;
            max-width: 950px;
        }


/* AI ANALYSIS LOADING SCREEN */
.ai-loading-overlay {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(35, 20, 20, 0.78);
    backdrop-filter: blur(6px);
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.ai-loading-overlay.active {
    display: flex;
}

.ai-loading-card {
    background: white;
    width: 100%;
    max-width: 430px;
    padding: 38px 30px;
    border-radius: 22px;
    text-align: center;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    animation: loadingAppear 0.3s ease-out;
}

.ai-loading-icon {
    width: 75px;
    height: 75px;
    margin: 0 auto 22px;
    border-radius: 22px;
    background: #FFF0F0;
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
    animation: aiPulse 1.5s ease-in-out infinite;
}

.ai-loading-card h4 {
    font-size: 20px;
    font-weight: 800;
    margin-bottom: 9px;
}

.ai-loading-description {
    color: var(--muted);
    font-size: 12px;
    line-height: 1.7;
    margin-bottom: 25px;
}

.ai-progress {
    height: 7px;
    background: #F3E8E5;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 20px;
}

.ai-progress-bar {
    height: 100%;
    width: 35%;
    border-radius: 20px;
    background: linear-gradient(
        90deg,
        var(--primary),
        var(--accent)
    );
    animation: progressMove 1.5s ease-in-out infinite;
}

.ai-loading-note {
    color: var(--muted);
    font-size: 11px;
}

@keyframes aiPulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(215, 25, 32, 0.15);
    }
    50% {
        transform: scale(1.08);
        box-shadow: 0 0 0 12px rgba(215, 25, 32, 0);
    }
}

@keyframes progressMove {
    0% {
        transform: translateX(-110%);
    }
    100% {
        transform: translateX(300%);
    }
}

@keyframes loadingAppear {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (prefers-reduced-motion: reduce) {
    .ai-loading-icon,
    .ai-progress-bar,
    .ai-loading-card {
        animation: none;
    }
}


        /* RESPONSIVE */

        @media(max-width: 991px) {
            .main-content {
                margin-left: 75px;
                padding: 25px;
            }
        }

        @media(max-width: 576px) {
            .main-content {
                padding: 20px 12px;
            }

            .upload-card {
                padding: 20px;
            }

            .page-heading h4 {
                font-size: 21px;
            }

            .upload-area {
                padding: 22px 15px;
            }

            .btn-submit {
                width: 100%;
            }
        }
    </style>
</head>

<body>

@include('components.hr.sidebar')

<main class="main-content">

    <!-- BACK LINK -->
    <a href="{{ route('dashboard') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Dashboard
    </a>

    <!-- PAGE HEADER -->
    <div class="page-heading mb-4">
        <h4>Upload Applicant Resume</h4>
        <p>
            Register an applicant and submit their resume for automated screening.
        </p>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    <!-- VALIDATION ERRORS -->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please check the following:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- UPLOAD FORM -->
    <form action="{{ route('hr.resume-upload.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="upload-card">

            <!-- APPLICANT INFORMATION -->
            <h5 class="section-heading">
                <i class="bi bi-person-vcard me-2"></i>
                Applicant Information
            </h5>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Full Name *</label>

                    <input type="text"
                           name="full_name"
                           class="form-control"
                           value="{{ old('full_name') }}"
                           placeholder="Enter applicant's full name"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email Address *</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="applicant@email.com"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone') }}"
                           placeholder="Enter contact number">
                </div>

            </div>

            <hr class="my-4">

            <!-- JOB APPLICATION -->
            <h5 class="section-heading">
                <i class="bi bi-briefcase me-2"></i>
                Job Application
            </h5>

            <div class="mb-4">
                <label class="form-label">Select Job Position *</label>

                <select name="job_position_id"
                        class="form-select"
                        required>

                    <option value="">Choose a job position</option>

                    @foreach($jobPositions as $job)
                        <option value="{{ $job->id }}"
                            {{ old('job_position_id') == $job->id ? 'selected' : '' }}>

                            {{ $job->title }}

                            @if($job->department)
                                - {{ $job->department }}
                            @endif

                        </option>
                    @endforeach

                </select>

                @if($jobPositions->isEmpty())
                    <small class="text-danger d-block mt-2">
                        No active job positions are currently available.
                    </small>
                @endif
            </div>

            <hr class="my-4">

            <!-- RESUME DOCUMENT -->
            <h5 class="section-heading">
                <i class="bi bi-file-earmark-pdf me-2"></i>
                Resume Document
            </h5>

            <div class="upload-area">

                <i class="bi bi-cloud-arrow-up"></i>

                <h6 class="fw-bold mt-2">
                    Upload Applicant's Resume
                </h6>

                <p>
                    Choose a PDF file from your computer.
                    Maximum file size: 5 MB.
                </p>

                <input type="file"
                       name="resume"
                       class="form-control mt-3"
                       accept=".pdf,application/pdf"
                       required>

            </div>

            <!-- INFORMATION NOTE -->
            <div class="info-note mt-4">
                <i class="bi bi-info-circle-fill me-2"></i>

                The uploaded resume will be processed automatically.
                RecruitEase will extract the applicant's information and skills,
                then calculate a match score based on the selected job position.
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="d-flex justify-content-end mt-4">

                <button type="submit"
                        class="btn-submit"
                        {{ $jobPositions->isEmpty() ? 'disabled' : '' }}>

                    <i class="bi bi-cloud-upload me-2"></i>
                    Upload and Screen Resume

                </button>

            </div>

        </div>

    </form>


<!-- AI ANALYSIS LOADING SCREEN -->
<div class="ai-loading-overlay" id="aiLoadingOverlay">

    <div class="ai-loading-card">

        <div class="ai-loading-icon">
            <i class="bi bi-stars"></i>
        </div>

        <h4>AI is Analyzing Your Resume</h4>

        <p class="ai-loading-description">
            Your application is being processed by RecruitEase.
            Our AI system is examining the resume and comparing
            the applicant's qualifications with the job requirements.
        </p>

        <div class="ai-progress">
            <div class="ai-progress-bar"></div>
        </div>

        <p class="ai-loading-note mb-0">
            <i class="bi bi-shield-check me-1"></i>
            Please wait. Do not close or refresh this page.
        </p>

    </div>

</div>

    
    <!-- FOOTER -->
    <footer class="footer">
        © {{ date('Y') }} RecruitEase ·
        Intelligent Resume Screening and Candidate Ranking System
    </footer>

</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const uploadForm = document.querySelector('form[action="{{ route('hr.resume-upload.store') }}"]');
    const loadingOverlay = document.getElementById('aiLoadingOverlay');
    const resumeInput = uploadForm.querySelector('input[name="resume"]');
    const submitButton = uploadForm.querySelector('button[type="submit"]');

    uploadForm.addEventListener('submit', function (event) {

        if (!resumeInput.files.length) {
            return;
        }

        submitButton.disabled = true;

        submitButton.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

        loadingOverlay.classList.add('active');

    });
</script>

</body>
</html>
