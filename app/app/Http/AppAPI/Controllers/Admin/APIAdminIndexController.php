<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use Domain\Admins\Models\Admin;
use Illuminate\Http\Request;

class APIAdminIndexController extends Controller
{
    public function index()
    {
//        dd(Admin::all());
        return Admin::all();
    }
}
