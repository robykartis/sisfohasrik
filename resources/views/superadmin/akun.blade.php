@extends('layouts.app')
@section('title')
    Akun
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('superadmin_akun') }}
@endsection
@section('content')
    <div class="content">
        @if (session('store'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <p class="mb-0">
                    Akun Berhasil Dihapus !
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <p class="mb-0">
                    Akun Berhasil Dihapus !
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <p class="mb-0">
                    Akun Berhasil Dihapus !
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Recent Orders</h3>
                <div class="block-options space-x-1">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                        data-target="#one-dashboard-search-orders" data-class="d-none">
                        <i class="fa fa-search"></i>
                    </button>
                    <div class="d-inline-block">
                        <a type="button" href="{{ route('akun.create') }}" class="btn btn-sm btn-alt-primary"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user-plus"></i>
                            Tambah
                        </a>
                    </div>
                </div>
            </div>
            <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                <!-- Search Form -->
                <form action="?">
                    <div class="push">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-alt" id="one-ecom-orders-search"
                                name="search" value="{{ request()->search }}" placeholder="Search all orders..">

                            <button type="submit" class="input-group-text bg-body border-0">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- END Search Form -->
            </div>

            <div class="block-content block-content-full">
                <!-- Recent Orders Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-vcenter">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="d-none d-xl-table-cell">Nama</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                                <th class="d-none d-xl-table-cell ">Akses</th>
                                <th class="d-none d-xl-table-cell text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="fs-sm">
                            <?php $no = 1; ?>
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <strong>{{ $no++ }}</strong>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <strong>{{ $user->name }}</strong>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <strong>{{ $user->email }}</strong>
                                    </td>

                                    <td class="d-none d-sm-table-cell">
                                        <span
                                            class="fs-xs fw-semibold py-1 px-3 rounded-pill bg-success-light text-success">{{ $user->role }}</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <div class="text-center">

                                            <a type="button" class="btn btn-sm btn-alt-info" href="">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>
                                            <a type="button" class="btn btn-sm btn-alt-danger" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <button class="btn btn-sm btn-alt-danger delete"
                                                data-url="{{ route('akun.destroy', $user->id) }}">
                                                <i class="fa fa-fw fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data User belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- END Recent Orders Table -->
            </div>
            <div class="block-content block-content-full bg-body-light">
                <!-- Pagination -->
                <nav aria-label="Photos Search Navigation">
                    {{ $search_akun->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-5') }}
                    {{-- {!! $users->withQueryString()->links('pagination::bootstrap-5') !!} --}}
                </nav>
                <!-- END Pagination -->
            </div>
        </div>
    </div>
@endsection
@push('css-external')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endpush
@push('javascript-external')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('vendor/assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('vendor/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('vendor/assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endpush
@push('modal')
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <form action="#" method="post" class="modal-content">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Hapus Akun</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            @csrf
                            @method('delete')
                            <p>Hapus Akun ini ?</p>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Hapus</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush
@push('javascript-internal')
    <script>
        $(function() {
            let modalDelete = new bootstrap.Modal($('#modalDelete'));
            $('.delete').click(function() {
                let url = $(this).attr('data-url');
                $('#modalDelete form').attr('action', url);
                modalDelete.show();
            })
        })
    </script>
@endpush
{{-- @push('javascript-internal')
    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
             --------------------------------------------
             Pass Header Token
             --------------------------------------------
             --------------------------------------------*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*------------------------------------------
            --------------------------------------------
            Render DataTable
            --------------------------------------------
            --------------------------------------------*/
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('products-ajax-crud.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'detail',
                        name: 'detail'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Button
            --------------------------------------------
            --------------------------------------------*/
            $('#createNewProduct').click(function() {
                $('#saveBtn').val("create-product");
                $('#product_id').val('');
                $('#productForm').trigger("reset");
                $('#modelHeading').html("Create New Product");
                $('#ajaxModel').modal('show');
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Edit Button
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.editProduct', function() {
                var product_id = $(this).data('id');
                $.get("{{ route('products-ajax-crud.index') }}" + '/' + product_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Product");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#product_id').val(data.id);
                    $('#name').val(data.name);
                    $('#detail').val(data.detail);
                })
            });

            /*------------------------------------------
            --------------------------------------------
            Create Product Code
            --------------------------------------------
            --------------------------------------------*/
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ route('products-ajax-crud.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {

                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            Delete Product Code
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.deleteProduct', function() {

                var product_id = $(this).data("id");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('products-ajax-crud.store') }}" + '/' + product_id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

        });
    </script>
@endpush --}}
