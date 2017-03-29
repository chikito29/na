<?php

namespace App\Http\Controllers;

use Laravel\Passport\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Token;
use App\User;
use App\Department;
use App\Position;
use App\Branch;
use App\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if($query = request('search')) {
            $users = User::where('first_name', 'LIKE', '%' . $query . '%')
                ->orWhere('last_name', 'LIKE', '%' . $query . '%')
                ->orWhere('department', 'LIKE', '%' . $query . '%')
                ->orWhere('position', 'LIKE', '%' . $query . '%')->paginate(12);

            return view('users.index', compact('users'));
        } else {
            $users = User::paginate(12);
            return view('users.index', compact('users'));
        }
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        $branches = Branch::all();
        $applications = Client::where('revoked', '!=', 1)->get();
        return view('users.create', compact('departments', 'positions', 'applications', 'branches'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'employee_id' => 'required|unique:users,employee_id',
            'email' => 'required|unique:users,email|email|max:191',
            'department' => 'required|max:191',
            'position' => 'required|max:191',
            'employment_status' => 'required|max:191',
            'account_type' => 'required',
            'username' => 'required|unique:users,username|max:191',
            'password' => 'required|max:191',
            'confirm_password' => 'required|same:password'
        ])->validate();

        $user = new User();
        $user->first_name = $request->first_name;
        $user->middle_name = is_null($request->middle_name) ? '' : $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->employee_id = $request->employee_id;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->department_head = is_null($request->department_head) ? false : true;
        $user->position = $request->position;
        $user->branch = $request->branch;
        $user->employment_status = $request->employment_status;
        $user->remarks = is_null($request->remarks) ? '' : $request->remarks;
        $user->type = $request->account_type;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();

        $applications = Client::where('revoked', '!=', 1)->get();
        foreach ($applications as $application) {
            if ($request[$application->code]) {
                $role = new Role();
                $role->user_id = $user->id;
                $role->client_id = $application->id;
                $role->save();
            } else {
                $role = new Role();
                $role->user_id = $user->id;
                $role->client_id = $application->id;
                $role->save();
                $role->delete();
            }
        }

        return User::with('roles')->find($user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $positions = Position::all();
        $branches = Branch::all();
        $applications = Client::where('revoked', '!=', 1)->get();
        $user = User::find($id);
        return view('users.edit', compact('user', 'departments', 'positions', 'branches', 'applications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'employee_id' => 'required|unique:users,employee_id,' . $id,
            'email' => 'required|email|max:191|unique:users,email,' . $id,
            'department' => 'required|max:191',
            'position' => 'required|max:191',
            'employment_status' => 'required|max:191',
            'account_type' => 'required',
            'username' => 'required|max:191|unique:users,username,' . $id,
        ])->validate();

        $user = User::with('roles')->find($id);
        $user->first_name = $request->first_name;
        $user->middle_name = is_null($request->middle_name) ? '' : $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->employee_id = $request->employee_id;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->department_head = is_null($request->department_head) ? false : true;
        $user->position = $request->position;
        $user->branch = $request->branch;
        $user->employment_status = $request->employment_status;
        $user->remarks = is_null($request->remarks) ? '' : $request->remarks;
        $user->type = $request->account_type;
        $user->username = $request->username;
        $user->save();

        $applications = Client::where('revoked', '!=', 1)->get();
        foreach ($applications as $application) {
            if ($request[$application->code]) {
                $hasRole = false;
                foreach (Role::withTrashed()->where('user_id', $id)->get() as $role) {
                    if ($role->client_id == $application->id) {
                        $hasRole = true;
                        $role->restore();
                    }
                }

                if ( ! $hasRole) {
                    $role = new Role();
                    $role->user_id = $user->id;
                    $role->client_id = $application->id;
                    $role->save();
                }

            } else {
                $hasRole = false;
                foreach (Role::withTrashed()->where('user_id', $id)->get() as $role) {
                    if ($role->client_id == $application->id) {
                        $hasRole = true;
                        $role->delete();
                    }
                }

                if ( ! $hasRole) {
                    $role = new Role();
                    $role->user_id = $user->id;
                    $role->client_id = $application->id;
                    $role->save();
                    $role->delete();
                }

            }
        }

        session()->flash('notify', ['message' => $user->fullName() . ' has been updated!', 'type' => 'success']);
        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout($id) {
        $tokens = Token::where('user_id', Auth::user()->id)->update(['revoked' => true]);
        return view('auth.logout');
    }
}
