<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        User::firstOrCreate([
            'email' => $data['email'],
        ],$data);

        return $data;
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user,UserUpdateRequest $request)
    {
        $data = $request->validated();
        $user->update($data);

        return response()->json(['status' => 'ok']);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
