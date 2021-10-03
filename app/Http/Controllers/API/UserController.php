<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use App\Services\UserService;

class UserController extends Controller
{

    /**
     * @var UserService
     */
    protected $user;

    /**
     * UserController Constructor
     *
     * @param userService $userService
     *
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }
/**
     * Register api
     */
    public function register(UserRegister $request)
    {
       return $this->user->register($request);
    }
/**
     * login api
     */
    public function login(UserLogin $request)
    {
        return $this->user->login($request);
    }

/**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        return $this->user->details();
    }
}
