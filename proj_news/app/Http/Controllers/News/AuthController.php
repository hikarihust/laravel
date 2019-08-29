<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\UserModel;

class AuthController extends Controller
{
    private $pathViewController = 'news.pages.auth.';
    private $controllerName = 'auth';
    private $params         = array();
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function login(Request $request)
    {   
        return view($this->pathViewController . 'login');
    }

    public function postLogin(Request $request)
    {   
        if($request->method() === 'POST') {
            $params = $request->all();
        }
    }

    public function logout(Request $request)
    {   

    }
}