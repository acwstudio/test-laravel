<?php

namespace App\Http\AppAPI\Controllers\Admin\Relationships;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use Domain\Users\Admins\Models\Admin;

class APIAdminUserTokensRelatedController extends Controller
{
    /**
     * Get related resource
     *
     * @param $id
     * @return TokenCollection
     */
    public function index($id): TokenCollection
    {
        $admin = Admin::findOrFail($id);

        return new TokenCollection($admin->tokens);
    }
}
