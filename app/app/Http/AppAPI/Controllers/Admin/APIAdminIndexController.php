<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Admin\AdminCollection;
use App\Http\AppAPI\Resources\Admin\AdminResource;
use Domain\Admins\Models\Admin;
use Illuminate\Http\Request;

class APIAdminIndexController extends Controller
{
    /**
     * @return AdminCollection
     */
    public function index(): AdminCollection
    {
        $admins = Admin::with('tokens')->get();

        return new AdminCollection($admins);
    }

    public function show($id)
    {
        $admin = Admin::with('tokens')->findOrFail($id);

        return new AdminResource($admin);
    }
}
