<?php

namespace App\Http\AppAPI\Controllers\Admin\CRUD;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Admin\AdminCollection;
use App\Http\AppAPI\Resources\Admin\AdminResource;
use Domain\Admins\Models\Admin;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class APIAdminUserIndexController extends Controller
{
    /**
     * @param Request $request
     * @return AdminCollection
     */
    public function index(Request $request ): AdminCollection
    {
        $perPage = $request->get('per_page');

        $admins = QueryBuilder::for(Admin::class)
            ->allowedIncludes(['tokens'])
            ->allowedSorts(['name', 'email'])
            ->jsonPaginate($perPage);

        return new AdminCollection($admins);
    }

    /**
     * @param $id
     * @return AdminResource
     */
    public function show($id): AdminResource
    {
        $admin = Admin::with('tokens')->findOrFail($id);

        return new AdminResource($admin);
    }
}
