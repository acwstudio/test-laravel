<?php

namespace App\Http\AppAPI\Controllers\Admin;

use App\Http\AppAPI\Controllers\Controller;
use App\Http\AppAPI\Resources\Token\TokenCollection;
use Domain\Admins\Models\Admin;

class APIAdminTokensRelatedController extends Controller
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
