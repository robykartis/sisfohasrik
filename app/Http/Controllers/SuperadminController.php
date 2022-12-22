<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('superadmin.index');
    }
    public function akun(Request $request)
    {
        $search = $request->search;
        $search_akun = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(2);
        $users = User::latest()->paginate(2);
        return view('superadmin.akun', [
            'users' => $users,
            'search_akun' => $search_akun
        ]);
    }

    public function edit(User $user)
    {
        return view('superadmin.edit_akun', [
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('delete', 'success');
    }
}
