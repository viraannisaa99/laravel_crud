@extends('layout.v_template')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Basic Datatable</h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Matkul</th>
                            <th>Picture</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    <?php $no=1; ?>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $dosen->nama_dosen }}</td>
                            <td>{{ $dosen->nip }}</td>
                            <td>{{ $dosen->matkul }}</td>
                            <td><img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" width="80px"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
