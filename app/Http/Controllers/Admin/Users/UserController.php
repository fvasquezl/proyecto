<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\users\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return inertia('Admin/Users/Index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Admin/Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $request->createUser();

        return inertia('Admin/Users/Create');
    }

    /**
     * Display the specified resource.
     *
     * @param User $employee
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        return inertia('Admin/Users/Show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        return inertia('Admin/Users/Edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param User $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $employee)
    {
        $request->updateUser($employee);

        return inertia('Admin/Users/Index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        //
    }
}
