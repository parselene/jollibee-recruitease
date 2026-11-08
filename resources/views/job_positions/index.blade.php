
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Positions | RecruitEase</title>

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

        /* SIDEBAR */
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
            transition: .2s;
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

        /* MAIN CONTENT */
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

        /* SUMMARY */
        .summary-card,
        .content-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(100,30,20,.05);
        }

        .summary-card {
            padding: 20px;
            margin: 25px 0;
        }

        .summary-number {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
        }

        .summary-label {
            font-size: 12px;
            color: var(--muted);
        }

        .content-panel {
            padding: 24px;
        }

        .panel-heading h5 {
            font-size: 16px;
            font-weight: 800;
        }

        .panel-heading p {
            color: var(--muted);
            font-size: 11px;
        }

        /* BUTTONS */
        .btn-add {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 11px 17px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-add:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-1px);
        }

        .btn-edit {
            background: #FFF4D6;
            color: #956600;
            border: none;
        }

        .btn-edit:hover {
            background: #FFE8A3;
            color: #805700;
        }

        .btn-delete {
            background: #FFF0F0;
            color: var(--primary);
            border: none;
        }

        .btn-delete:hover {
            background: #FFDADA;
            color: var(--primary-dark);
        }

        .btn-action {
            border-radius: 7px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* TABLE */
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
            padding: 16px 12px;
            border-color: #f1f1f2;
        }

        .job-title {
            font-weight: 800;
            color: var(--text);
        }

        .department-text {
            color: var(--muted);
            font-size: 11px;
        }

        .skill-tag {
            display: inline-block;
            background: #FFF4D6;
            color: #956600;
            border-radius: 5px;
            padding: 5px 8px;
            font-size: 10px;
            font-weight: 700;
            margin: 2px;
        }

        .resume-count {
            background: #FFF0F0;
            color: var(--primary);
            border-radius: 7px;
            padding: 6px 10px;
            font-weight: 800;
        }

        .status-badge {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 10px;
            font-weight: 800;
        }

        .status-active {
            background: #EAF7ED;
            color: #27834A;
        }

        .status-inactive {
            background: #F1F1F2;
            color: #777;
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

        /* RESPONSIVE */
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
                padding: 15px;
            }

            .page-heading {
                gap: 15px;
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

    <div class="page-heading d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h4>Job Position Management</h4>
            <p>Manage vacancies, recruitment requirements, and job postings.</p>
        </div>

        <a href="{{ route('job-positions.create') }}" class="btn-add">
            <i class="bi bi-plus-lg me-1"></i>
            Add Job Position
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="summary-card">
        <div class="d-flex align-items-center gap-3">
            <div style="width:48px;height:48px;background:#FFF0F0;color:#D71920;
                        border-radius:12px;display:flex;align-items:center;
                        justify-content:center;font-size:21px;">
                <i class="bi bi-briefcase-fill"></i>
            </div>

            <div>
                <div class="summary-number">{{ $jobPositions->count() }}</div>
                <div class="summary-label">Total Job Positions</div>
            </div>
        </div>
    </div>

    <section class="content-panel">

        <div class="panel-heading mb-4">
            <h5>All Job Positions</h5>
            <p>Review and manage your current recruitment vacancies.</p>
        </div>

        <div class="table-responsive">

            <table class="table">

                <thead>
                    <tr>
                        <th>JOB TITLE</th>
                        <th>DEPARTMENT</th>
                        <th>REQUIRED SKILLS</th>
                        <th>EXPERIENCE</th>
                        <th>RESUMES</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($jobPositions as $job)

                        <tr>
                            <td>
                                <div class="job-title">{{ $job->title }}</div>
                            </td>

                            <td>
                                <div class="department-text">
                                    {{ $job->department ?? 'N/A' }}
                                </div>
                            </td>

                            <td>
                                @forelse(array_slice($job->required_skills ?? [], 0, 3) as $skill)
                                    <span class="skill-tag">{{ $skill }}</span>
                                @empty
                                    <span class="text-muted">No skills listed</span>
                                @endforelse

                                @if(count($job->required_skills ?? []) > 3)
                                    <span class="text-muted small">
                                        +{{ count($job->required_skills) - 3 }} more
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $job->min_experience_years }} years
                            </td>

                            <td>
                                <span class="resume-count">
                                    {{ $job->resumes_count }}
                                </span>
                            </td>

                            <td>
                                @if($job->is_active)
                                    <span class="status-badge status-active">Active</span>
                                @else
                                    <span class="status-badge status-inactive">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a href="{{ route('job-positions.edit', $job) }}"
                                       class="btn-action btn-edit">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('job-positions.destroy', $job) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this job position?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-action btn-delete">
                                            <i class="bi bi-trash"></i>
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="bi bi-briefcase"></i>
                                    <h5>No Job Positions Yet</h5>
                                    <p>Start by adding your first recruitment vacancy.</p>
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

    <footer class="footer">
        © {{ date('Y') }} RecruitEase ·
        Intelligent Resume Screening and Candidate Ranking System
    </footer>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
