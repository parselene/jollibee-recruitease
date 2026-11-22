
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Candidate Rankings | RecruitEase</title>

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

        .stat-card, .content-panel {
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

        .content-panel {
            padding: 24px;
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

        .panel-title {
            font-size: 16px;
            font-weight: 800;
        }

        .panel-subtitle {
            color: var(--muted);
            font-size: 11px;
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

        .status-badge {
            font-size: 10px;
            font-weight: 700;
            border-radius: 20px;
            padding: 6px 10px;
        }

        .table {
            font-size: 12px;
            vertical-align: middle;
            margin-bottom: 0;
        }

        .table thead th {
            color: #9599a6;
            font-size: 10px;
            letter-spacing: .6px;
            border-bottom: 1px solid #eee;
            padding: 14px 12px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 17px 12px;
            border-color: #f1f1f2;
        }

        .candidate-name {
            font-weight: 800;
            color: var(--text);
        }

        .candidate-email {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        .score-number {
            font-size: 15px;
            font-weight: 800;
            color: var(--primary);
        }

        .score-bar {
            width: 105px;
            height: 6px;
            background: #f1eeee;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 6px;
        }

        .score-fill {
            height: 100%;
            background: linear-gradient(90deg, #D71920, #FF8B57);
            border-radius: 10px;
        }

        .skill-badge, .matched-badge, .missing-badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            margin: 2px;
        }

        .skill-badge {
            background: #FFF0F0;
            color: #B5121B;
        }

        .matched-badge {
            background: #EAF7ED;
            color: #27834A;
        }

        .missing-badge {
            background: #FFF0F0;
            color: #D71920;
        }

        .skill-empty {
            color: var(--muted);
            font-size: 11px;
        }

        .skill-column {
            min-width: 160px;
            max-width: 230px;
        }

        .download-btn {
            background: #FFF0F0;
            color: var(--primary);
            border-radius: 8px;
            padding: 8px 11px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
            white-space: nowrap;
        }

        .download-btn:hover {
            background: var(--primary);
            color: white;
        }

        .empty-state {
            padding: 55px 20px;
            text-align: center;
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

        .footer {
            text-align: center;
            color: #a3a5ad;
            font-size: 10px;
            padding: 30px 0 5px;
        }

        .pagination {
            font-size: 12px;
        }

        @media(max-width: 991px) {
            .main-content {
                margin-left: 75px;
                padding: 25px;
            }
        }

        @media(max-width: 576px) {
            .main-content { padding: 20px 12px; }
            .content-panel { padding: 15px; }
        }
    </style>
</head>

<body>

@include('components.hr.sidebar')

<main class="main-content">

    <!-- BACK TO JOB POSITIONS -->
    <a href="{{ route('hr.resume-screening.index') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i> Back to Job Positions
    </a>

    <!-- PAGE HEADING -->
    <div class="page-heading mb-4">
        <h4>Candidate Rankings</h4>
        <p>
            Review applicant assessments, compare resume compatibility,
            and identify candidates based on their screening results.
        </p>
    </div>

    <!-- OVERALL STATISTICS FOR SELECTED JOB -->
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

    <!-- SELECTED JOB POSITION -->
    <div class="content-panel mb-4">

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

            <div class="d-flex align-items-center gap-3">

                <div class="job-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </div>

                <div>
                    <h5 class="panel-title mb-1">
                        {{ $selectedJobPosition->title }}
                    </h5>

                    <p class="panel-subtitle mb-0">
                        <i class="bi bi-building me-1"></i>
                        {{ $selectedJobPosition->department ?: 'No department specified' }}
                    </p>
                </div>

            </div>

            <span class="status-badge" style="background:#FFF6DD;color:#9A6A00;">
                <i class="bi bi-bar-chart-fill me-1"></i>
                Candidate Ranking
            </span>

        </div>

        <hr style="border-color:var(--border);">

        <div class="row g-3">

            <div class="col-6 col-md-3">
                <div class="metric-label">APPLICANTS</div>
                <div class="metric-value">
                    {{ $selectedJobPosition->applicant_count }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="metric-label">SCREENED</div>
                <div class="metric-value">
                    {{ $selectedJobPosition->screened_count }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="metric-label">STRONG MATCHES</div>
                <div class="metric-value" style="color:#27834A;">
                    {{ $selectedJobPosition->strong_match_count }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="metric-label">AVERAGE MATCH SCORE</div>
                <div class="metric-value" style="color:var(--primary);">
                    {{ number_format((float) ($selectedJobPosition->average_match_score ?? 0), 2) }}%
                </div>
            </div>

        </div>

    </div>

    <!-- CANDIDATE RANKING TABLE -->
    <section class="content-panel">

        <div class="mb-4">
            <h5 class="panel-title mb-1">
                <i class="bi bi-trophy-fill text-warning me-2"></i>
                Ranked Candidates
            </h5>

            <p class="panel-subtitle mb-0">
                Candidates are arranged from highest to lowest overall match score.
            </p>
        </div>

        @if($applications->count() > 0)

            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>RANK</th>
                            <th>APPLICANT</th>
                            <th>OVERALL MATCH</th>
                            <th>SKILLS SCORE</th>
                            <th>SEMANTIC SCORE</th>
                            <th>EXTRACTED SKILLS</th>
                            <th>MATCHED SKILLS</th>
                            <th>MISSING SKILLS</th>
                            <th>RESUME</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($applications as $index => $application)

                            <tr>

                                <td>
                                    <span class="fw-bold">
                                        #{{ $applications->firstItem() + $index }}
                                    </span>
                                </td>

                                <td>
                                    <div class="candidate-name">
                                        {{ $application->applicant?->full_name ?? 'Applicant unavailable' }}
                                    </div>

                                    <div class="candidate-email">
                                        {{ $application->applicant?->email ?? 'No email available' }}
                                    </div>
                                </td>

                                <td>
                                    @if($application->resume?->match_score !== null)

                                        @php
                                            $score = (float) $application->resume->match_score;
                                        @endphp

                                        <div class="score-number">
                                            {{ number_format($score, 2) }}%
                                        </div>

                                        <div class="score-bar">
                                            <div class="score-fill"
                                                 style="width:{{ min(100, max(0, $score)) }}%;">
                                            </div>
                                        </div>

                                    @else
                                        <span class="text-muted">Not yet scored</span>
                                    @endif
                                </td>

                                <td>
                                    @if($application->resume?->skills_score !== null)
                                        <strong>
                                            {{ number_format((float) $application->resume->skills_score, 2) }}%
                                        </strong>
                                    @else
                                        <span class="text-muted">Pending</span>
                                    @endif
                                </td>

                                <td>
                                    @if($application->resume?->semantic_score !== null)
                                        <strong>
                                            {{ number_format((float) $application->resume->semantic_score, 2) }}%
                                        </strong>
                                    @else
                                        <span class="text-muted">Pending</span>
                                    @endif
                                </td>

                                <td class="skill-column">
                                    @if(!empty($application->resume?->extracted_skills))

                                        @foreach($application->resume->extracted_skills as $skill)
                                            <span class="skill-badge">{{ $skill }}</span>
                                        @endforeach

                                    @else
                                        <span class="skill-empty">No skills detected</span>
                                    @endif
                                </td>

                                <td class="skill-column">
                                    @if(!empty($application->resume?->matched_skills))

                                        @foreach($application->resume->matched_skills as $skill)
                                            <span class="matched-badge">
                                                <i class="bi bi-check-circle-fill me-1"></i>
                                                {{ $skill }}
                                            </span>
                                        @endforeach

                                    @elseif($application->resume?->match_score !== null)
                                        <span class="skill-empty">No matched skills</span>
                                    @else
                                        <span class="skill-empty">Not yet screened</span>
                                    @endif
                                </td>

                                <td class="skill-column">
                                    @if(!empty($application->resume?->missing_skills))

                                        @foreach($application->resume->missing_skills as $skill)
                                            <span class="missing-badge">
                                                <i class="bi bi-x-circle-fill me-1"></i>
                                                {{ $skill }}
                                            </span>
                                        @endforeach

                                    @elseif($application->resume?->match_score !== null)
                                        <span class="skill-empty">No missing skills</span>
                                    @else
                                        <span class="skill-empty">Not yet screened</span>
                                    @endif
                                </td>

                                <td>
                                    @if($application->resume)

                                        <a href="{{ route('hr.applications.resume.download', $application->id) }}"
                                           class="download-btn">
                                            <i class="bi bi-download me-1"></i>
                                            View Resume
                                        </a>

                                    @else
                                        <span class="text-muted">Unavailable</span>
                                    @endif
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-4">

                <small class="text-muted">
                    Showing {{ $applications->firstItem() }}–{{ $applications->lastItem() }}
                    of {{ $applications->total() }} candidates
                </small>

                {{ $applications->links() }}

            </div>

        @else

            <div class="empty-state">
                <i class="bi bi-people"></i>
                <h5>No Applicants Yet</h5>
                <p>
                    Applicants who submit resumes for this position
                    will appear here.
                </p>
            </div>

        @endif

    </section>

    <footer class="footer">
        © {{ date('Y') }} RecruitEase ·
        Intelligent Resume Screening and Candidate Ranking System
    </footer>

</main>

</body>
</html>
