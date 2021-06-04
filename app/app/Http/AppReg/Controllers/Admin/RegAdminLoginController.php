<?php

namespace App\Http\AppReg\Controllers\Admin;

use App\Http\AppReg\Controllers\Controller;
use Illuminate\Http\Request;

class RegAdminLoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return $request->header('APIEmployerUserUpdateController-Agent');
    }
}
