<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\JobPosition;

class ApplicantAuthController extends Controller
{
    public function showRegister()
    {
        return view('applicant.auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'name' => $validated['full_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Assign the applicant role.
            $user->role = 'applicant';
            $user->save();

            // Create the applicant profile linked to this user.
            $user->applicant()->create([
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
            ]);
        });

        return redirect()
            ->route('applicant.register')
            ->with('success', 'Your account has been created successfully.');
    }

    public function showLogin()
    {
        return view('applicant.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'The email or password you entered is incorrect.',
            ]);
        }

        // Applicant login must not allow HR accounts.
        if (Auth::user()->role !== 'applicant') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => 'This login page is for applicants only.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('applicant.dashboard'));
    }


public function dashboard(Request $request)
{
    $applicant = $request->user()->applicant;

    // Get the applicant's applications and interview schedules.
    $applications = $applicant->applications()
        ->with([
            'jobPosition',
            'interviewSchedule'
        ])
        ->latest('applied_at')
        ->get();

    // Get only job positions that are active and still accepting applications.
    $availableJobs = JobPosition::where('is_active', true)
        ->whereNotNull('application_deadline')
        ->where('application_deadline', '>', now())
        ->latest()
        ->get();

    return view('applicant.dashboard', compact(
        'applicant',
        'applications',
        'availableJobs'
    ));
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}