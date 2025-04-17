<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
//    public function store(LoginRequest $request): RedirectResponse
//    {
//        $request->authenticate();
//        $request->session()->regenerate();
//        return redirect()->intended(RouteServiceProvider::HOME);
//    }

//    public function store(LoginRequest $request): RedirectResponse
//    {
//
//        $request->authenticate();
//        $request->session()->regenerate();
//        $user = Auth::user();
//        $userAgent = new Agent();
//        $data = [
//            'email' => $user->email,
//            'ip' => $request->ip(),
//            'browser' => $userAgent->browser(),
//            'platform' => $userAgent->platform(),
//            'last_login' => now(), // or use your preferred date format
//            'user_agent' => $request->header('User-Agent'),
//        ];
//        DB::table('login_logs')->insert($data);
//        return redirect()->intended(RouteServiceProvider::HOME);
//    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        $user = Auth::user();
        $userAgent = new Agent();
        $data = [
            'email' => $user->email,
            'ip' => $request->ip(),
            'browser' => $userAgent->browser(),
            'platform' => $userAgent->platform(),
            'last_login' => now(), // or use your preferred date format
            'user_agent' => $request->header('User-Agent'),
        ];
        DB::table('login_logs')->insert($data);
        // Redirect based on user role
        if ($user->is_registration_by == 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->is_registration_by == 'user') {
            return redirect()->intended('/user/dashboard');
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
