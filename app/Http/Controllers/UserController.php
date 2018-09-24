<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends BaseController
{
    private $userRepository;

    public function __construct(Request $request, UserRepository $userRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        return view('user.login');
    }

    public function postChangeUserPermission(Request $request)
    {
        $response = $this->userRepository->changeUserPermission($request);

        if ($response['success'] == false) {
            http_response_code(403);
        }
        return response()->json($response);
    }

    public function profile(Request $request, $id)
    {
    }

    public function changeChatworkId(Request $request)
    {
        return response()->json($this->userRepository->updateChatworkId($request));
    }
}
