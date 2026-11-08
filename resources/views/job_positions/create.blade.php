
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Job Position | RecruitEase</title>

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

        a {
            text-decoration: none;
        }

        /* Sidebar */
        .sidebar {
            width: 255px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #B5121B, #920D16);
            color: white;
            padding: 27px 18px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px 35px;
            color: white;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: var(--accent);
            color: var(--primary-dark);
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .brand h5 {
            margin: 0;
            font-weight: 800;
            font-size: 19px;
        }

        .brand small {
            font-size: 9px;
            color: #f3c6c6;
            letter-spacing: 1.2px;
        }

        .menu-label {
            color: #f0b9b9;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0 13px;
            margin: 15px 0 12px;
        }

        .nav-item-custom {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            color: #f1c9c9;
            font-size: 13px;
            border-radius: 9px;
            margin-bottom: 5px;
        }

        .nav-item-custom:hover,
        .nav-item-custom.active {
            background: rgba(255,255,255,.15);
            color: white;
        }

        .nav-item-custom.active {
            border-left: 4px solid var(--accent);
            font-weight: 700;
        }

        .nav-item-custom i {
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,.15);
            padding-top: 20px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            background: #f8d8a0;
            color: #6b3510;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            flex-shrink: 0;
        }

        .profile-name {
            font-size: 12px;
            font-weight: 700;
        }

        .profile-role {
            font-size: 10px;
            color: #f1c9c9;
        }

        /* Main content */
        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 35px 38px;
        }

        .back-link {
            display: inline-block;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .page-heading h4 {
            font-weight: 800;
            font-size: 23px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 12px;
        }

        /* Form panels */
        .content-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(100,30,20,.05);
            padding: 25px;
            margin-bottom: 22px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 17px;
            margin-bottom: 22px;
            border-bottom: 1px solid #f1ece8;
        }

        .section-icon {
            width: 39px;
            height: 39px;
            border-radius: 11px;
            background: #FFF0F0;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .section-heading h5 {
            font-size: 15px;
            font-weight: 800;
            margin: 0;
        }

        .section-heading p {
            font-size: 11px;
            color: var(--muted);
            margin: 3px 0 0;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .form-control {
            border: 1px solid #E8DED7;
            border-radius: 9px;
            padding: 11px 13px;
            font-size: 12px;
            color: var(--text);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(215,25,32,.08);
        }

        textarea.form-control {
            resize: vertical;
        }

        .form-text {
            font-size: 10px;
            color: var(--muted);
        }

        .required {
            color: var(--primary);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-save {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 11px 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-save:hover {
            background: var(--primary-dark);
            color: white;
        }

        .btn-cancel {
            background: #f5f1ed;
            color: #655c57;
            border: none;
            border-radius: 9px;
            padding: 11px 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-cancel:hover {
            background: #ebe4de;
            color: var(--text);
        }

        .info-box {
            background: #FFF9E8;
            border: 1px solid #F8E7B5;
            border-radius: 10px;
            padding: 13px 15px;
            color: #80601A;
            font-size: 11px;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            color: #a3a5ad;
            font-size: 10px;
            padding: 30px 0 5px;
        }

        @media(max-width: 991px) {
            .sidebar {
                width: 75px;
                padding: 25px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 35px;
            }

            .brand-text,
            .menu-label,
            .nav-text,
            .profile-details {
                display: none;
            }

            .nav-item-custom {
                justify-content: center;
                padding: 13px;
            }

            .profile {
                justify-content: center;
            }

            .main-content {
                margin-left: 75px;
                padding: 25px;
            }
        }

        @media(max-width: 576px) {
            .main-content {
                padding: 20px 12px;
            }

            .content-panel {
                padding: 17px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions button,
            .form-actions a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

@include('components.hr.sidebar')

<main class="main-content">

    <a href="{{ route('job-positions.index') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Job Positions
    </a>

    <div class="page-heading mb-4">
        <h4>Add Job Position</h4>
        <p>Create a vacancy and configure its application and interview settings.</p>
    </div>

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

    <form action="{{ route('job-positions.store') }}" method="POST">
        @csrf

        <!-- Job Details -->
        <section class="content-panel">

            <div class="section-heading">
                <div class="section-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </div>

                <div>
                    <h5>Job Information</h5>
                    <p>Provide the basic details and requirements of the vacancy.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Job Title <span class="required">*</span></label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}"
                           placeholder="e.g. Software Developer"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>

                    <input type="text"
                           name="department"
                           class="form-control"
                           value="{{ old('department') }}"
                           placeholder="e.g. Information Technology">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Job Description</label>

                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              placeholder="Describe the responsibilities and qualifications...">{{ old('description') }}</textarea>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Required Skills <span class="required">*</span></label>

                    <textarea name="required_skills"
                              class="form-control"
                              rows="3"
                              placeholder="Python, PHP, Laravel, MySQL"
                              required>{{ old('required_skills') }}</textarea>

                    <div class="form-text">
                        Separate each required skill using a comma.
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <label class="form-label">Minimum Experience (Years) <span class="required">*</span></label>

                    <input type="number"
                           name="min_experience_years"
                           class="form-control"
                           min="0"
                           value="{{ old('min_experience_years', 0) }}"
                           required>
                </div>

            </div>

        </section>

        <!-- Application Settings -->
        <section class="content-panel">

            <div class="section-heading">
                <div class="section-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>

                <div>
                    <h5>Application Settings</h5>
                    <p>Set the deadline for accepting applications.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Application Deadline <span class="required">*</span></label>

                    <input type="datetime-local"
                           name="application_deadline"
                           class="form-control"
                           value="{{ old('application_deadline') }}"
                           min="{{ now()->format('Y-m-d\TH:i') }}"
                           required>

                    <div class="form-text">
                        Applications will automatically close when this date and time is reached.
                    </div>
                </div>

            </div>

            <div class="info-box">
                <i class="bi bi-info-circle-fill me-1"></i>
                <strong>Automatic vacancy status:</strong>
                The system will determine whether this vacancy is open or closed based on its application deadline.
                You will not need to manually close it after the deadline.
            </div>

        </section>

        <!-- Interview Configuration -->
        <section class="content-panel">

            <div class="section-heading">
                <div class="section-icon">
                    <i class="bi bi-calendar2-event"></i>
                </div>

                <div>
                    <h5>Automatic Interview Configuration</h5>
                    <p>Configure interview availability for shortlisted candidates.</p>
                </div>
            </div>

            <div class="info-box mb-4">
                <i class="bi bi-lightbulb-fill me-1"></i>
                Once the application deadline passes, RecruitEase will screen and rank the submitted resumes,
                select the top candidates, assign interview slots, and send invitations automatically.
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Interview Date <span class="required">*</span></label>

                    <input type="date"
                           name="interview_date"
                           class="form-control"
                           value="{{ old('interview_date') }}"
                           min="{{ now()->toDateString() }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Number of Shortlisted Candidates <span class="required">*</span></label>

                    <input type="number"
                           name="shortlist_limit"
                           class="form-control"
                           min="1"
                           max="100"
                           value="{{ old('shortlist_limit', 10) }}"
                           required>

                    <div class="form-text">
                        Default is the top 10 candidates based on resume match scores.
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Interview Start Time <span class="required">*</span></label>

                    <input type="time"
                           name="interview_start_time"
                           class="form-control"
                           value="{{ old('interview_start_time') }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Interview End Time <span class="required">*</span></label>

                    <input type="time"
                           name="interview_end_time"
                           class="form-control"
                           value="{{ old('interview_end_time') }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Duration Per Candidate (Minutes) <span class="required">*</span></label>

                    <input type="number"
                           name="interview_duration_minutes"
                           class="form-control"
                           min="5"
                           max="480"
                           value="{{ old('interview_duration_minutes', 30) }}"
                           required>

                    <div class="form-text">
                        Each shortlisted candidate will receive an individual interview slot.
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <h6 class="fw-bold mb-3" style="font-size:13px;">
                Interview Location and Instructions
            </h6>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Interview Location</label>

                    <input type="text"
                           name="interview_location"
                           class="form-control"
                           value="{{ old('interview_location') }}"
                           placeholder="e.g. Main Office, Meeting Room 2">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Online Meeting Link</label>

                    <input type="url"
                           name="interview_meeting_link"
                           class="form-control"
                           value="{{ old('interview_meeting_link') }}"
                           placeholder="https://meet.google.com/...">

                    <div class="form-text">
                        Provide this if interviews will be conducted online.
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Additional Interview Instructions</label>

                    <textarea name="interview_instructions"
                              class="form-control"
                              rows="3"
                              placeholder="e.g. Please arrive 15 minutes early and bring a valid ID.">{{ old('interview_instructions') }}</textarea>
                </div>

            </div>

        </section>

        <div class="form-actions mb-4">
            <a href="{{ route('job-positions.index') }}" class="btn-cancel">
                Cancel
            </a>

            <button type="submit" class="btn-save">
                <i class="bi bi-check-circle me-1"></i>
                Create Job Position
            </button>
        </div>

    </form>

    <footer class="footer">
        © {{ date('Y') }} RecruitEase ·
        Intelligent Resume Screening and Candidate Ranking System
    </footer>

</main>

</body>
</html>
