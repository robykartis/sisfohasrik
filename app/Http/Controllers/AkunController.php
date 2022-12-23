<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'List Akun';
        $users = User::latest()->paginate(2);
        return view('superadmin.akun.index', [
            'title' => $title,
            'users' => $users,
        ])->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function json(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'name');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('superadmin.akun.index');
    }

    public function create()
    {

        $title = 'Tambah Akun Baru';
        return view('superadmin.akun.akun_add', [
            'title' => $title,

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

    public function edit(Request $reques, User $user)
    {
        dd($user);
        // $title = 'Edit Akun';
        // return view('superadmin.akun_edit', [
        //     'user' => $user,
        //     'title' => $title
        // ]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('delete', 'success');
    }
}
