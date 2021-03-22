@extends('layout.v_template')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="/dosen/update/{{ $dosen->id }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="content">
                    <div class="form-group row">
                        <label class="col-sm-2 text-left control-label col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input name="nama_dosen" class="form-control" value="{{ $dosen->nama_dosen }}">
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
                            <input name="nip" class="form-control" value="{{ $dosen->nip }}" readonly>
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
                            <input name="matkul" class="form-control" value="{{ $dosen->matkul }}">
                            <div class="text-danger">
                                @error('matkul')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" width="100px">
                        </div>
                        <div class="col-sm-6">
                            <input type="file" name="foto_dosen" class="form-control">
                            <div class="text-danger">
                                @error('foto_dosen')
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