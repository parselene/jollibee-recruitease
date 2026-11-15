
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reports & Analytics | RecruitEase</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        .btn-primary-custom {
            background: var(--primary);
            border: 1px solid var(--primary);
            color: white;
            border-radius: 9px;
            padding: 10px 16px;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
        }

        .btn-outline-custom {
            background: white;
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 9px;
            padding: 10px 16px;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-outline-custom:hover {
            background: #FFF0F0;
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-panel,
        .stat-card,
        .content-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(100,30,20,.05);
        }

        .filter-panel {
            padding: 22px;
            margin: 25px 0;
        }

        .filter-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--muted);
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            font-size: 12px;
            border-color: var(--border);
            border-radius: 9px;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 .2rem rgba(215,25,32,.08);
        }

        .stat-card {
            padding: 20px;
            height: 100%;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
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
            font-size: 28px;
            font-weight: 800;
            line-height: 1.2;
        }

        .stat-label {
            color: var(--muted);
            font-size: 11px;
            margin-top: 6px;
        }

        .content-panel {
            padding: 24px;
            margin-top: 22px;
        }

        .panel-heading h5 {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .panel-heading p {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 0;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .chart-container.donut {
            height: 280px;
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
            padding: 15px 12px;
            border-color: #f1f1f2;
        }

        .job-name {
            font-weight: 800;
        }

        .score-badge {
            display: inline-block;
            background: #EAF7ED;
            color: #27834A;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
        }

        .no-score {
            color: var(--muted);
            font-size: 11px;
        }

        .footer {
            text-align: center;
            color: #a3a5ad;
            font-size: 10px;
            padding: 30px 0 5px;
        }

        .section-label {
            font-size: 11px;
            color: var(--muted);
            font-weight: 700;
            letter-spacing: .8px;
            margin: 25px 0 12px;
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

            .content-panel,
            .filter-panel {
                padding: 16px;
            }

            .chart-container {
                height: 250px;
            }
        }

        @media print {
            body {
                background: white !important;
            }

            .sidebar,
            .back-link,
            .filter-panel,
            .no-print,
            .footer {
                display: none !important;
            }

            .main-content {
                margin: 0 !important;
                padding: 10px !important;
            }

            .stat-card,
            .content-panel {
                box-shadow: none !important;
                break-inside: avoid;
            }

            .content-panel {
                margin-top: 15px;
            }

            .chart-container {
                break-inside: avoid;
            }
        }
    </style>
</head>

<body>

@include('components.hr.sidebar')

<main class="main-content">

    <a href="{{ route('dashboard') }}" class="back-link">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Dashboard
    </a>

    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

        <div class="page-heading">
            <h4>Reports & Analytics</h4>
            <p>
                Monitor recruitment performance, application activity,
                and candidate screening results.
            </p>
        </div>

        <button type="button"
                class="btn btn-outline-custom no-print"
                onclick="window.print()">
            <i class="bi bi-printer me-1"></i>
            Print / Save as PDF
        </button>

    </div>

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <strong>Please check the selected filters.</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FILTERS --}}

    <section class="filter-panel no-print">

        <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-funnel-fill text-danger"></i>
            <strong style="font-size:13px;">Filter Reports</strong>
        </div>

        <form action="{{ route('hr.reports.index') }}" method="GET">

            <div class="row g-3 align-items-end">

                <div class="col-lg-4 col-md-6">
                    <label class="filter-label">Job Position</label>

                    <select name="job_position_id" class="form-select">
                        <option value="">All Job Positions</option>

                        @foreach($jobPositions as $job)
                            <option value="{{ $job->id }}"
                                {{ (string) $selectedJob === (string) $job->id ? 'selected' : '' }}>
                                {{ $job->title }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <label class="filter-label">Date From</label>

                    <input type="date"
                           name="date_from"
                           class="form-control"
                           value="{{ $dateFrom }}">
                </div>

                <div class="col-lg-3 col-md-6">
                    <label class="filter-label">Date To</label>

                    <input type="date"
                           name="date_to"
                           class="form-control"
                           value="{{ $dateTo }}">
                </div>

                <div class="col-lg-2 col-md-6 d-flex gap-2">

                    <button type="submit" class="btn btn-primary-custom flex-grow-1">
                        Apply
                    </button>

                    <a href="{{ route('hr.reports.index') }}"
                       class="btn btn-outline-custom">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>

                </div>

            </div>

        </form>

    </section>

    {{-- RECRUITMENT OVERVIEW --}}

    <div class="section-label">
        RECRUITMENT OVERVIEW
    </div>

    <div class="row g-3">

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#FFF0F0;color:#D71920;">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($totalApplications) }}</div>
                <div class="stat-label">Total Applications</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#FFF4D6;color:#A87500;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($totalApplicants) }}</div>
                <div class="stat-label">Unique Applicants</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#EAF7ED;color:#27834A;">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($shortlistedApplications) }}</div>
                <div class="stat-label">Shortlisted Applications</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#EAF0FF;color:#4167AE;">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($scheduledInterviews) }}</div>
                <div class="stat-label">Scheduled Interviews</div>
            </div>
        </div>

    </div>

    {{-- VACANCY OVERVIEW --}}

    <div class="section-label">
        JOB VACANCY OVERVIEW
    </div>

    <div class="row g-3">

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#F1EDFF;color:#7654B8;">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($totalJobs) }}</div>
                <div class="stat-label">Total Job Positions</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#EAF7ED;color:#27834A;">
                        <i class="bi bi-unlock-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($openJobs) }}</div>
                <div class="stat-label">Open Vacancies</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#FFF4D6;color:#A87500;">
                        <i class="bi bi-lock-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($closedJobs) }}</div>
                <div class="stat-label">Closed Vacancies</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon" style="background:#F2F2F2;color:#777;">
                        <i class="bi bi-pause-circle-fill"></i>
                    </div>
                </div>

                <div class="stat-number">{{ number_format($inactiveJobs) }}</div>
                <div class="stat-label">Inactive Vacancies</div>
            </div>
        </div>

    </div>

    {{-- APPLICATION ANALYTICS --}}

    <div class="section-label">
        APPLICATION ANALYTICS
    </div>

    <div class="row g-3">

        <div class="col-lg-8">

            <section class="content-panel h-100">

                <div class="panel-heading mb-4">
                    <h5>Monthly Application Trends</h5>
                    <p>Application submissions over the last six months.</p>
                </div>

                <div class="chart-container">
                    <canvas id="applicationTrendChart"></canvas>
                </div>

            </section>

        </div>

        <div class="col-lg-4">

            <section class="content-panel h-100">

                <div class="panel-heading mb-3">
                    <h5>Application Status Distribution</h5>
                    <p>Breakdown of applications by current status.</p>
                </div>

                <div class="chart-container donut">
                    <canvas id="applicationStatusChart"></canvas>
                </div>

                <div class="text-center mt-2" style="font-size:11px;color:#8C8580;">
                    Total: {{ number_format($totalApplications) }} applications
                </div>

            </section>

        </div>

    </div>

    {{-- APPLICATION STATUS SUMMARY --}}

    <section class="content-panel">

        <div class="panel-heading mb-4">
            <h5>Application Status Summary</h5>
            <p>Current recruitment progress for the selected report filters.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-3 col-6">
                <div class="p-3 rounded-3" style="background:#FFF4D6;">
                    <div class="fw-bold fs-4">{{ number_format($submittedApplications) }}</div>
                    <div class="small text-muted">Submitted</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="p-3 rounded-3" style="background:#EAF0FF;">
                    <div class="fw-bold fs-4">{{ number_format($underReviewApplications) }}</div>
                    <div class="small text-muted">Under Review</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="p-3 rounded-3" style="background:#EAF7ED;">
                    <div class="fw-bold fs-4">{{ number_format($shortlistedApplications) }}</div>
                    <div class="small text-muted">Shortlisted</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="p-3 rounded-3" style="background:#FFF0F0;">
                    <div class="fw-bold fs-4">{{ number_format($rejectedApplications) }}</div>
                    <div class="small text-muted">Rejected</div>
                </div>
            </div>

        </div>

    </section>

    {{-- JOB POSITION ANALYTICS --}}

    <section class="content-panel">

        <div class="panel-heading mb-4">
            <h5>Job Position Analytics</h5>
            <p>
                Application volume and average resume matching scores
                for each job position.
            </p>
        </div>

        @if($positionAnalytics->isNotEmpty())

            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>JOB POSITION</th>
                            <th>TOTAL APPLICATIONS</th>
                            <th>AVERAGE MATCH SCORE</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($positionAnalytics as $position)

                            <tr>
                                <td>
                                    <div class="job-name">
                                        {{ $position->title }}
                                    </div>
                                </td>

                                <td>
                                    {{ number_format($position->total_applications) }}
                                </td>

                                <td>
                                    @if($position->average_match_score !== null)
                                        <span class="score-badge">
                                            {{ number_format((float) $position->average_match_score, 2) }}%
                                        </span>
                                    @else
                                        <span class="no-score">
                                            Not available
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-5">
                <i class="bi bi-bar-chart-line"
                   style="font-size:35px;color:#e6b9b9;"></i>

                <h6 class="fw-bold mt-3">No Job Analytics Available</h6>

                <p class="text-muted small mb-0">
                    Application statistics will appear here once candidates apply.
                </p>
            </div>

        @endif

    </section>

    <footer class="footer">
        © {{ date('Y') }} RecruitEase ·
        Intelligent Resume Screening and Candidate Ranking System
    </footer>

</main>

<script>
    // Monthly application trends
    const trendLabels = @json($trendLabels);
    const trendData = @json($trendData);

    new Chart(document.getElementById('applicationTrendChart'), {
        type: 'line',

        data: {
            labels: trendLabels,

            datasets: [{
                label: 'Applications',
                data: trendData,
                borderColor: '#D71920',
                backgroundColor: 'rgba(215, 25, 32, 0.10)',
                fill: true,
                tension: 0.35,
                borderWidth: 3,
                pointRadius: 5,
                pointBackgroundColor: '#FFC72C',
                pointBorderColor: '#D71920',
                pointBorderWidth: 2
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: '#F3EDE8'
                    }
                },

                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });


    // Application status distribution
    const statusLabels = @json($statusLabels);
    const statusData = @json($statusData);

    new Chart(document.getElementById('applicationStatusChart'), {
        type: 'doughnut',

        data: {
            labels: statusLabels,

            datasets: [{
                data: statusData,
                backgroundColor: [
                    '#FFC72C',
                    '#5278C7',
                    '#36A269',
                    '#D71920'
                ],
                borderWidth: 3,
                borderColor: '#FFFFFF',
                hoverOffset: 6
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 16,
                        usePointStyle: true,
                        font: {
                            family: 'DM Sans',
                            size: 10
                        }
                    }
                }
            },

            cutout: '65%'
        }
    });
</script>

</body>
</html>
