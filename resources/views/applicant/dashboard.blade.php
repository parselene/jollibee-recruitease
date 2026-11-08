<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Applicant Dashboard | RecruitEase</title>

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
            --white: #FFFFFF;
            --shadow: 0 8px 25px rgba(100, 30, 20, .06);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */

        .navbar-custom {
            background: white;
            padding: 17px 5%;
            border-bottom: 1px solid var(--border);
            box-shadow: 0 3px 15px rgba(100, 30, 20, .03);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--text);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
        }

        .brand-caption {
            display: block;
            font-size: 9px;
            letter-spacing: 1.2px;
            color: var(--muted);
        }

        .logout-btn {
            background: white;
            color: var(--primary);
            border: 1px solid #F0D8D5;
            border-radius: 9px;
            padding: 9px 15px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .logout-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* MAIN */

        .main-content {
            max-width: 1200px;
            margin: auto;
            padding: 38px 25px;
        }

        .page-heading h4 {
            font-weight: 800;
            font-size: 23px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 13px;
        }

        /* WELCOME */

        .welcome-banner {
            position: relative;
            overflow: hidden;
            background: linear-gradient(115deg, #B5121B, #D71920 70%, #E52B32);
            border-radius: 20px;
            padding: 36px;
            color: white;
            margin: 25px 0 35px;
            border-bottom: 5px solid var(--accent);
            box-shadow: 0 12px 30px rgba(215, 25, 32, .15);
        }

        .welcome-banner::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border: 40px solid rgba(255,255,255,.08);
            border-radius: 50%;
            right: -50px;
            top: -140px;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
        }

        .welcome-tag {
            display: inline-block;
            background: rgba(255,255,255,.15);
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .welcome-banner h1 {
            font-size: 29px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .welcome-banner p {
            font-size: 13px;
            color: #ffe4e4;
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* SECTION */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-heading h5 {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
            margin: 0;
        }

        .job-count {
            background: #FFF0F0;
            color: var(--primary);
            border-radius: 20px;
            padding: 7px 13px;
            font-size: 11px;
            font-weight: 800;
        }

        /* JOB CARDS */

        .job-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 23px;
            height: 100%;
            box-shadow: var(--shadow);
            transition: .25s;
        }

        .job-card:hover {
            transform: translateY(-5px);
            border-color: #F1BDBD;
            box-shadow: 0 14px 30px rgba(150, 25, 25, .09);
        }

        .job-icon {
            width: 46px;
            height: 46px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF0F0;
            color: var(--primary);
            font-size: 21px;
        }

        .job-title {
            font-size: 17px;
            font-weight: 800;
            margin: 17px 0 5px;
        }

        .job-department {
            font-size: 11px;
            color: var(--muted);
        }

        .job-description {
            font-size: 12px;
            color: #77716E;
            line-height: 1.7;
            margin: 17px 0;
        }

        .job-detail {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #77716E;
            font-size: 11px;
            margin-bottom: 10px;
        }

        .job-detail i {
            color: var(--primary);
        }

        .skill-label {
            display: inline-block;
            background: #FFF5D9;
            color: #896000;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 10px;
            font-weight: 700;
            margin: 3px 3px 3px 0;
        }

        .apply-btn {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 11px;
            border: none;
            border-radius: 9px;
            background: var(--primary);
            color: white;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
        }

        .apply-btn:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        /* EMPTY STATE */

        .empty-state {
            background: white;
            border: 1px dashed #E8D5C9;
            border-radius: 16px;
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFF0F0;
            color: var(--primary);
            font-size: 28px;
            margin: 0 auto 17px;
        }

        .empty-state h5 {
            font-size: 16px;
            font-weight: 800;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 12px;
        }

        /* FOOTER */

        .footer {
            text-align: center;
            color: #A3A5AD;
            font-size: 10px;
            padding: 35px 0 10px;
        }

        @media(max-width: 576px) {
            .navbar-custom {
                padding: 14px 18px;
            }

            .main-content {
                padding: 25px 16px;
            }

            .welcome-banner {
                padding: 27px 22px;
            }

            .welcome-banner h1 {
                font-size: 23px;
            }

            .page-heading h4 {
                font-size: 19px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION -->
    <nav class="navbar-custom d-flex justify-content-between align-items-center">

        <a href="{{ route('applicant.dashboard') }}" class="brand">
            <div class="brand-icon">R</div>

            <div>
                <div class="brand-name">RecruitEase</div>
                <span class="brand-caption">INTELLIGENT RECRUITMENT</span>
            </div>
        </a>

        <form method="POST" action="{{ route('applicant.logout') }}">
            @csrf

            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right me-1"></i>
                Sign Out
            </button>
        </form>

    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <div class="page-heading">
            <h4>Applicant Dashboard</h4>

            <p>
                Explore career opportunities and find a position
                that matches your qualifications.
            </p>
        </div>

        <!-- WELCOME BANNER -->
        <section class="welcome-banner">

            <div class="welcome-content">

                <div class="welcome-tag">
                    <i class="bi bi-stars me-1"></i>
                    WELCOME TO RECRUITEASE
                </div>

                <h1>
                    Hello, {{ $applicant?->full_name ?? Auth::user()->name }}!
                </h1>

                <p>
                    Your next career opportunity could be waiting for you.
                    Explore our available positions and take the next step
                    toward your professional journey.
                </p>

            </div>

        </section>

        <!-- MY APPLICATIONS -->
<section class="mb-5">

    <div class="section-heading">
        <div>
            <h5>My Applications & Interview Schedule</h5>
            <p>Track your submitted applications and upcoming interviews.</p>
        </div>

        <span class="job-count">
            {{ $applications->count() }}
            {{ Str::plural('Application', $applications->count()) }}
        </span>
    </div>

    @if($applications->isNotEmpty())

        <div class="row g-4">

            @foreach($applications as $application)

                <div class="col-12">

                    <article class="job-card">

                        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">

                            <div>
                                <h5 class="job-title mt-0">
                                    {{ $application->jobPosition->title ?? 'Position unavailable' }}
                                </h5>

                                <div class="job-department">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    Applied on:
                                    {{ $application->applied_at?->format('F d, Y') ?? 'N/A' }}
                                </div>
                            </div>

                            <span class="badge rounded-pill
                                @if($application->status === 'shortlisted') bg-success
                                @elseif($application->status === 'rejected') bg-danger
                                @elseif($application->status === 'under_review') bg-warning text-dark
                                @else bg-secondary
                                @endif">

                                {{ Str::headline($application->status) }}

                            </span>

                        </div>

                        <hr>

                        @if($application->interviewSchedule)

                            <div class="p-3 rounded-3" style="background: #FFF9F0;">

                                <h6 class="fw-bold mb-3" style="color: var(--primary);">
                                    <i class="bi bi-calendar-check me-2"></i>
                                    Interview Details
                                </h6>

                                <div class="job-detail">
                                    <i class="bi bi-calendar-event"></i>
                                    Date:
                                    {{ $application->interviewSchedule->scheduled_at->format('F d, Y') }}
                                </div>

                                <div class="job-detail">
                                    <i class="bi bi-clock"></i>
                                    Time:
                                    {{ $application->interviewSchedule->scheduled_at->format('h:i A') }}
                                </div>

                                @if($application->interviewSchedule->location)
                                    <div class="job-detail">
                                        <i class="bi bi-geo-alt"></i>
                                        Location:
                                        {{ $application->interviewSchedule->location }}
                                    </div>
                                @endif

                                @if($application->interviewSchedule->meeting_link)
                                    <div class="job-detail">
                                        <i class="bi bi-camera-video"></i>
                                        Online Meeting:
                                        <a href="{{ $application->interviewSchedule->meeting_link }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           style="color: var(--primary); font-weight: 700;">
                                            Join Meeting
                                        </a>
                                    </div>
                                @endif

                                @if($application->interviewSchedule->instructions)
                                    <div class="mt-3">
                                        <strong class="small">HR Instructions:</strong>
                                        <p class="small text-muted mb-0 mt-1">
                                            {{ $application->interviewSchedule->instructions }}
                                        </p>
                                    </div>
                                @endif

                            </div>

                        @elseif($application->status === 'shortlisted')

                            <p class="small text-success mb-0">
                                <i class="bi bi-check-circle me-1"></i>
                                Congratulations! You have been shortlisted.
                                Your interview schedule is not yet available.
                            </p>

                        @else

                            <p class="small text-muted mb-0">
                                <i class="bi bi-hourglass-split me-1"></i>
                                Your application is being processed.
                                Please check back for updates.
                            </p>

                        @endif

                    </article>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-state">
            <div class="empty-icon">
                <i class="bi bi-file-earmark-text"></i>
            </div>

            <h5>No Applications Yet</h5>

            <p>
                You haven't applied for any positions.
                Explore the available opportunities below.
            </p>
        </div>

    @endif

</section>

        <!-- AVAILABLE JOBS -->
        <section>

            <div class="section-heading">

                <div>
                    <h5>Available Job Opportunities</h5>

                    <p>
                        Browse our currently open positions.
                    </p>
                </div>

                <span class="job-count">
                    {{ $availableJobs->count() }}
                    {{ Str::plural('Position', $availableJobs->count()) }}
                </span>

            </div>

            @if($availableJobs->isNotEmpty())

                <div class="row g-4">

                    @foreach($availableJobs as $job)

                        <div class="col-md-6 col-xl-4">

                            <article class="job-card">

                                <div class="job-icon">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>

                                <h5 class="job-title">
                                    {{ $job->title }}
                                </h5>

                                <div class="job-department">
                                    <i class="bi bi-building me-1"></i>
                                    {{ $job->department ?? 'Department not specified' }}
                                </div>

                                <p class="job-description">
                                    {{ Str::limit($job->description ?? 'No job description available.', 150) }}
                                </p>

                                <div class="job-detail">
                                    <i class="bi bi-clock"></i>
                                    Minimum experience:
                                    {{ $job->min_experience_years }}
                                    {{ Str::plural('year', $job->min_experience_years) }}
                                </div>

                                <div class="job-detail">
                                    <i class="bi bi-check-circle"></i>
                                    Required skills
                                </div>

                                <div class="mb-2">

                                    @forelse($job->required_skills ?? [] as $skill)

                                        <span class="skill-label">
                                            {{ $skill }}
                                        </span>

                                    @empty

                                        <span class="text-muted small">
                                            No specific skills listed.
                                        </span>

                                    @endforelse

                                </div>

@php
    $hasApplied = $applications->contains(
        'job_position_id',
        $job->id
    );
@endphp

@if($hasApplied)

    <button type="button"
            class="apply-btn"
            disabled
            style="background: #D8D8D8; color: #777; cursor: not-allowed; transform: none;">

        <i class="bi bi-check-circle me-1"></i>
        Already Applied

    </button>

@else

    <a href="{{ route('applicant.apply', $job->id) }}"
       class="apply-btn text-decoration-none text-center">

        <i class="bi bi-send me-1"></i>
        Apply Now

    </a>

@endif

                            </article>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>

                    <h5>No Available Positions Yet</h5>

                    <p>
                        There are currently no active job vacancies.
                        Please check again later for new opportunities.
                    </p>

                </div>

            @endif

        </section>

        <!-- FOOTER -->
        <footer class="footer">
            © {{ date('Y') }} RecruitEase ·
            Intelligent Resume Screening and Candidate Ranking System
        </footer>

    </main>

</body>
</html>