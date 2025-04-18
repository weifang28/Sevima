<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the user exists
        $user = User::where('username', $request->username)->first();

        if ($user) {
            if ($user->password === $request->password ) {
                Auth::login($user);

                Session::put('loggedIn', $user->username);

                return redirect()->intended('/home');
            } else {
                return redirect()->back()->with('msg', 'The provided password is incorrect.');
            }
        } else {
            $newUser = User::create([
                'username' => $request->username,
                'password' => $request->password,
                'datecreated' => now(),
            ]);

            Auth::login($newUser);
            return redirect()->intended('/home'); 
        }
    }

    
    public function logout()
    {
        Session::forget('loggedIn');
        return redirect('/');
    }
}
