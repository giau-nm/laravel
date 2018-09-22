<?php
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthService
{

    public function createUser($email, $password, $lastname, $firstname)
    {
        return User::create([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }

    /**
     * Get a user with email and password.
     *
     * @param String $email     Email.
     * @param string $password  Password.
     * @return Array Response array of get user.
     */
    public function getUser($email, $password)
    {
        $success = false;
        $message = '';
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                $success = true;
            } else {
                $message = "Hmm, that's not the right password. Please try again.";
            }
        } else {
            $message = "Hmm, we don't recognize that email. Please try again.";
        }

        return compact('success', 'user', 'message');
    }
}
