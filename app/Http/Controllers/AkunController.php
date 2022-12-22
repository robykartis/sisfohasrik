<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $title = 'List Akun';
        $search = $request->search;
        $search_akun = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(2);
        $users = User::latest()->paginate(2);
        return view('superadmin.akun', [
            'title' => $title,
            'users' => $users,
            'search_akun' => $search_akun
        ]);
    }

    public function create()
    {
        $title = 'Tambah Akun Baru';
        return view('superadmin.akun_add', [
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'role' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'password' => 'required|min:6',

            ],

        );
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first(),);
        }

        $role = $request['role'];
        $name = $request['name'];
        $email = $request['email'];
        $image = $request['image'];
        $password = bcrypt($request['password']);

        if ($role == 'admin') {
            if ($image = $request->file('image')) {
                $destinationPath = 'images/akun';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }
            User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'type' => 1,
                    'role' => 'admin',
                    "image" => $input['image'],
                ]
            );
        } else if ($role == 'operator') {
            if ($image = $request->file('image')) {
                $destinationPath = 'images/akun';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }
            User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'type' => 2,
                    'role' => 'operator',
                    "image" => $input['image'],
                ]
            );
        } else {
            if ($image = $request->file('image')) {
                $destinationPath = 'images/akun';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }
            User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'type' => 3,
                    'role' => 'readonly',
                    "image" => $input['image'],
                ]
            );
        }
        return redirect()->route('akun.index')->with('store', 'Data Berhasil Disimpan');
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
