<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('login');
    }

    public function registerIndex()
    {
        return view('register');
    }

    public function passwordIndex()
    {
        return view('password');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        toastr()->error('Invalid email or password');
        return redirect('login');
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::where('email', $request->email)
                    // ->orWhere('username', $request->login)
                    ->first();
        
        if($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            toastr()->success('Пароль удачно сменен!');
            return redirect('login');
        } else {
            toastr()->error('Не удалось найти пользователя!');
            return redirect('password');
        }
    
        //return redirect()->back()->with('status', 'Password updated successfully!');

        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect('login');
        // }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();

        Auth::login($user);
        toastr()->success('Registration successful!');
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        toastr()->success('Logout successful!');
        return redirect('login');
    }
}
