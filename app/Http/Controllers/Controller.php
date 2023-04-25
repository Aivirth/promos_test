<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Checks if auth user is admin.
     * Aborts the request if check fails.
     *
     * @return boolean
     */
    public function isUserAdmin() {
        if (!auth()->user()->is_admin) {
            abort(403, 'Utente non amministratore');
        }
        return true;
    }

    public function isUserAuthorized($user_id) {

        $user = User::find($user_id);
        if (
            auth()->user()->is_admin
            || $user->id == auth()->user()->id
        ) {
            return true;
        }

        abort(403, 'Utente non autorizzato');

    }
}
