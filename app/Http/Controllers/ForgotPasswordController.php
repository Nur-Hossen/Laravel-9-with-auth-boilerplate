<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('auth.forgot-password');
    }

    /**
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        $username = $request->username;
        $user = User::where('username', $username)->orWhere('email', $username)->first();
        if(! $user) {
            return back()
                ->withErrors(trans('We can\'t find a user with that username.'))
                ->withInput();
        }

        return redirect()->to('reset-password')->with('username', $user->username);
    }

    /**
     * @return Renderable
     */
    public function showResetPassword()
    {
        $username = session('username');
        return view('auth.recover-password', compact('username'));
    }

    /**
     * Handle account login request
     * 
     * @param ResetPasswordRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $credentials = $request->getCredentials();
        $user = User::where('username', $credentials['username'])->first();
    
        if(! $user->update($credentials)) {
            return redirect()->to('forgot-password')
                ->withErrors('Something went wrong. Please try again')
                ->with('username', $credentials['username']);
        }

        return redirect()->to('login')
                ->withSuccess(trans('passwords.reset'));

    }

}
