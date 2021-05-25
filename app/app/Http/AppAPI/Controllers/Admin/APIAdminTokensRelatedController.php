<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use Domain\Admins\Models\Admin;

class APIAdminTokensRelatedController extends Controller
{
    /**
     * @param $id
     * @return TokenCollection|Admin
     */
    public function index($id): Admin|TokenCollection
    {
        $admin = Admin::findOrFail($id);
        return new TokenCollection($admin->tokens);
    }
}
