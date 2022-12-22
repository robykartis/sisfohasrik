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
            $image = $request->file('image');
            $input['imagename'] = time() . '.' . $image->extension();
            $destinationPath = public_path('berkas/akunimg/thumbnail');
            $img = Image::make($image->path());
            $img->resize(500, 500, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);
            $destinationPath = public_path('berkas/akunimg');
            $image->move($destinationPath, $input['imagename']);
            User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'type' => 1,
                    'role' => 'admin',
                    "iamge" => $input['imagename'],

                ]

            );
        } else if ($role == 'operator') {
            User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'type' => 2,
                    'role' => 'operator',
                ]

            );
        } else {
            User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'type' => 3,
                    'role' => 'readonly',

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
