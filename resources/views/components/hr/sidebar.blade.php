
<style>
    .sidebar {
        width: 255px;
        height: 100vh;
        height: 100dvh;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(180deg, #B5121B, #920D16);
        color: white;
        padding: 20px 18px;
        display: flex;
        flex-direction: column;
        z-index: 1000;
        box-shadow: 5px 0 25px rgba(120, 0, 0, .08);
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* BRANDING */
    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 5px 25px;
        color: white;
        text-decoration: none;
        min-width: 0;
    }

    .jollibee-logo {
        width: 48px;
        height: 48px;
        object-fit: contain;
        background: white;
        border-radius: 12px;
        padding: 3px;
        flex-shrink: 0;
    }

    .brand-text {
        min-width: 0;
    }

    .brand h5 {
        margin: 0;
        font-weight: 800;
        font-size: 17px;
        white-space: nowrap;
    }

    .brand small {
        font-size: 8px;
        color: #f3c6c6;
        letter-spacing: 1px;
        white-space: nowrap;
    }

    /* MENU */
    .menu-label {
        color: #f0b9b9;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        padding: 0 13px;
        margin: 10px 0 8px;
    }

    .nav-item-custom {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 10px 14px;
        color: #f1c9c9;
        font-size: 13px;
        border-radius: 9px;
        margin-bottom: 5px;
        text-decoration: none;
        transition: .2s;
        white-space: nowrap;
    }

    .nav-item-custom:hover,
    .nav-item-custom.active {
        background: rgba(255,255,255,.15);
        color: white;
    }

    .nav-item-custom.active {
        border-left: 4px solid #FFC72C;
        font-weight: 700;
    }

    .nav-item-custom i {
        font-size: 17px;
        flex-shrink: 0;
    }

    /* BOTTOM PROFILE AND LOGOUT */
    .sidebar-bottom {
        margin-top: auto;
        border-top: 1px solid rgba(255,255,255,.15);
        padding-top: 12px;
        flex-shrink: 0;
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

    /* RESPONSIVE */
    @media(max-width: 991px) {
        .sidebar {
            width: 75px;
            padding: 20px 10px;
        }

        .sidebar .brand {
            justify-content: center;
            padding: 0 0 25px;
        }

        .sidebar .brand-text,
        .sidebar .menu-label,
        .sidebar .nav-text,
        .sidebar .profile-details {
            display: none;
        }

        .sidebar .jollibee-logo {
            width: 43px;
            height: 43px;
        }

        .sidebar .nav-item-custom {
            justify-content: center;
            padding: 13px;
        }

        .sidebar .profile {
            justify-content: center;
        }
    }
</style>

<aside class="sidebar">

    <!-- BRANDING -->
    <a href="{{ route('dashboard') }}" class="brand">

        <img src="{{ asset('images/jollibee-logo.png') }}"
             alt="Jollibee Logo"
             class="jollibee-logo">

        <div class="brand-text">
            <h5>Jollibee RecruitEase</h5>
            <small>INTELLIGENT RECRUITMENT</small>
        </div>

    </a>

    <!-- MAIN MENU -->
    <div class="menu-label">MAIN MENU</div>

    <a href="{{ route('dashboard') }}"
       class="nav-item-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2-fill"></i>
        <span class="nav-text">Dashboard</span>
    </a>

    <a href="{{ route('job-positions.index') }}"
       class="nav-item-custom {{ request()->routeIs('job-positions.*') ? 'active' : '' }}">
        <i class="bi bi-briefcase-fill"></i>
        <span class="nav-text">Job Positions</span>
    </a>

    <a href="{{ route('hr.applications.index') }}"
       class="nav-item-custom {{ request()->routeIs('hr.applications.*') ? 'active' : '' }}">
        <i class="bi bi-people-fill"></i>
        <span class="nav-text">Applicants</span>
    </a>

    <a href="{{ route('hr.resume-screening.index') }}"
       class="nav-item-custom {{ request()->routeIs('hr.resume-screening.*') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-person-fill"></i>
        <span class="nav-text">Resume Screening</span>
    </a>

    <!-- SYSTEM -->
    <div class="menu-label mt-4">SYSTEM</div>

    <a href="#" class="nav-item-custom">
        <i class="bi bi-bar-chart-fill"></i>
        <span class="nav-text">Reports & Analytics</span>
    </a>

    <!-- PROFILE AND LOGOUT -->
    <div class="sidebar-bottom">

        <div class="profile">
            <div class="profile-avatar">HR</div>

            <div class="profile-details">
                <div class="profile-name">
                    {{ Auth::user()->name }}
                </div>

                <div class="profile-role">HR Administrator</div>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="nav-item-custom w-100 border-0"
                    style="background:transparent; cursor:pointer;">
                <i class="bi bi-box-arrow-left"></i>
                <span class="nav-text">Sign Out</span>
            </button>
        </form>

    </div>

</aside>
