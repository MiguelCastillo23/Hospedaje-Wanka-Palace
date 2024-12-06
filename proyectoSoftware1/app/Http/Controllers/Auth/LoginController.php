<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;  

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/reservas'; // Redirigir a la lista de reservas después de iniciar sesión

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/login')->with('success', 'Has cerrado sesión con éxito.');
    }
    
}
