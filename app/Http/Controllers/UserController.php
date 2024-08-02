<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminUpdatePasswordRequest; 

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        $data = compact('users');

        return view('users.index', $data);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function updatePassword(AdminUpdatePasswordRequest $request, User $user)
    {
        // Cập nhật mật khẩu
        $user->password = Hash::make($request->password);

        $user->update($request->toArray());

        return redirect()->route('admin.users.index')->with('status', 'password-updated');
    }

}
