@extends('layout.v_template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="/dosen/store" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="content">
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input name="nama_dosen" class="form-control" value="{{ old('nama_dosen') }}">
                            <div class="text-danger">
                                @error('nama_dosen')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">NIP</label>
                        <div class="col-sm-6">
                            <input name="nip" class="form-control" value="{{ old('nip') }}">
                            <div class="text-danger">
                                @error('nip')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">Matkul</label>
                        <div class="col-sm-6">
                            <input name="matkul" class="form-control" value="{{ old('matkul') }}">
                            <div class="text-danger">
                                @error('matkul')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">Foto</label>
                        <div class="col-sm-6">
                            <input type="file" name="foto_dosen" class="form-control" value="{{ old('foto_dosen') }}">
                            <div class="text-danger">
                                @error('foto_dosen')
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