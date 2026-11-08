
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Job Position | RecruitEase</title>

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
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--background);
            color: var(--text);
            margin: 0;
        }

        a {
            text-decoration: none;
        }

        /* SIDEBAR */

        .sidebar {
            width: 255px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #B5121B, #920D16);
            padding: 27px 18px;
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 8px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--accent);
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 800;
        }

        .brand-caption {
            display: block;
            font-size: 9px;
            letter-spacing: 1px;
            color: rgba(255,255,255,.65);
        }

        .nav-label {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,.5);
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .nav-item-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            margin-bottom: 6px;
            border-radius: 9px;
            color: rgba(255,255,255,.8);
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-item-custom i {
            font-size: 16px;
        }

        .nav-item-custom:hover,
        .nav-item-custom.active {
            background: rgba(255,255,255,.13);
            color: white;
        }

        .nav-item-custom.active {
            border-left: 3px solid var(--accent);
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,.15);
            padding-top: 20px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .profile-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--accent);
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .profile-name {
            font-size: 11px;
            font-weight: 700;
        }

        .profile-role {
            font-size: 9px;
            color: rgba(255,255,255,.6);
        }

        .logout-link {
            width: 100%;
            background: transparent;
            border: 1px solid rgba(255,255,255,.2);
            color: white;
            padding: 10px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
        }

        .logout-link:hover {
            background: rgba(255,255,255,.12);
        }

        /* MAIN CONTENT */

        .main-content {
            margin-left: 255px;
            padding: 35px 38px;
            min-height: 100vh;
        }

        .page-heading h4 {
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .page-heading p {
            font-size: 12px;
            color: var(--muted);
        }

        .breadcrumb-custom {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 20px;
        }

        .breadcrumb-custom a {
            color: var(--primary);
            font-weight: 700;
        }

        /* FORM PANEL */

        .form-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 27px;
            margin-top: 25px;
            box-shadow: 0 8px 25px rgba(100,30,20,.05);
        }

        .form-section {
            padding-bottom: 25px;
            margin-bottom: 25px;
            border-bottom: 1px solid var(--border);
        }

        .form-section:last-of-type {
            border-bottom: none;
            margin-bottom: 0;
        }

        .section-title {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .section-description {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 11px 13px;
            font-size: 12px;
            color: var(--text);
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
        }

        textarea.form-control {
            resize: vertical;
        }

        .form-text {
            font-size: 10px;
            color: var(--muted);
        }

        .status-box {
            background: #FFF9F0;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 17px;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .info-note {
            background: #FFF5D9;
            border-radius: 9px;
            padding: 12px 14px;
            color: #795800;
            font-size: 11px;
            line-height: 1.6;
        }

        .btn-primary-custom {
            background: var(--primary);
            color: white;
            border: none;
            padding: 11px 21px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 800;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: white;
        }

        .btn-cancel {
            background: white;
            color: var(--muted);
            border: 1px solid var(--border);
            padding: 11px 21px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-cancel:hover {
            background: #f8f5f2;
            color: var(--text);
        }

        .footer {
            text-align: center;
            color: #A3A5AD;
            font-size: 10px;
            padding: 35px 0 10px;
        }

        @media(max-width: 991px) {
            .sidebar {
                width: 75px;
                padding: 25px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0;
            }

            .brand > div:last-child,
            .nav-label,
            .nav-item-custom span,
            .profile > div:last-child,
            .logout-text {
                display: none;
            }

            .nav-item-custom {
                justify-content: center;
                padding: 13px 8px;
            }

            .profile {
                justify-content: center;
                padding: 10px 0;
            }

            .main-content {
                margin-left: 75px;
            }
        }

        @media(max-width: 576px) {
            .main-content {
                padding: 25px 16px;
            }

            .form-panel {
                padding: 19px;
            }

            .page-heading h4 {
                font-size: 19px;
            }
        }
    </style>
</head>

<body>

@include('components.hr.sidebar')

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <div class="breadcrumb-custom">
            <a href="{{ route('job-positions.index') }}">Job Positions</a>
            <i class="bi bi-chevron-right mx-1"></i>
            Edit Job Position
        </div>

        <div class="page-heading">
            <h4>Edit Job Position</h4>
            <p>Update job information, application deadlines, and automatic interview settings.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-4 small">
                <strong>Please correct the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('job-positions.update', $jobPosition) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-panel">

                <!-- JOB INFORMATION -->
                <section class="form-section">

                    <h5 class="section-title">
                        <i class="bi bi-briefcase me-2" style="color:var(--primary);"></i>
                        Job Information
                    </h5>

                    <p class="section-description">
                        Update the details and qualifications for this position.
                    </p>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Job Title *</label>
                            <input type="text" name="title" class="form-control"
                                   value="{{ old('title', $jobPosition->title) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <input type="text" name="department" class="form-control"
                                   value="{{ old('department', $jobPosition->department) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Job Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $jobPosition->description) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Required Skills *</label>
                            <textarea name="required_skills" class="form-control" rows="3" required>{{ old('required_skills', implode(', ', $jobPosition->required_skills ?? [])) }}</textarea>
                            <div class="form-text">Separate each skill with a comma.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Minimum Experience (Years) *</label>
                            <input type="number" name="min_experience_years" class="form-control"
                                   min="0"
                                   value="{{ old('min_experience_years', $jobPosition->min_experience_years) }}"
                                   required>
                        </div>

                    </div>
                </section>

                <!-- APPLICATION SETTINGS -->
                <section class="form-section">

                    <h5 class="section-title">
                        <i class="bi bi-calendar-event me-2" style="color:var(--primary);"></i>
                        Application Settings
                    </h5>

                    <p class="section-description">
                        Manage the application deadline and vacancy availability.
                    </p>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Application Deadline *</label>
                            <input type="datetime-local"
                                   name="application_deadline"
                                   class="form-control"
                                   value="{{ old('application_deadline', $jobPosition->application_deadline?->format('Y-m-d\TH:i')) }}"
                                   required>
                            <div class="form-text">Applications will close automatically when this date and time is reached.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vacancy Status</label>

                            <div class="status-box">
                                <div class="form-check">
                                    <input type="checkbox"
                                           name="is_active"
                                           value="1"
                                           class="form-check-input"
                                           id="is_active"
                                           @checked(old('is_active', $jobPosition->is_active))>

                                    <label class="form-check-label fw-bold small" for="is_active">
                                        Active vacancy
                                    </label>
                                </div>

                                <div class="form-text mt-2">
                                    Uncheck this option to manually deactivate the job, even if its deadline has not passed.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="info-note mt-3">
                        <i class="bi bi-info-circle me-1"></i>
                        The system determines whether a vacancy is Open or Closed based on its deadline. HR can also manually deactivate a vacancy using the checkbox above.
                    </div>

                </section>

                <!-- INTERVIEW CONFIGURATION -->
                <section class="form-section">

                    <h5 class="section-title">
                        <i class="bi bi-calendar2-check me-2" style="color:var(--primary);"></i>
                        Automatic Interview Configuration
                    </h5>

                    <p class="section-description">
                        Configure the interview availability that RecruitEase will use when automatically scheduling shortlisted applicants.
                    </p>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Interview Date *</label>
                            <input type="date" name="interview_date" class="form-control"
                                   value="{{ old('interview_date', $jobPosition->interview_date?->format('Y-m-d')) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Shortlist Limit *</label>
                            <input type="number" name="shortlist_limit" class="form-control"
                                   min="1" max="100"
                                   value="{{ old('shortlist_limit', $jobPosition->shortlist_limit ?? 10) }}"
                                   required>
                            <div class="form-text">Maximum number of applicants to shortlist.</div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Interview Start Time *</label>
                            <input type="time" name="interview_start_time" class="form-control"
                                   value="{{ old('interview_start_time', $jobPosition->interview_start_time ? substr($jobPosition->interview_start_time, 0, 5) : '') }}"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Interview End Time *</label>
                            <input type="time" name="interview_end_time" class="form-control"
                                   value="{{ old('interview_end_time', $jobPosition->interview_end_time ? substr($jobPosition->interview_end_time, 0, 5) : '') }}"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Duration per Interview (Minutes) *</label>
                            <input type="number" name="interview_duration_minutes" class="form-control"
                                   min="5" max="480"
                                   value="{{ old('interview_duration_minutes', $jobPosition->interview_duration_minutes ?? 30) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Interview Location</label>
                            <input type="text" name="interview_location" class="form-control"
                                   value="{{ old('interview_location', $jobPosition->interview_location) }}"
                                   placeholder="e.g. HR Office, Main Branch">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Online Meeting Link</label>
                            <input type="url" name="interview_meeting_link" class="form-control"
                                   value="{{ old('interview_meeting_link', $jobPosition->interview_meeting_link) }}"
                                   placeholder="https://meet.google.com/...">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Interview Instructions</label>
                            <textarea name="interview_instructions" class="form-control" rows="3"
                                      placeholder="Enter instructions for shortlisted applicants...">{{ old('interview_instructions', $jobPosition->interview_instructions) }}</textarea>
                        </div>

                    </div>

                    <div class="info-note mt-3">
                        <i class="bi bi-lightbulb me-1"></i>
                        RecruitEase will assign interview slots to shortlisted applicants based on these settings after the application deadline.
                    </div>

                </section>

                <!-- ACTIONS -->
                <div class="d-flex flex-wrap justify-content-end gap-2">

                    <a href="{{ route('job-positions.index') }}" class="btn-cancel">
                        Cancel
                    </a>

                    <button type="submit" class="btn-primary-custom">
                        <i class="bi bi-check-circle me-1"></i>
                        Update Job Position
                    </button>

                </div>

            </div>
        </form>

        <footer class="footer">
            © {{ date('Y') }} RecruitEase · Intelligent Resume Screening and Candidate Ranking System
        </footer>

    </main>

</body>
</html>
