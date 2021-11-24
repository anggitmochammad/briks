@extends('layout.backend')

@push('css')

@endpush

@section('contents')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Berita Acara
                    <span class="d-block text-muted pt-2 font-size-sm">Management Berita Acara</span></h3>
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
                        @foreach ($berita_acara as $item)
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
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                    
                                    @if (isset($item->ToBeritaAcara) == true)
                                        @if ($item->ToBeritaAcara->status_berita_acara == 1)
                                            <span class="badge badge-warning">Masih Pengajuan</span>
                                        @elseif($item->ToBeritaAcara->status_berita_acara == 2)
                                            <span class="badge badge-primary">Telah Disetujui</span>
                                        @endif
                                    @else
                                        <span class="badge badge-info">Belum melakukan Pengajuan</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{ url('ce/b_acara/'.$item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                    <a href="{{ url('ce/b_acara/create/'.$item->id) }}" class="btn btn-info">Lihat Berita Acara</a>
                                    @if (isset($item->ToBeritaAcara) == true)
                                        @if($item->ToBeritaAcara->status_berita_acara == 2 && $item->ToBeritaAcara->spesifikasi == NULL)
                                        <button type="button" class="btn btn-secondary" onclick="ShowModal({{ $item->ToBeritaAcara->id }})">Update Spesifikasi</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="ModalUpdateSpec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Spesifikasi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('ce/b_acara/update_spec') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_berita" id="id_main">
                                    <div class="form-group row">
                                        <label class="col-lg-2">Spesifikasi</label>
                                        <div class="col-lg-10" id="items_material">
                                            <div data-repeater-item="" class="form-group row" id="del-1">
                                                <div class="col-md-6 col-lg-12">
                                                    <textarea class="form-control" name="spesifikasi" id="" cols="100" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                      </div>
                    </div>
                </div>
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

        function ShowModal(data) {
            let id = data;
            $("#id_main").val(id);
            $("#ModalUpdateSpec").modal('show');
        }
    </script>
@endpush
