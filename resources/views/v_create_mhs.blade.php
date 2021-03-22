@extends('layout.v_template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="/mhs/store" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="content">
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input name="nama_mhs" class="form-control" value="{{ old('nama_mhs') }}">
                            <div class="text-danger">
                                @error('nama_mhs')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">NIM</label>
                        <div class="col-sm-6">
                            <input name="nim" class="form-control" value="{{ old('nim') }}">
                            <div class="text-danger">
                                @error('nim')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">Foto</label>
                        <div class="col-sm-6">
                            <input type="file" name="foto_mhs" class="form-control" value="{{ old('foto_mhs') }}">
                            <div class="text-danger">
                                @error('foto_mhs')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-sm-2">
                        <button class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection