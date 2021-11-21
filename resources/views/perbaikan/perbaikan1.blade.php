<h3>Form Request Perbaikan</h3>
<br>
<form action="{{ url('perbaikan/store') }}" method="post">
    @csrf
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kode Maintenance</label>
    <div class="col-sm-10">
        <input type="hidden" readonly class="form-control-plaintext" name="id_main" value="{{ $main->id }}">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $main->kode_maintenance }}">
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
        <input type="text" class="form-control" name="judul_perbaikan" placeholder="Judul Perbaikan" @error('judul_perbaikan')
            style="border: 1px solid red;"
        @enderror value="{{ old('judul_perbaikan') }}">
        @error('judul_perbaikan')
            <small style="color: red;">{{ $message }}</small>
        @enderror
    </div>
</div>
<div>
    <div class="form-group row">
        <label class="col-lg-2">Material</label>
        <div data-repeater-list="" class="col-lg-10" id="items_material">
            <div data-repeater-item="" class="form-group row align-items-center count-class" id="del-1">
                <div class="col-md-7 col-lg-7">
                    <label for="inputEmail4">Nama Material</label>
                    <input type="text" class="form-control" name="nama_material[]" @error('nama_material[]')
                        style="border: 1px solid red;"
                    @enderror>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label for="inputEmail4">Jumlah Material</label>
                    <input type="number" class="form-control" name="jumlah_material[]" @error('nama_material[]')
                        style="border: 1px solid red;"
                    @enderror>
                </div>
                <div class="col-md-2 col-lg-2">
                    <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger btn-deleted" data-count="1">
                    <i class="fas fa-minus"></i>Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-right"></label>
        <div class="col-lg-4">
            <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary" id="btn_add">
            <i class="fas fa-plus"></i>Add</a>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">*Detail Perbaikan</label>
        <div class="col-sm-10">
            <textarea name="detail_perbaikan" class="form-control" id="" cols="30" rows="10" @error('detail_perbaikan')
                style="border: 1px solid red;"
            @enderror></textarea>
            @error('detail_perbaikan')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
</div>
<div class="card-footer">
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-2">
        <button type="submit" class="btn font-weight-bold btn-success mr-2">Submit</button>
        <button type="reset" class="btn font-weight-bold btn-secondary">Reset</button>
    </div>
</div>
</div>
</form>