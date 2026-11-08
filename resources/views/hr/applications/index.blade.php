<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Applicants | RecruitEase</title>

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
        }

        .profile-name {
            font-size: 12px;
            font-weight: 700;
        }

        .profile-role {
            font-size: 10px;
            color: #f1c9c9;
        }

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 35px 38px;
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

        .back-link {
            display: inline-block;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 22px;
        }

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

        .applicant-name {
            font-weight: 800;
            color: var(--text);
        }

        .applicant-email {
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        .job-name {
            font-weight: 700;
        }

        .status-badge {
            display: inline-block;
            background: #FFF4D6;
            color: #956600;
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 10px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .status-reviewed {
            background: #EAF0FF;
            color: #4167AE;
        }

        .status-shortlisted {
            background: #EAF7ED;
            color: #27834A;
        }

        .status-rejected {
            background: #FFF0F0;
            color: var(--primary);
        }

        .resume-label {
            color: #27834A;
            font-weight: 700;
            font-size: 11px;
        }

        .no-resume {
            color: var(--muted);
            font-size: 11px;
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

        .pagination {
            margin-top: 20px;
        }

        .page-link {
            color: var(--primary);
        }

        .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
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
                padding: 15px;
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

    <div class="page-heading">
        <h4>Applicant Management</h4>
        <p>Review applications submitted for your job vacancies.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('warning') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <div class="summary-card">
        <div class="d-flex align-items-center gap-3">
            <div class="stat-icon"
                 style="width:48px;height:48px;background:#FFF0F0;color:#D71920;
                        border-radius:12px;display:flex;align-items:center;
                        justify-content:center;font-size:21px;">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>
                <div class="summary-number">
                    {{ $applications->total() }}
                </div>
                <div class="summary-label">Total Submitted Applications</div>
            </div>
        </div>
    </div>

    <section class="content-panel">

        <div class="panel-heading mb-4">
            <h5>Submitted Applications</h5>
            <p>Applicant information and application details.</p>
        </div>

        @if($applications->isNotEmpty())

            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>APPLICANT</th>
                            <th>JOB POSITION</th>
                            <th>DATE APPLIED</th>
                            <th>RESUME</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($applications as $application)

                            @php
                                $status = strtolower($application->status ?? 'submitted');

                                $statusClass = match($status) {
                                    'under review', 'reviewed' => 'status-reviewed',
                                    'shortlisted' => 'status-shortlisted',
                                    'rejected' => 'status-rejected',
                                    default => '',
                                };
                            @endphp

                            <tr>

                                <td>
                                    <div class="applicant-name">
                                        {{ $application->applicant?->full_name ?? 'Applicant unavailable' }}
                                    </div>

                                    <div class="applicant-email">
                                        {{ $application->applicant?->email ?? 'No email available' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="job-name">
                                        {{ $application->jobPosition?->title ?? 'Position unavailable' }}
                                    </div>

                                    <div class="text-muted small">
                                        {{ $application->jobPosition?->department ?? 'No department' }}
                                    </div>
                                </td>

                                <td>
                                    {{ $application->applied_at
                                        ? $application->applied_at->format('M d, Y')
                                        : $application->created_at?->format('M d, Y') }}
                                </td>

                                <td>
                                    @if($application->resume)
                                        <a href="{{ route('hr.applications.resume.download', $application->id) }}"
                                        class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-file-earmark-pdf me-1"></i>
                                            Download PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No resume</span>
                                    @endif
                                </td>
                                
                                <td>

                                    <form action="{{ route('hr.applications.status.update', $application->id) }}"
                                        method="POST"
                                        class="d-flex align-items-center gap-2">

                                        @csrf
                                        @method('PATCH')

                                        <select name="status"
                                                class="form-select form-select-sm"
                                                style="min-width: 145px;"
                                                onchange="this.form.submit()">

                                            <option value="submitted"
                                                {{ $application->status === 'submitted' ? 'selected' : '' }}>
                                                Submitted
                                            </option>

                                            <option value="under_review"
                                                {{ $application->status === 'under_review' ? 'selected' : '' }}>
                                                Under Review
                                            </option>

                                            <option value="shortlisted"
                                                {{ $application->status === 'shortlisted' ? 'selected' : '' }}>
                                                Shortlisted
                                            </option>

                                            <option value="rejected"
                                                {{ $application->status === 'rejected' ? 'selected' : '' }}>
                                                Rejected
                                            </option>

                                        </select>
                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="d-flex justify-content-end">
                {{ $applications->links() }}
            </div>

        @else

            <div class="empty-state">
                <i class="bi bi-inbox"></i>

                <h5>No Applications Yet</h5>

                <p>
                    Applications submitted by candidates will appear here.
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