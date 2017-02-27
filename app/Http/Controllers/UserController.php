<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use JavaScript;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query()->orderBy('id','desc')->paginate(10);

        foreach ($users as $user){
            $user->role = $user->role;
        }

        JavaScript::put([
            'users' => $users->toJson(),
            'nextPage' => $users->nextPageUrl(),
            'prevPage' => $users->previousPageUrl()
        ]);

        $data['users'] = $users->toJson();
        $data['nextPage'] = $users->nextPageUrl();
        $data['prevPage'] = $users->previousPageUrl();

        if($request->ajax() && $request->has('page')){
            $data['users'] = $users->toJson();
            $data['next'] = $users->nextPageUrl();
            $data['prev'] = $users->previousPageUrl();
            return json_encode($data);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->role = $user->role;
        $roles = Role::all();
        JavaScript::put([
            'user' => $user->toJson(),
            'roles' => $roles->toJson()
        ]);

        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
