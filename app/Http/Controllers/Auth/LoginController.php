<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\AuthServiceProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public const REDIRECT_AFTER_LOGIN = '/';
    public const REDIRECT_BEFORE_LOGIN = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallback(Request $request)
    {
        $userData = Socialite::driver('google')->stateless()->user();
        $isCompanyEmail = AuthServiceProvider::validateCompanyEmail($userData->email);

        if (!$isCompanyEmail) {
            return redirect(self::REDIRECT_BEFORE_LOGIN)->withErrors(trans('message.mustUseCompanyEmail'));
        }

        $user = User::createIfNotExist($userData);
        \Auth::loginUsingId($user->id);
        $request->session()->put('avatar', $userData->avatar_original);
        if ($request->session()->has('redirect_after_login') && !is_null($request->session()->get('redirect_after_login'))) {
            return redirect($request->session()->get('redirect_after_login'));
        }
        return redirect(self::REDIRECT_AFTER_LOGIN);
    }

    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->forget('redirect_after_login');
        $request->session()->forget('avatar');
        return redirect(self::REDIRECT_BEFORE_LOGIN);
    }
}
