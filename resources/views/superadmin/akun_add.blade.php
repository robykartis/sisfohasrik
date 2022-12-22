@extends('layouts.app')
@section('title')
    Tambah Akun
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('akun_add') }}
@endsection
@section('content')
    <div class="content">
        <!-- Floating Labels -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $title }}</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-xl-6">
                            {{-- <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="example-text-input-readonly-floating"
                                    name="example-text-input-readonly-floating" placeholder="Enter a username"
                                    value="john.doe" readonly>
                                <label for="example-text-input-readonly-floating">Username (readonly)</label>
                            </div> --}}
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="example-text-input-floating" name="name"
                                    placeholder="John Doe">
                                <label for="example-text-input-floating">Masukan Nama</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="example-email-input-floating" name="email"
                                    placeholder="john.doe@example.com">
                                <label for="example-email-input-floating">Masukan Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="example-password-input-floating"
                                    name="password" placeholder="Password">
                                <label for="example-password-input-floating">Masukan Katasandi</label>
                            </div>

                            <div class="form-floating mb-4">
                                <select class="form-select" id="example-select-floating" name="role"
                                    aria-label="Floating label select example">
                                    <option selected disabled>Silahkan Pilih Akses Akun</option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                    <option value="readonly">Read Only</option>
                                </select>
                                <label for="example-select-floating">Akses</label>
                            </div>
                            <div class="form-floating mb-4">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn  btn-alt-primary" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-fw fa-file-circle-plus"></i>
                                        Simpan
                                    </button>
                                </div>
                                <div class="d-inline-block">
                                    <a type="button" href="{{ route('akun.index') }}" class="btn  btn-alt-danger"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-circle-arrow-left"></i>
                                        Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-6">
                            <a class="img-link img-link-zoom-in img-thumb img-lightbox"
                                href="{{ asset('vendor/assets/media/photos/photo2@2x.jpg') }}">
                                <img class="img-fluid" src="{{ asset('vendor/assets/media/photos/photo2.jpg') }}"
                                    alt="">
                            </a>
                            <div class="mb-4 mt-2">
                                <input type="file" name="image" class="form-control"
                                    id="example-password-input-floating">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Floating Labels -->
    </div>
@endsection
