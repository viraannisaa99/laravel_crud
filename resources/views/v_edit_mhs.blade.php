@extends('layout.v_template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="/mhs/update/{{ $mahasiswa->id }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="content">
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input name="nama_mhs" class="form-control" value="{{ $mahasiswa->nama_mhs }}">
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
                            <input name="nim" class="form-control" value="{{ $mahasiswa->nim }}" readonly>
                            <div class="text-danger">
                                @error('nim')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <img src="{{ url('foto_mhs/'.$mahasiswa->foto_mhs) }}" width="100px">
                        </div>
                        <div class="col-sm-6">
                            <input type="file" name="foto_mhs" class="form-control">
                            <div class="text-danger">
                                @error('foto_mhs')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row col-sm-2">
                    <button class="btn btn-primary btn-sm">Update</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>


@endsection