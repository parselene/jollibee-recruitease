
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | RecruitEase</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        :root {
            /* Jollibee-inspired brand colors */
            --primary: #D71920;
            --primary-dark: #A80F18;
            --primary-light: #FFF0F0;

            --accent: #FFC72C;
            --accent-dark: #E5A900;
            --accent-light: #FFF8DF;

            /* Backgrounds */
            --background: #FFF9F0;
            --sidebar: #B5121B;
            --sidebar-dark: #920D16;
            --white: #FFFFFF;
            --cream: #FFF3DF;

            /* Text */
            --text: #302B2B;
            --muted: #8C8580;

            /* Borders and shadows */
            --border: #F0E5DC;
            --shadow: 0 8px 25px rgba(100, 30, 20, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
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
            background: linear-gradient(
                180deg,
                var(--sidebar) 0%,
                var(--sidebar-dark) 100%
            );
            color: white;
            padding: 27px 18px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            box-shadow: 5px 0 25px rgba(120, 0, 0, 0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px 35px;
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, .15);
        }

        .brand h5 {
            margin: 0;
            font-weight: 800;
            font-size: 19px;
            letter-spacing: -.5px;
        }

        .brand small {
            font-size: 9px;
            color: #aeb2c0;
            letter-spacing: 1.3px;
        }

        .menu-label {
            color: #858a99;
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
            color: #b9bdca;
            font-size: 13px;
            font-weight: 500;
            border-radius: 9px;
            margin-bottom: 5px;
            transition: .2s;
        }

        .nav-item-custom i {
            font-size: 17px;
        }

        .nav-item-custom:hover,
        .nav-item-custom.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        .nav-item-custom.active {
            border-left: 4px solid var(--accent);
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,.09);
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
            color: white;
        }

        .profile-role {
            font-size: 10px;
            color: #aeb2c0;
        }

        /* MAIN CONTENT */

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 30px 38px;
        }

        /* TOPBAR */

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .page-heading h4 {
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 12px;
            margin: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .date-label {
            color: var(--muted);
            font-size: 12px;
        }

        .logout-btn {
            border: 1px solid #F0D8D5;
            background: white;
            color: var(--primary);
            padding: 9px 15px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
        }

        .logout-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* WELCOME BANNER */

        .welcome-banner {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
                115deg,
                #B5121B 0%,
                #D71920 65%,
                #E52B32 100%
            );
            border-radius: 20px;
            padding: 35px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 12px 30px rgba(215, 25, 32, .17);
            border-bottom: 5px solid var(--accent);
        }

        .welcome-banner::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border: 45px solid rgba(255,255,255,.08);
            border-radius: 50%;
            right: -60px;
            top: -140px;
        }

        .welcome-banner::before {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            background: rgba(255,201,40,.12);
            border-radius: 50%;
            right: 145px;
            bottom: -135px;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
            max-width: 620px;
        }

        .welcome-tag {
            display: inline-block;
            background: rgba(255,255,255,.15);
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .welcome-banner h2 {
            font-size: 27px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .welcome-banner p {
            color: #ffe4e4;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .welcome-btn {
            background: var(--accent);
            color: #651014;
            padding: 11px 19px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 800;
            display: inline-block;
            transition: .2s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .12);
        }

        .welcome-btn:hover {
            background: #FFE078;
            color: #651014;
            transform: translateY(-2px);
        }

        /* SECTION HEADER */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 17px;
        }

        .section-heading h5 {
            font-size: 15px;
            font-weight: 800;
            margin: 0;
        }

        .section-heading p {
            font-size: 11px;
            color: var(--muted);
            margin: 4px 0 0;
        }

        /* STAT CARDS */

        .stat-card,
        .content-panel {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
        }

        .stat-card {
            padding: 22px;
            height: 100%;
            transition: .25s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 30px rgba(150, 25, 25, .09);
            border-color: #F4C8C8;
        }

        .content-panel {
            padding: 23px;
            height: 100%;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            font-size: 19px;
        }

        .icon-red {
            background: #FFF0F0;
            color: #D71920;
        }

        .icon-yellow {
            background: #FFF5D9;
            color: #D69A00;
        }

        .icon-green {
            background: #EAF7ED;
            color: #27834A;
        }

        .icon-blue {
            background: #EDF3FF;
            color: #4778CF;
        }

        .stat-number {
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 4px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 500;
        }

        .stat-caption {
            color: #a1a4af;
            font-size: 10px;
            margin-top: 10px;
        }

        /* CONTENT PANELS */

        .content-panel {
            background: white;
            border: 1px solid #f0f0f2;
            border-radius: 14px;
            padding: 23px;
            height: 100%;
        }

        .view-all {
            font-size: 11px;
            color: var(--primary);
            font-weight: 700;
        }

        .view-all:hover {
            color: var(--primary-dark);
        }

        /* TABLE */

        .table {
            margin-bottom: 0;
            font-size: 12px;
            vertical-align: middle;
        }

        .table thead th {
            color: #9599a6;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
            border-bottom: 1px solid #eeeeef;
            padding: 13px 10px;
        }

        .table tbody td {
            padding: 15px 10px;
            border-color: #f1f1f2;
        }

        .job-title {
            font-weight: 700;
            color: #303340;
        }

        .department {
            color: var(--muted);
            font-size: 11px;
        }

        .status-badge {
            display: inline-block;
            background: #FFF4D6;
            color: #956600;
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 10px;
            font-weight: 800;
        }

        .status-inactive {
            background: #F1EEEE;
            color: #777;
        }

        /* QUICK ACTIONS */

        .action-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 0;
            border-bottom: 1px solid #f0f0f2;
            color: var(--text);
            transition: .2s;
        }

        .action-item:last-child {
            border-bottom: none;
        }

        .action-item:hover {
            transform: translateX(4px);
            color: var(--primary);
        }

        .action-icon {
            width: 39px;
            height: 39px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .action-title {
            font-size: 12px;
            font-weight: 700;
        }

        .action-description {
            font-size: 10px;
            color: var(--muted);
            margin-top: 3px;
        }

        .action-arrow {
            margin-left: auto;
            color: #aaa;
        }

        /* FOOTER */

        .footer {
            text-align: center;
            color: #a3a5ad;
            font-size: 10px;
            padding: 25px 0 5px;
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
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
                gap: 12px;
            }

            .date-label {
                display: none;
            }

            .welcome-banner {
                padding: 25px 22px;
            }

            .welcome-banner h2 {
                font-size: 22px;
            }

            .page-heading h4 {
                font-size: 18px;
            }
        }

    </style>
