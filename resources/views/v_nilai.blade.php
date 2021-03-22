@extends('layout.v_template')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Input Nilai</h5>
        <div class="form-group row">
            <!-- <label class="col-md-3 m-t-15">Nama Mahasiswa</label>
            <div class="col-md-9">
                <select class="select2 form-control custom-select" style="width: 100%; height:36px;">
                    <option>Select</option>
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                </select>
            </div> -->
            <label for="nama" class="col-sm-3 text-left control-label col-form-label">Nama Mahasiswa</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="quiz" placeholder="Input Nama">
            </div>
        </div>
        <div class="form-group row">
            <label for="quiz" class="col-sm-3 text-left control-label col-form-label">Nilai Quiz</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="quiz" placeholder="Input Nilai Quiz">
            </div>
        </div>
        <div class="form-group row">
            <label for="uts" class="col-sm-3 text-left control-label col-form-label">Nilai UTS</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="uts" placeholder="Input Nilai UTS">
            </div>
        </div>
        <div class="form-group row">
            <label for="uas" class="col-sm-3 text-left control-label col-form-label">Nilai UAS</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="uas" placeholder="Input Nilai UAS">
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </div>

</div>
@endsection