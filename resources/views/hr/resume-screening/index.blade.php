
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Resume Screening | RecruitEase</title>

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

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a { text-decoration: none; }

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 35px 38px;
        }

        .page-heading h4 {
            font-weight: 800;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 12px;
        }

        .back-link {
            display: inline-block;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .stat-card, .content-panel, .job-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(100,30,20,.05);
        }

        .stat-card {
            padding: 21px;
            height: 100%;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .stat-number {
            font-size: 27px;
            font-weight: 800;
            margin-top: 15px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .section-title {
            font-size: 17px;
            font-weight: 800;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 11px;
        }

        .job-card {
            padding: 23px;
            height: 100%;
            transition: .2s ease;
            display: flex;
            flex-direction: column;
        }

        .job-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 13px 30px rgba(100,30,20,.10);
            border-color: #EBC1BC;
        }

        .job-icon {
            width: 46px;
            height: 46px;
            background: #FFF0F0;
            color: var(--primary);
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            flex-shrink: 0;
        }

        .job-title {
            font-size: 17px;
            font-weight: 800;
            margin-top: 19px;
            margin-bottom: 4px;
        }

        .job-department {
            color: var(--muted);
            font-size: 11px;
        }

        .applicant-count {
            font-size: 30px;
            font-weight: 800;
            color: var(--primary);
        }

        .job-metrics {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            padding: 16px 0;
            margin-top: 12px;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .metric-label {
            font-size: 10px;
            color: var(--muted);
        }

        .metric-value {
            font-size: 14px;
            font-weight: 800;
            margin-top: 3px;
        }

        .view-candidates {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 20px;
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
        }

        .view-candidates:hover {
            color: var(--primary-dark);
        }

        .empty-state {
            padding: 55px 20px;
            text-align: center;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(100,30,20,.05);
        }

        .empty-state i {
            font-size: 42px;
            color: #e6b9b9;
        }

        .empty-state h5 {
            font-size: 16px;
            font-weight: 800;
            margin-top: 15px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 12px;
        }

        .status-badge {
            font-size: 10px;
            font-weight: 700;
            border-radius: 20px;
            padding: 6px 10px;
        }

        .footer {
            text-align: center;
            color: #a3a5ad;
            font-size: 10px;
            padding: 30px 0 5px;
        }

        @media(max-width: 991px) {
            .main-content {
                margin-left: 75px;
                padding: 25px;
            }
        }

        @media(max-width: 576px) {
            .main-content { padding: 20px 12px; }
        }
    </style>
</head>

<body>

@include('components.hr.sidebar')

<main class="main-content">

    <a href="{{ route('dashboard') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
    </a>

    <!-- PAGE HEADING -->
    <div class="page-heading mb-4">
        <h4>AI Resume Screening</h4>
        <p>
            Evaluate applicant resumes, review job compatibility,
            and compare candidates based on their assessment scores.
        </p>
    </div>

    <!-- OVERALL STATISTICS -->
    <div class="row g-3 mb-4">

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon" style="background:#FFF0F0;color:#D71920;">
                    <i class="bi bi-file-earmark-check"></i>
                </div>
                <div class="stat-number">{{ $totalScreened }}</div>
                <div class="stat-label">SCREENED RESUMES</div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon" style="background:#FFF6DD;color:#B17A00;">
                    <i class="bi bi-bullseye"></i>
                </div>
                <div class="stat-number">
                    {{ number_format($averageMatchScore, 2) }}%
                </div>
                <div class="stat-label">AVERAGE MATCH SCORE</div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon" style="background:#EAF7ED;color:#27834A;">
                    <i class="bi bi-trophy"></i>
                </div>
                <div class="stat-number">{{ $strongMatches }}</div>
                <div class="stat-label">STRONG MATCHES (70%+)</div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon" style="background:#EAF0FF;color:#4167AE;">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div class="stat-number">{{ $pendingScreening }}</div>
                <div class="stat-label">PENDING SCREENING</div>
            </div>
        </div>

    </div>

    <!-- JOB POSITION OVERVIEW -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">

        <div>
            <h5 class="section-title mb-1">
                <i class="bi bi-grid-fill text-danger me-2"></i>
                Job Position Screening
            </h5>

            <p class="section-subtitle mb-0">
                Select a job position to view its ranked applicants and screening results.
            </p>
        </div>

        <span class="text-muted small">
            {{ $jobPositions->count() }} job position(s)
        </span>

    </div>

    @if($jobPositions->count() > 0)

        <div class="row g-3">

            @foreach($jobPositions as $job)

                <div class="col-md-6 col-xl-4">

                    <a href="{{ route('hr.resume-screening.index', ['job_position_id' => $job->id]) }}"
                       class="text-decoration-none text-reset">

                        <div class="job-card">

                            <div class="d-flex justify-content-between align-items-start">

                                <div class="job-icon">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>
                                    @if($job->application_deadline && $job->application_deadline->isFuture())
                                        <span class="status-badge status-active">Active</span>
                                    @else
                                        <span class="status-badge status-inactive">Closed</span>
                                    @endif

                            </div>

                            <div class="job-title">
                                {{ $job->title }}
                            </div>

                            <div class="job-department">
                                <i class="bi bi-building me-1"></i>
                                {{ $job->department ?: 'No department specified' }}
                            </div>

                            <div class="mt-3">
                                <div class="applicant-count">
                                    {{ $job->applicant_count }}
                                </div>

                                <div class="metric-label">
                                    APPLICANTS WITH RESUMES
                                </div>
                            </div>

                            <div class="job-metrics">

                                <div>
                                    <div class="metric-value">
                                        {{ $job->screened_count }}
                                    </div>
                                    <div class="metric-label">Screened</div>
                                </div>

                                <div>
                                    <div class="metric-value">
                                        {{ $job->pending_count }}
                                    </div>
                                    <div class="metric-label">Pending</div>
                                </div>

                                <div>
                                    <div class="metric-value" style="color:#27834A;">
                                        {{ $job->strong_match_count }}
                                    </div>
                                    <div class="metric-label">Strong Matches</div>
                                </div>

                                <div>
                                    <div class="metric-value">
                                        {{ number_format((float) ($job->average_match_score ?? 0), 2) }}%
                                    </div>
                                    <div class="metric-label">Average Score</div>
                                </div>

                            </div>

                            <div class="view-candidates">
                                <span>View Candidate Rankings</span>
                                <i class="bi bi-arrow-right"></i>
                            </div>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-state">
            <i class="bi bi-briefcase"></i>
            <h5>No Job Positions Found</h5>
            <p>Create a job position first to start reviewing applicant resumes.</p>
        </div>

    @endif

    <footer class="footer">
        © {{ date('Y') }} RecruitEase ·
        Intelligent Resume Screening and Candidate Ranking System
    </footer>

</main>

</body>
</html>
