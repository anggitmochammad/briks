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
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputEmail4">Nama Judul</label>
                    <input type="text" class="form-control" value="{{ $main->judul }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Nama Peralatan</label>
                    <input type="text" class="form-control" value="{{ $main->havePeralatan->nama_peralatan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Tanggal Maintenance</label>
                    <input type="text" class="form-control" name="tgl_main" value="{{ tglIndo($main->tanggal_maintenance) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Nama Pelaksana Maintenance</label>
                    <input type="text" class="form-control" readonly name="pelaksana" value="{{ $main->pelaksana_maintenance }}">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Hasil Maintenance</label>
                    <textarea name="hasil_main" class="form-control" id="" cols="30" rows="10" readonly>{{ $main->hasil_maintenance }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('#tb_material').DataTable({
            "iDisplayLength": 3,
            "columnDefs": [
                { "width": "20%", "targets": 2 },
                { "width": "10%", "targets": 0 }
            ],
            "bFilter": false,
            "bInfo": false,
            "bLengthChange": false
        });

        $('#btn_add').click(function () {
            let count = $('.count-class').length+1;
            let html = $(`<div data-repeater-item="" class="form-group row align-items-center count-class" id="del-${count}">
                                <div class="col-md-7">
                                    <label for="inputEmail4">Nama Material</label>
                                    <input type="text" class="form-control" name="nama_material[]">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail4">Jumlah Material</label>
                                    <input type="number" class="form-control" name="jumlah_material[]">
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger btn-deleted" data-count="${count}">
                                    <i class="fas fa-minus"></i>Delete</a>
                                </div>
                            </div>`).hide().fadeIn(400);
            $('#items_material').append(html);
        });
        $('#items_material').on('click' , '.btn-deleted' , function () {
            let id = $(this).attr("data-count");
            $('#del-'+id).fadeOut(400 , function () {
                $(this).remove();
            });
        });
    </script>
@endpush
