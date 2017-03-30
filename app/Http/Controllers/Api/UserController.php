<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller
{

    public function user(Request $request) {
        $role = Role::where('user_id', $request->user()->id)->where('client_id', $request->client_id)->first();
        if ( ! $role) {
            abort(403, 'unauthorize');
        }
        $user = User::find($request->user()->id);
        $user['role'] = $role->type;
        return $user;
    }

    public function index(Request $request) {
        $users = User::initialize();

        if ($branch = $request->branch) {
            $users->branch($branch);
        }

        if ($department = $request->department) {
            $users->department($department);
        }

        if ($position = $request->position) {
            $users->position($position);
        }

        if ($department_head = $request->department_head) {
            $users->departmentHead($department_head);
        }

        $users = $users->get();

        return $users;
    }

    public function show($id) {
        return User::find($id);
    }

}
