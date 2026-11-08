
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule Interview | RecruitEase</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f7f7f8;
            font-family: 'DM Sans', sans-serif;
            color: #292929;
        }

        .topbar {
            background: #fff;
            padding: 18px 0;
            border-bottom: 1px solid #eee;
        }

        .brand {
            color: #D71920;
            font-size: 23px;
            font-weight: 800;
        }

        .page-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 8px 30px rgba(0,0,0,.04);
        }

        .form-label {
            font-weight: 700;
            font-size: 14px;
        }

        .form-control {
            padding: 12px 14px;
            border-radius: 10px;
        }

        .btn-brand {
            background: #D71920;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 22px;
            font-weight: 700;
        }

        .btn-brand:hover {
            background: #b9141b;
            color: #fff;
        }

        .applicant-info {
            background: #fff8e8;
            border: 1px solid #ffe4a3;
            border-radius: 12px;
            padding: 18px;
        }
    </style>
</head>
<body>

<header class="topbar">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="brand">
            <i class="bi bi-briefcase-fill me-2"></i>RecruitEase
        </div>

        <a href="{{ route('hr.applications.index') }}"
           class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Applicants
        </a>
    </div>
</header>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="mb-4">
                <h2 class="fw-bold">Schedule Interview</h2>
                <p class="text-muted">
                    Set an interview schedule for the shortlisted applicant.
                </p>
            </div>

            <div class="page-card">

                <div class="applicant-info mb-4">
                    <div class="fw-bold fs-5">
                        {{ $application->applicant->full_name }}
                    </div>

                    <div class="text-muted">
                        {{ $application->applicant->email }}
                    </div>

                    <div class="mt-2 small">
                        <strong>Position:</strong>
                        {{ $application->jobPosition->title }}
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Please correct the following:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $existing = $application->interviewSchedule;
                @endphp

                <form method="POST"
                      action="{{ route('hr.applications.schedule.store', $application->id) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Interview Date and Time *</label>

                        <input type="datetime-local"
                               name="scheduled_at"
                               class="form-control"
                               min="{{ now()->format('Y-m-d\TH:i') }}"
                               value="{{ old('scheduled_at', $existing?->scheduled_at?->format('Y-m-d\TH:i')) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Interview Location</label>

                        <input type="text"
                               name="location"
                               class="form-control"
                               placeholder="e.g. Jollibee Putatan Branch"
                               value="{{ old('location', $existing?->location) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Online Meeting Link</label>

                        <input type="url"
                               name="meeting_link"
                               class="form-control"
                               placeholder="https://..."
                               value="{{ old('meeting_link', $existing?->meeting_link) }}">

                        <div class="form-text">
                            Optional. Use this for online interviews.
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Additional Instructions</label>

                        <textarea name="instructions"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Please bring a printed copy of your resume...">{{ old('instructions', $existing?->instructions) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('hr.applications.index') }}"
                           class="btn btn-light border px-4">
                            Cancel
                        </a>

                        <button type="submit" class="btn-brand">
                            <i class="bi bi-calendar-check me-2"></i>
                            {{ $existing ? 'Update Schedule' : 'Save Interview Schedule' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

</body>
</html>
