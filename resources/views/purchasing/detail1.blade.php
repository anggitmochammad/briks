<h3>Form Request perbaikan</h3>
<br>
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Maintenance</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $main->getMaintenance->kode_maintenance }}">
    </div>
</div>
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Request Perbaikan</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $main->kode }}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Maintenance</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $main->getMaintenance->tanggal_maintenance }}" name="tgl_main">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">*Judul</label>
    <div class="col-sm-10">
        <input type="text" class="form-control-plaintext" readonly name="judul_perbaikan" placeholder="Judul Perbaikan" @error('judul_perbaikan')
            style="border: 1px solid red;"
        @enderror value="{{ $main->judul }}">
        @error('judul_perbaikan')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>
</div>
<input type="hidden" name="id_req_perbaikan" value="{{ $main->id }}">
<div class="form-group row">
    <label class="col-sm-2 col-form-label">*Departement</label>
    <div class="col-sm-10">
        <input type="text" class="form-control-plaintext" name="departement" placeholder="Departement Anda" @error('departement')
            style="border: 1px solid red;"
        @enderror @if(Auth::user()->id_role != 4) readonly @endif @if($main->department != null) value="{{ $main->department }}" readonly @endif>
        @error('departement')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>
</div>
<div>
<form action="{{ url('pembayaran') }}" method="post" id="gogogo">
{{-- <form action=":;" method="POST"> --}}
@csrf
    <input type="hidden" name="id_maintenance" value="{{ $main->getMaintenance->id }}">
    <div class="form-group row">
        <label class="col-lg-2">Material</label>
        <div class="col-lg-10">
            <table class="table table-separate table-head-custom table-checkable mt-10 display nowrap responsive" id="tb_material">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th style="width: 50%">Nama Material</th>
                        <th>Jumlah</th>
                        <th class="d-flex justify-content-end">Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($main->haveManyMaterial as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_material }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td class="d-flex justify-content-end">
                                <div class="form-group row">
                                    <label class="col-sm-2">Rp</label>
                                    <div class="col">
                                        <input type="hidden" value="{{$item->id}}" name="id_material[]">
                                        <input type="text" @if ($main->status_request_perbaikan == 0)
                                            class="form-control-plaintext uang" readonly
                                        @else
                                        class="form-control uang"
                                        @endif name="harga_material[]" value="{{ $item->harga }}">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">*Detail Perbaikan</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="" cols="30" rows="10" @error('detail_perbaikan')
                style="border: 1px solid red;"
            @enderror readonly>{{ $main->detail_request_perbaikan }}</textarea>
            @error('detail_perbaikan')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>
    </div>
    
</div>
</div>
{{-- @if (Auth::user()->id_role == 4)
@if ($main->department == null)
<div class="card-footer">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
            <button type="submit" class="btn font-weight-bold btn-success mr-2">Submit</button>
        </div>
    </div>
</div>
@endif
@endif --}}
@if ($main->status_request_perbaikan != 0)
<div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="check">
        <label class="form-check-label" for="defaultCheck1" class="error" style="">
          Ketika anda mencentang maka akan secara otomatis anda akan menyetujui.
        </label>
        <span id="spnError" class="error" style="display: none">Tolong Dicetang Terlebih dahulu dan Pastikan harga sudah sesuai.</span>
      </div>
</div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-2">
                <button type="button" id="approve" class="btn font-weight-bold btn-success mr-2">Submit</button>
            </div>
        </div>
    </div>
@endif
</form>

@push('js')
    <script>
        $('#approve').click(function () {
            var check = $('#check').is(':checked');
            if (check == true) {
                $('#gogogo').submit();
            }
            else {
                $('#spnError').css({'display': 'block'});
                $('.error').css({'color': 'red'})
            }
        })
        
    </script>
@endpush

