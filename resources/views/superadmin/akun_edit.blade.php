@extends('layouts.app')
@section('title')
    Edit Akun
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('akun_edit') }}
@endsection
@section('content')
    <div class="content">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $title }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('akun.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">

                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-username">Nama</label>
                                <input type="text" value="{{ $user->name }}" class="form-control"
                                    id="one-profile-edit-username" name="name">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" id="one-profile-edit-email" name="email"
                                    value="{{ old('email') }}" placeholder="Masukan Email..">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-name">Kata Sandi</label>
                                <input type="password" class="form-control" id="one-profile-edit-name" name="password"
                                    placeholder="Masukan Kata Sandi..">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                <select class="form-select" id="example-select-floating" name="role"
                                    aria-label="Floating label select example">
                                    <option selected disabled>Silahkan Pilih Akses Akun</option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                    <option value="readonly">Read Only</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Your Avatar</label>
                                <div class="mb-4">
                                    <img class="img-avatar" src="{{ asset('vendor/assets/media/avatars/avatar13.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mb-4">
                                    <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                                    <input class="form-control" name="image" type="file" id="one-profile-edit-avatar">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn  btn-alt-primary" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-fw fa-file-circle-plus"></i>
                                    Simpan
                                </button>
                                <a type="button" href="{{ route('akun.index') }}" class="btn  btn-alt-danger"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-circle-arrow-left"></i>
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
