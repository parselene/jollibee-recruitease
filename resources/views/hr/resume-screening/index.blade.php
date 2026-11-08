
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

        .nav-item-custom i { font-size: 17px; }

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
        }

        .profile-name { font-size: 12px; font-weight: 700; }
        .profile-role { font-size: 10px; color: #f1c9c9; }

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 35px 38px;
        }

        .page-heading h4 {
            font-weight: 800;
            font-size: 24px;
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
            font-size: 11px;
            font-weight: 600;
        }

        .content-panel { padding: 24px; }

        .panel-title {
            font-size: 16px;
            font-weight: 800;
        }

        .panel-subtitle {
            color: var(--muted);
            font-size: 11px;
        }

        .filter-select {
            max-width: 280px;
            font-size: 12px;
            border-color: var(--border);
            border-radius: 9px;
        }

        .table {
            font-size: 12px;
            vertical-align: middle;
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
            width: 115px;
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

        .skill-badge {
            display: inline-block;
            background: #FFF0F0;
            color: #B5121B;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            margin: 2px;
        }

        .matched-badge {
    display: inline-block;
    background: #EAF7ED;
    color: #27834A;
    padding: 5px 9px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
    margin: 2px;
}

.missing-badge {
    display: inline-block;
    background: #FFF0F0;
    color: #D71920;
    padding: 5px 9px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
    margin: 2px;
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
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
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

        @media(max-width: 991px) {
            .sidebar {
                width: 75px;
                padding: 25px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 35px;
            }

            .brand-text, .menu-label, .nav-text, .profile-details {
                display: none;
            }

            .nav-item-custom {
                justify-content: center;
                padding: 13px;
            }

            .profile { justify-content: center; }

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

    <a href="{{ route('dashboard') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
    </a>

    <div class="page-heading mb-4">
        <h4>AI Resume Screening</h4>
        <p>
            Analyze resumes, evaluate job-skill compatibility, and identify
            the strongest candidate matches.
        </p>
    </div>

    <!-- Screening Statistics -->
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

    <!-- Candidate Ranking -->
    <section class="content-panel">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h5 class="panel-title mb-1">
                    <i class="bi bi-bar-chart-line-fill text-danger me-2"></i>
                    Candidate Ranking
                </h5>
                <p class="panel-subtitle mb-0">
                    Candidates are grouped by job position and sorted by match score.
                </p>
            </div>

            <form action="{{ route('hr.resume-screening.index') }}"
                  method="GET"
                  class="d-flex gap-2 align-items-center">

                <select name="job_position_id"
                        class="form-select filter-select"
                        onchange="this.form.submit()">

                    <option value="">All Job Positions</option>

                    @foreach($jobPositions as $job)
                        <option value="{{ $job->id }}"
                            {{ (string) $selectedJob === (string) $job->id ? 'selected' : '' }}>
                            {{ $job->title }}
                        </option>
                    @endforeach

                </select>

                @if($selectedJob)
                    <a href="{{ route('hr.resume-screening.index') }}"
                       class="btn btn-outline-secondary btn-sm">
                        Clear
                    </a>
                @endif

            </form>
        </div>

        <div class="table-responsive">
            <table class="table">

<thead>
    <tr>
        <th>APPLICANT</th>
        <th>JOB POSITION</th>
        <th>MATCH SCORE</th>
        <th>EXTRACTED SKILLS</th>
        <th>MATCHED SKILLS</th>
        <th>MISSING SKILLS</th>
        <th>RESUME</th>
    </tr>
</thead>

<tbody>

    @forelse($applications as $application)

        <tr>

            {{-- APPLICANT --}}
            <td>
                <div class="candidate-name">
                    {{ $application->applicant?->full_name ?? 'Applicant unavailable' }}
                </div>
                <div class="candidate-email">
                    {{ $application->applicant?->email ?? 'No email available' }}
                </div>
            </td>

            {{-- JOB POSITION --}}
            <td>
                <div class="fw-bold">
                    {{ $application->jobPosition?->title ?? 'Position unavailable' }}
                </div>
                <small class="text-muted">
                    {{ $application->jobPosition?->department ?? 'No department' }}
                </small>
            </td>

            {{-- MATCH SCORE --}}
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
                             style="width: {{ min(100, max(0, $score)) }}%;">
                        </div>
                    </div>

                @else
                    <span class="text-muted">Not yet scored</span>
                @endif
            </td>

            {{-- EXTRACTED SKILLS --}}
            <td class="skill-column">
                @if(!empty($application->resume?->extracted_skills))

                    @foreach($application->resume->extracted_skills as $skill)
                        <span class="skill-badge">
                            {{ $skill }}
                        </span>
                    @endforeach

                @else
                    <span class="skill-empty">No skills detected</span>
                @endif
            </td>

            {{-- MATCHED SKILLS --}}
            <td class="skill-column">
                @if(!is_null($application->resume?->matched_skills)
                    && count($application->resume->matched_skills) > 0)

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

            {{-- MISSING SKILLS --}}
            <td class="skill-column">
                @if(!is_null($application->resume?->missing_skills)
                    && count($application->resume->missing_skills) > 0)

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

            {{-- RESUME --}}
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

    @empty

        <tr>
            <td colspan="7">
                <div class="empty-state">
                    <i class="bi bi-search"></i>
                    <h5>No Screening Results</h5>
                    <p>
                        Uploaded resumes and their screening results
                        will appear here.
                    </p>
                </div>
            </td>
        </tr>

    @endforelse

</tbody>

            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $applications->links() }}
        </div>

    </section>

    <footer class="footer">
        © {{ date('Y') }} RecruitEase ·
        Intelligent Resume Screening and Candidate Ranking System
    </footer>

</main>

</body>
</html>
