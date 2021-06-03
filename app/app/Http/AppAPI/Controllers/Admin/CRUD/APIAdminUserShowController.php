<?php

namespace App\Http\AppAPI\Controllers\Admin\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Admin\AdminResource;
use Domain\Users\Admins\Models\Admin;
use Spatie\QueryBuilder\QueryBuilder;

class APIAdminUserShowController extends Controller
{
    /**
     * @param $id
     * @return AdminResource
     */
    public function show($id): AdminResource
    {
        $admin = QueryBuilder::for(Admin::class)
            ->where('id', $id)
            ->allowedIncludes(['tokens'])
            ->firstOrFail();

        return new AdminResource($admin);
    }
}
