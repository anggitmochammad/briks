@extends('layout.backend')

@push('css')

@endpush

@section('contents')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Request Perbaikan
                    <span class="d-block text-muted pt-2 font-size-sm">Management Request Perbaikan</span></h3>
                </div>
                @if (!isset($main->haveOne_to_req_perbaikan->status_request_perbaikan) == 0)
                    <div class="card-toolbar">
                        <a href="{{ url('report/ce/'.$main->id) }}" target="_blank" class="btn btn-primary font-weight-bolder">
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
                            </span>Laporan
                        </a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <h3>Form Maintenance</h3>
                <br>
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
                    <input type="text" class="form-control" name="pelaksana" value="{{ $main->pelaksana_maintenance }}">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Hasil Maintenance</label>
                    <textarea name="hasil_main" class="form-control" id="" cols="30" rows="10" readonly>{{ $main->hasil_maintenance }}</textarea>
                </div>
            </div>
<hr>
            <div class="card-body">
                @if ($main->status_form == 1 || $main->status_form == 0)
                    @if ($main->haveOne_to_req_perbaikan == null)
                        @include('perbaikan.perbaikan1')
                    @elseif ($main->haveOne_to_req_perbaikan->count() > 0)
                        @include('perbaikan.perbaikan2')
                    @endif
                @endif
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
