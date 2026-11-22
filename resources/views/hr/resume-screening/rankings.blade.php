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

        .back-link:hover {
            color: var(--primary-dark);
        }

        .stat-card,
        .content-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(100,30,20,.05);
        }

        .stat-card {
            padding: 20px;
            height: 100%;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-number {
            font-size: 26px;
            font-weight: 800;
            margin-top: 14px;
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
            width: 45px;
            height: 45px;
            background: #FFF0F0;
            color: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
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

        .status-badge {
            font-size: 10px;
            font-weight: 700;
            border-radius: 20px;
            padding: 7px 11px;
            background: #FFF6DD;
            color: #9A6A00;
        }

        /* AI SCREENING SUMMARY */

        .ai-summary {
            background: linear-gradient(110deg, #FFF0F0, #FFF9F0);
            border: 1px solid #F3D9D5;
            border-radius: 14px;
            padding: 17px 20px;
        }

        .ai-summary-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            background: white;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .ai-summary h6 {
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .ai-summary p {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 0;
            line-height: 1.6;
        }

        .weight-label {
            background: white;
            border: 1px solid #F3D9D5;
            color: var(--primary);
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* RANKING TABLE */

        .table {
            font-size: 12px;
            vertical-align: middle;
            margin-bottom: 0;
        }

        .table thead th {
            color: #9599a6;
            font-size: 10px;
            letter-spacing: .5px;
            border-bottom: 1px solid #eee;
            padding: 14px 12px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px 12px;
            border-color: #f1f1f2;
        }

        .rank-number {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF6DD;
            color: #9A6A00;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 800;
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
            width: 110px;
            max-width: 100%;
            height: 6px;
            background: #f1eeee;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 7px;
        }

        .score-fill {
            height: 100%;
            background: linear-gradient(90deg, #D71920, #FF8B57);
            border-radius: 10px;
        }

        .skills-score {
            font-weight: 800;
            color: var(--text);
        }

        .pending-label {
            color: var(--muted);
            font-size: 11px;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .download-btn,
        .analysis-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            border-radius: 8px;
            padding: 8px 11px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s;
        }

        .download-btn {
            background: #FFF0F0;
            color: var(--primary);
            border: 1px solid #F3D9D5;
        }

        .download-btn:hover {
            background: var(--primary);
            color: white;
        }

        .analysis-btn {
            background: white;
            color: #806000;
            border: 1px solid #F0E1B9;
        }

        .analysis-btn:hover {
            background: #FFF6DD;
            color: #806000;
        }

        /* EXPANDED AI ANALYSIS */

        .analysis-details {
            background: #FFFCF8;
            padding: 22px;
            border-top: 1px solid var(--border);
        }

        .analysis-heading {
            font-size: 13px;
            font-weight: 800;
        }

        .analysis-card {
            height: 100%;
            background: white;
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 16px;
        }

        .analysis-card-title {
            font-size: 11px;
            color: var(--muted);
            font-weight: 700;
            margin-bottom: 9px;
        }

        .analysis-card-score {
            font-size: 22px;
            color: var(--primary);
            font-weight: 800;
        }

        .analysis-progress {
            width: 100%;
            height: 7px;
            background: #f1eeee;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }

        .analysis-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #D71920, #FF8B57);
            border-radius: 10px;
        }

        .analysis-description {
            font-size: 10px;
            color: var(--muted);
            margin-top: 9px;
            line-height: 1.5;
        }

        .skill-section {
            background: white;
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 16px;
            height: 100%;
        }

        .skill-section h6 {
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .skill-badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            margin: 2px;
        }

        .extracted-badge {
            background: #F2F0EE;
            color: #625C57;
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
            font-size: 10px;
        }

        .analysis-note {
            background: #F7F5F2;
            padding: 11px 13px;
            border-radius: 9px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        /* EMPTY STATE AND FOOTER */

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
            .main-content {
                padding: 20px 12px;
            }

            .content-panel {
                padding: 15px;
            }

            .stat-card {
                padding: 15px;
            }

            .analysis-details {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

@include('components.hr.sidebar')

<main class="main-content">

    <a href="{{ route('hr.resume-screening.index') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Job Positions
    </a>

    <!-- PAGE HEADING -->

    <div class="page-heading mb-4">
        <h4>Candidate Rankings</h4>
        <p>
            Compare applicant compatibility and review AI-assisted resume screening results.
        </p>
    </div>

    <!-- SUMMARY STATISTICS -->

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

    <!-- SELECTED JOB -->

    <div class="content-panel mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

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

            <span class="status-badge">
                <i class="bi bi-bar-chart-fill me-1"></i>
                Candidate Ranking
            </span>

        </div>
    </div>

    <!-- AI SCREENING EXPLANATION -->

    <div class="ai-summary mb-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

            <div class="d-flex align-items-center gap-3">
                <div class="ai-summary-icon">
                    <i class="bi bi-robot"></i>
                </div>

                <div>
                    <h6>AI-Powered Resume Assessment</h6>
                    <p>
                        RecruitEase extracts resume information, identifies relevant skills,
                        and uses a pretrained language model to compare resume content
                        with the selected job description.
                    </p>
                </div>
            </div>

            <div class="d-flex gap-2 flex-wrap">
                <span class="weight-label">50% Skills Matching</span>
                <span class="weight-label">50% Semantic Similarity</span>
            </div>

        </div>
    </div>

    <!-- RANKED CANDIDATES -->

    <section class="content-panel">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h5 class="panel-title mb-1">
                    <i class="bi bi-trophy-fill text-warning me-2"></i>
                    Ranked Candidates
                </h5>

                <p class="panel-subtitle mb-0">
                    Applicants are ordered by their overall resume match score.
                </p>
            </div>
        </div>

        @if($applications->count() > 0)

            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>RANK</th>
                            <th>APPLICANT</th>
                            <th>OVERALL MATCH</th>
                            <th>SKILLS MATCH</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($applications as $index => $application)

                            @php
                                $resume = $application->resume;
                                $score = $resume?->match_score !== null
                                    ? (float) $resume->match_score
                                    : null;

                                $skillsScore = $resume?->skills_score !== null
                                    ? (float) $resume->skills_score
                                    : null;

                                $semanticScore = $resume?->semantic_score !== null
                                    ? (float) $resume->semantic_score
                                    : null;

                                $extractedSkills = $resume?->extracted_skills ?? [];
                                $matchedSkills = $resume?->matched_skills ?? [];
                                $missingSkills = $resume?->missing_skills ?? [];
                            @endphp

                            <!-- CANDIDATE ROW -->

                            <tr>

                                <td>
                                    <div class="rank-number">
                                        #{{ $applications->firstItem() + $index }}
                                    </div>
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
                                    @if($score !== null)

                                        <div class="score-number">
                                            {{ number_format($score, 2) }}%
                                        </div>

                                        <div class="score-bar">
                                            <div class="score-fill"
                                                style="width:{{ min(100, max(0, $score)) }}%;">
                                            </div>
                                        </div>

                                    @else
                                        <span class="pending-label">Pending screening</span>
                                    @endif
                                </td>

                                <td>
                                    @if($skillsScore !== null)
                                        <span class="skills-score">
                                            {{ number_format($skillsScore, 2) }}%
                                        </span>
                                    @else
                                        <span class="pending-label">Pending</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="action-group">

                                        @if($resume)
                                            <a href="{{ route('hr.applications.resume.download', $application->id) }}"
                                                class="download-btn">
                                                <i class="bi bi-file-earmark-pdf"></i>
                                                Resume
                                            </a>
                                        @else
                                            <span class="pending-label">No resume</span>
                                        @endif

                                        <button
                                            class="analysis-btn"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#analysis{{ $application->id }}"
                                            aria-expanded="false"
                                            aria-controls="analysis{{ $application->id }}">

                                            <i class="bi bi-stars"></i>
                                            View Analysis
                                        </button>

                                    </div>
                                </td>

                            </tr>

                            <!-- EXPANDABLE AI ANALYSIS -->

                            <tr>
                                <td colspan="5" class="p-0">

                                    <div class="collapse" id="analysis{{ $application->id }}">

                                        <div class="analysis-details">

                                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">

                                                <h6 class="analysis-heading mb-0">
                                                    <i class="bi bi-robot me-2" style="color:var(--primary);"></i>
                                                    Screening Analysis
                                                </h6>

                                                <span class="pending-label">
                                                    Applicant:
                                                    {{ $application->applicant?->full_name ?? 'Unavailable' }}
                                                </span>

                                            </div>

                                            @if($resume && $score !== null)

                                                <!-- SCORE BREAKDOWN -->

                                                <div class="row g-3 mb-3">

                                                    <div class="col-md-6">
                                                        <div class="analysis-card">

                                                            <div class="analysis-card-title">
                                                                SKILLS MATCHING
                                                            </div>

                                                            <div class="analysis-card-score">
                                                                {{ $skillsScore !== null ? number_format($skillsScore, 2) . '%' : 'Pending' }}
                                                            </div>

                                                            @if($skillsScore !== null)
                                                                <div class="analysis-progress">
                                                                    <div class="analysis-progress-fill"
                                                                        style="width:{{ min(100, max(0, $skillsScore)) }}%;">
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <p class="analysis-description">
                                                                Evaluates how many of the job's required skills
                                                                were identified in the applicant's resume.
                                                            </p>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="analysis-card">

                                                            <div class="analysis-card-title">
                                                                SEMANTIC SIMILARITY
                                                            </div>

                                                            <div class="analysis-card-score">
                                                                {{ $semanticScore !== null ? number_format($semanticScore, 2) . '%' : 'Pending' }}
                                                            </div>

                                                            @if($semanticScore !== null)
                                                                <div class="analysis-progress">
                                                                    <div class="analysis-progress-fill"
                                                                        style="width:{{ min(100, max(0, $semanticScore)) }}%;">
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <p class="analysis-description">
                                                                Uses sentence embeddings to measure contextual
                                                                similarity between the resume and job description.
                                                            </p>

                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- SKILL FINDINGS -->

                                                <div class="row g-3">

                                                    <div class="col-md-4">
                                                        <div class="skill-section">

                                                            <h6>
                                                                <i class="bi bi-search me-1"></i>
                                                                Identified Skills
                                                            </h6>

                                                            @forelse($extractedSkills as $skill)
                                                                <span class="skill-badge extracted-badge">
                                                                    {{ $skill }}
                                                                </span>
                                                            @empty
                                                                <span class="skill-empty">
                                                                    No skills identified.
                                                                </span>
                                                            @endforelse

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="skill-section">

                                                            <h6 style="color:#27834A;">
                                                                <i class="bi bi-check-circle-fill me-1"></i>
                                                                Matching Requirements
                                                            </h6>

                                                            @forelse($matchedSkills as $skill)
                                                                <span class="skill-badge matched-badge">
                                                                    {{ $skill }}
                                                                </span>
                                                            @empty
                                                                <span class="skill-empty">
                                                                    No matching skills recorded.
                                                                </span>
                                                            @endforelse

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="skill-section">

                                                            <h6 style="color:var(--primary);">
                                                                <i class="bi bi-exclamation-circle me-1"></i>
                                                                Missing Requirements
                                                            </h6>

                                                            @forelse($missingSkills as $skill)
                                                                <span class="skill-badge missing-badge">
                                                                    {{ $skill }}
                                                                </span>
                                                            @empty
                                                                <span class="skill-empty">
                                                                    No missing skills recorded.
                                                                </span>
                                                            @endforelse

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="analysis-note mt-3">
                                                    <i class="bi bi-info-circle me-1"></i>
                                                    These results are AI-assisted screening indicators.
                                                    Semantic similarity measures textual relevance, not
                                                    verified qualifications or guaranteed job performance.
                                                    HR should review the original resume before making
                                                    recruitment decisions.
                                                </div>

                                            @else

                                                <div class="text-center py-4">
                                                    <i class="bi bi-hourglass-split fs-3 text-muted"></i>
                                                    <p class="pending-label mt-2 mb-0">
                                                        This resume has not completed AI screening yet.
                                                    </p>
                                                </div>

                                            @endif

                                        </div>

                                    </div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>