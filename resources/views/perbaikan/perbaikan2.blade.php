<h3>Form Request perbaikan</h3>
<br>
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Maintenance</label>
    <div class="col-sm-10">
        <input type="hidden" readonly class="form-control-plaintext" name="id_main" value="{{ $main->id }}">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $main->kode_maintenance }}">
    </div>
</div>
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Request Perbaikan</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $main->haveOne_to_req_perbaikan->kode }}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Maintenance</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value="{{ $main->tanggal_maintenance }}" name="tgl_main">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">*Judul</label>
    <div class="col-sm-10">
        <input type="text" class="form-control-plaintext" readonly name="judul_perbaikan" placeholder="Judul Perbaikan" @error('judul_perbaikan')
            style="border: 1px solid red;"
        @enderror value="{{ $main->haveOne_to_req_perbaikan->judul }}">
        @error('judul_perbaikan')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>
</div>
<form action="{{ url('perbaikan/update') }}" method="post">
@csrf
<input type="hidden" name="id_req_perbaikan" value="{{ $main->haveOne_to_req_perbaikan->id }}">
<div class="form-group row">
    <label class="col-sm-2 col-form-label">*Departement</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="departement" placeholder="Departement Anda" @error('departement')
            style="border: 1px solid red;"
        @enderror @if(Auth::user()->id_role != 4) readonly @endif @if($main->haveOne_to_req_perbaikan->department != null) value="{{ $main->haveOne_to_req_perbaikan->department }}" readonly @endif>
        @error('departement')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>
</div>
<div>
    <div class="form-group row">
        <label class="col-lg-2">Material</label>
        <div class="col-lg-10">
            <table class="table table-separate table-head-custom table-checkable mt-10 display nowrap responsive" id="tb_material">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Material</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($main->haveOne_to_req_perbaikan->haveManyMaterial as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_material }}</td>
                            <td>
                                @if ($item->status_material == 0)
                                    <span class="badge badge-success">final</span>
                                @elseif ($item->status_material == 1)
                                    <span class="badge badge-danger">Masih Dipesankan</span>
                                @endif
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
            @enderror readonly>{{ $main->haveOne_to_req_perbaikan->detail_request_perbaikan }}</textarea>
            @error('detail_perbaikan')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
</div>
@if (Auth::user()->id_role == 4)
@if ($main->haveOne_to_req_perbaikan->department == null)
<div class="card-footer">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
            <button type="submit" class="btn font-weight-bold btn-success mr-2">Submit</button>
        </div>
    </div>
</div>
@endif
@endif
</form>
