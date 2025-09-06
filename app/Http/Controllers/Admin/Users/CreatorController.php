<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Creator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreatorController extends Controller
{
     public function index()
    {
        $authors = Creator::with('profile')->paginate(15);
        return view('admin.users.creator.index')->with([
            'authors' => $authors,
        ]);
    }

    public function create()
    {
        return view('admin.users.creator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:creators',
            'password' => 'required|string',
        ]);

        $creator = Creator::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

       

        return redirect()->route('admin.creators.index')->with('success', 'Author created successfully.');
    }

    public function destroy(Creator $creator)
    {
        $creator->delete();
        return redirect()->route('admin.creators.index')->with('warning', 'author successully deleted!');
    }
}
