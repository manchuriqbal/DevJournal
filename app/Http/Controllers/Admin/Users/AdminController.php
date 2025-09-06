<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::with('profile')->paginate(15);
        return view('admin.users.admin.index')->with([
            'admins' => $admins,
        ]);
    }

    public function create()
    {
        return view('admin.users.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:creators',
            'password' => 'required|string',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return redirect()->route('admin.admins.index')->with('success', 'Author created successfully.');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index')->with('warning', 'author successully deleted!');
    }
}
