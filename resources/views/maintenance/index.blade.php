@extends('layout.backend')

@push('css')

@endpush

@section('contents')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Maintenance
                    <span class="d-block text-muted pt-2 font-size-sm">Management Maintenance</span></h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ url('maintenance/create') }}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Tambah Maintenance
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom table-checkable mt-10 display nowrap responsive" id="tb_main">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Kode Maintenance</th>
                            <th>Nama Peralatan</th>
                            <th>Tanggal Maintenance</th>
                            <th>Nama Pelaksana</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kode_maintenance }}</td>
                                <td>{{ $item->havePeralatan->nama_peralatan }}</td>
                                <td>{{ tglIndo($item->tanggal_maintenance) }}</td>
                                <td>{{ $item->pelaksana_maintenance }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge badge-success">Telah Diperbaiki</span>
                                    @elseif ($item->status == 1)
                                        <span class="badge badge-info">Masih Perbaikan</span>
                                    @elseif ($item->status == 99)
                                        <span class="badge badge-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{ url('maintenance/'.$item->id) }}" class="btn btn-primary">Detail</a>
                                    @if ($item->status != 0)
                                    <form action="{{ url('maintenance/delete/'.$item->id) }}" id="form-{{ $item->id }}" method="post">
                                        @csrf
                                        <button type="button" class="btn btn-danger" onclick="deleted({{ $item->id }})">Hapus</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('#tb_main').DataTable({
            "iDisplayLength": 25
        });

        function deleted(id) {
            Swal.fire({
                title: 'Apakah anda yakin ingin Menghapus?',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                // denyButtonText: `Don't save`,
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-'+id).submit();
                }
            });
        }
    </script>
@endpush
