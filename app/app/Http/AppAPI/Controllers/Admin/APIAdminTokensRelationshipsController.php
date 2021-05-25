<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenIdentifierResource;
use Domain\Admins\Models\Admin;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class APIAdminTokensRelationshipsController extends Controller
{
    /**
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function index($id): AnonymousResourceCollection
    {
        $admin = Admin::findOrFail($id);

        return TokenIdentifierResource::collection($admin->tokens);
    }

    public function update()
    {

    }
}
