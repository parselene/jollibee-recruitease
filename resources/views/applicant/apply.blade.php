<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apply for Position | RecruitEase</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap"
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
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        .navbar-custom {
            background: white;
            padding: 17px 5%;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--text);
            text-decoration: none;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
        }

        .brand-caption {
            display: block;
            font-size: 9px;
            letter-spacing: 1.2px;
            color: var(--muted);
        }

        .main-content {
            max-width: 850px;
            margin: auto;
            padding: 40px 20px;
        }

        .back-link {
            color: var(--primary);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:hover {
            color: var(--primary-dark);
        }

        .page-title {
            margin: 25px 0;
        }

        .page-title h2 {
            font-size: 25px;
            font-weight: 800;
        }

        .page-title p {
            color: var(--muted);
            font-size: 13px;
        }

        .application-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(100, 30, 20, .06);
        }

        .job-heading {
            border-bottom: 1px solid var(--border);
            padding-bottom: 22px;
            margin-bottom: 25px;
        }

        .job-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF0F0;
            color: var(--primary);
            font-size: 22px;
            margin-bottom: 15px;
        }

        .job-heading h4 {
            font-weight: 800;
            font-size: 21px;
        }

        .job-heading p {
            color: var(--muted);
            font-size: 12px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .job-description {
            color: #77716E;
            font-size: 13px;
            line-height: 1.8;
        }

        .skill-label {
            display: inline-block;
            background: #FFF5D9;
            color: #896000;
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 11px;
            font-weight: 700;
            margin: 3px;
        }

        .upload-area {
            border: 2px dashed #E8D5C9;
            background: #FFFCF8;
            border-radius: 14px;
            padding: 30px 20px;
            text-align: center;
        }

        .upload-icon {
            font-size: 35px;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 700;
        }

        .form-control {
            font-size: 13px;
            border-radius: 9px;
            padding: 12px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(215, 25, 32, .08);
        }

        .upload-note {
            color: var(--muted);
            font-size: 11px;
            margin-top: 12px;
        }

        .submit-btn {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 12px 20px;
            font-size: 13px;
            font-weight: 800;
            transition: .2s;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
            color: white;
        }

        .cancel-btn {
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .footer {
            text-align: center;
            color: #A3A5AD;
            font-size: 10px;
            padding: 30px 0 10px;
        }

        @media(max-width: 576px) {
            .application-card {
                padding: 22px 17px;
            }

            .page-title h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar-custom">
        <a href="{{ route('applicant.dashboard') }}" class="brand">
            <div class="brand-icon">R</div>

            <div>
                <div class="brand-name">RecruitEase</div>
                <span class="brand-caption">INTELLIGENT RECRUITMENT</span>
            </div>
        </a>
    </nav>

    <main class="main-content">

        <a href="{{ route('applicant.dashboard') }}" class="back-link">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Dashboard
        </a>

        <div class="page-title">
            <h2>Submit Your Application</h2>
            <p>Review the position details and upload your resume to apply.</p>
        </div>

        <div class="application-card">

            <div class="job-heading">

                <div class="job-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </div>

                <h4>{{ $jobPosition->title }}</h4>

                <p class="mb-2">
                    <i class="bi bi-building me-1"></i>
                    {{ $jobPosition->department ?? 'Department not specified' }}
                </p>

                <p class="mb-0">
                    <i class="bi bi-clock me-1"></i>
                    Minimum experience:
                    {{ $jobPosition->min_experience_years }} years
                </p>

            </div>

            <section class="mb-4">

                <h5 class="section-title">Job Description</h5>

                <p class="job-description">
                    {{ $jobPosition->description ?? 'No job description available.' }}
                </p>

                <h5 class="section-title mt-4">Required Skills</h5>

                @forelse($jobPosition->required_skills ?? [] as $skill)
                    <span class="skill-label">{{ $skill }}</span>
                @empty
                    <p class="text-muted small">No specific skills listed.</p>
                @endforelse

            </section>

            <hr style="border-color: var(--border);">

            <form method="POST"
                  action="{{ route('applicant.apply.store', $jobPosition->id) }}"
                  enctype="multipart/form-data">

                @csrf

                <h5 class="section-title mt-4">
                    <i class="bi bi-file-earmark-pdf me-2"
                       style="color: var(--primary);"></i>
                    Upload Your Resume
                </h5>

                <div class="upload-area">

                    <div class="upload-icon">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </div>

                    <label for="resume" class="form-label">
                        Select your resume (PDF only)
                    </label>

                    <input type="file"
                           name="resume"
                           id="resume"
                           class="form-control mt-2"
                           accept=".pdf,application/pdf"
                           required>

                    <p class="upload-note mb-0">
                        Accepted format: PDF · Maximum file size: 5 MB
                    </p>

                </div>

                @error('resume')
                    <div class="text-danger small mt-2">
                        <i class="bi bi-exclamation-circle me-1"></i>
                        {{ $message }}
                    </div>
                @enderror

                <div class="alert alert-warning mt-4 small">
                    <i class="bi bi-info-circle me-1"></i>
                    Please make sure your uploaded resume is updated
                    and contains accurate information.
                </div>

                <div class="d-flex flex-column flex-sm-row
                            justify-content-between align-items-sm-center gap-3 mt-4">

                    <a href="{{ route('applicant.dashboard') }}"
                       class="cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="submit-btn">
                        <i class="bi bi-send me-1"></i>
                        Submit Application
                    </button>

                </div>

            </form>

        </div>

        <footer class="footer">
            © {{ date('Y') }} RecruitEase ·
            Intelligent Resume Screening and Candidate Ranking System
        </footer>

    </main>

</body>
</html>