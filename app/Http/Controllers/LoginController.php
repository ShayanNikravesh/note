<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function authenticate(AuthenticationRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            Alert::toast('Welcome!', 'success')->background('#1a1a2e')->flash();
            
            return redirect()->action([NoteController::class, 'index']);
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signup(AuthenticationRequest $request): RedirectResponse
    {
        $user = $request->validated();

        $password = Hash::make($request->password);
        $user = new User();
        $user->email = $request->email;
        $user->password = $password;
        $user->save();

        event(new Registered($user));

        Alert::toast('ًRegister Successfull!', 'success')->background('#1a1a2e')->flash();

        return redirect('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}