</head>

<body>

<!-- SIDEBAR -->

@include('components.hr.sidebar')


<!-- MAIN CONTENT -->

<main class="main-content">

    <!-- TOPBAR -->

    <div class="topbar">

        <div class="page-heading">
            <h4>Dashboard Overview</h4>

            <p>
                Welcome back, {{ Auth::user()->name }}.
                Here's what's happening in your recruitment system.
            </p>
        </div>

        <div class="topbar-right">

            <div class="date-label">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->format('F d, Y') }}
            </div>

        </div>

    </div>


    <!-- WELCOME BANNER -->

    <section class="welcome-banner">

        <div class="welcome-content">

            <div class="welcome-tag">
                <i class="bi bi-stars me-1"></i>
                INTELLIGENT RECRUITMENT PLATFORM
            </div>

            <h2>Welcome back, {{ Auth::user()->name }}!</h2>

            <p>
                Manage your vacancies, organize candidate information,
                and make smarter recruitment decisions with RecruitEase.
            </p>

            <a href="{{ route('job-positions.create') }}"
               class="welcome-btn">

                <i class="bi bi-plus-circle me-1"></i>
                Create New Job Position

            </a>

        </div>

    </section>


    <!-- STATISTICS -->

    <div class="section-heading">

        <div>
            <h5>Recruitment Overview</h5>
            <p>A quick summary of your recruitment activities.</p>
        </div>

    </div>


    <div class="row g-3 mb-4">

        <!-- TOTAL JOBS -->

        <div class="col-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-red">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>

                    <i class="bi bi-three-dots text-muted"></i>

                </div>

                <div class="stat-number">
                    {{ $totalJobs }}
                </div>

                <div class="stat-label">
                    Total Job Positions
                </div>

                <div class="stat-caption">
                    All recorded vacancies
                </div>

            </div>

        </div>


        <!-- ACTIVE JOBS -->

        <div class="col-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-yellow">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>

                    <i class="bi bi-three-dots text-muted"></i>

                </div>

                <div class="stat-number">
                    {{ $activeJobs }}
                </div>

                <div class="stat-label">
                    Active Vacancies
                </div>

                <div class="stat-caption">
                    Currently open positions
                </div>

            </div>

        </div>


        <!-- APPLICANTS -->

        <div class="col-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <i class="bi bi-three-dots text-muted"></i>

                </div>

                <div class="stat-number">
                    {{ $totalApplicants }}
                </div>

                <div class="stat-label">
                    Total Applicants
                </div>

                <div class="stat-caption">
                    Registered candidates
                </div>

            </div>

        </div>


        <!-- RESUMES -->

        <div class="col-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon icon-green">
                        <i class="bi bi-file-earmark-check-fill"></i>
                    </div>

                    <i class="bi bi-three-dots text-muted"></i>

                </div>

                <div class="stat-number">
                    {{ $totalResumes }}
                </div>

                <div class="stat-label">
                    Resumes Uploaded
                </div>

                <div class="stat-caption">
                    Documents in the system
                </div>

            </div>

        </div>

    </div>


    <!-- LOWER CONTENT -->

    <div class="row g-3">

        <!-- RECENT JOB POSITIONS -->

        <div class="col-lg-8">

            <div class="content-panel">

                <div class="section-heading">

                    <div>
                        <h5>Recent Job Positions</h5>
                        <p>Your latest recruitment vacancies.</p>
                    </div>

                    <a href="{{ route('job-positions.index') }}"
                       class="view-all">

                        View All
                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>


                <div class="table-responsive">

                    <table class="table">

                        <thead>

                            <tr>
                                <th>POSITION</th>
                                <th>DEPARTMENT</th>
                                <th>RESUMES</th>
                                <th>STATUS</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentJobs as $job)

                                <tr>

                                    <td>
                                        <div class="job-title">
                                            {{ $job->title }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="department">
                                            {{ $job->department ?? 'Not specified' }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $job->resumes_count }}
                                    </td>

                                    <td>

                                        @if($job->is_active)

                                            <span class="status-badge">
                                                Active
                                            </span>

                                        @else

                                            <span class="status-badge status-inactive">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4"
                                        class="text-center py-5">

                                        <i class="bi bi-briefcase fs-2 text-muted"></i>

                                        <p class="text-muted mt-2 mb-1">
                                            No job positions yet.
                                        </p>

                                        <a href="{{ route('job-positions.create') }}"
                                           class="view-all">

                                            Create your first vacancy

                                        </a>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <!-- QUICK ACTIONS -->

        <div class="col-lg-4">

            <div class="content-panel">

                <div class="section-heading">

                    <div>
                        <h5>Quick Actions</h5>
                        <p>Shortcuts to important features.</p>
                    </div>

                </div>


                <a href="{{ route('job-positions.create') }}"
                   class="action-item">

                    <div class="action-icon icon-red">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>
                        <div class="action-title">
                            Add Job Position
                        </div>

                        <div class="action-description">
                            Create a new vacancy
                        </div>
                    </div>

                    <i class="bi bi-chevron-right action-arrow"></i>

                </a>


                <a href="{{ route('hr.applications.index') }}"
                class="action-item">

                    <div class="action-icon icon-blue">
                        <i class="bi bi-person-plus"></i>
                    </div>

                    <div>
                        <div class="action-title">
                            Manage Applicants
                        </div>

                        <div class="action-description">
                            View submitted applications
                        </div>
                    </div>

                    <i class="bi bi-chevron-right action-arrow"></i>

                </a>


                <div class="action-item">

                    <div class="action-icon icon-green">
                        <i class="bi bi-file-earmark-arrow-up"></i>
                    </div>

                    <div>
                        <div class="action-title">
                            Upload Resumes
                        </div>

                        <div class="action-description">
                            Resume upload coming soon
                        </div>
                    </div>

                    <i class="bi bi-chevron-right action-arrow"></i>

                </div>


                <div class="action-item">

                    <div class="action-icon icon-yellow">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                    <div>
                        <div class="action-title">
                            View Analytics
                        </div>

                        <div class="action-description">
                            Recruitment reports coming soon
                        </div>
                    </div>

                    <i class="bi bi-chevron-right action-arrow"></i>

                </div>

            </div>

        </div>

    </div>


    <!-- FOOTER -->

    <div class="footer">
        © {{ date('Y') }} RecruitEase · Intelligent Resume Screening and Candidate Ranking System
    </div>

</main>

</body>
</html>
