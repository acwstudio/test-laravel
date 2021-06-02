<?php

namespace App\Http\AppAPI\Controllers\Employer;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Employer\EmployerResource;
use Domain\Employers\Models\Employer;
use Illuminate\Http\Request;

class APIEmployerIndexController extends Controller
{
    public function index()
    {
        $employer = Employer::all();
        return EmployerResource::collection($employer);
    }
}
