@extends('layout.v_template')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Basic Datatable</h5>
            <a href="/dosen/create" class="btn btn-success btn-sm">Tambah Data</a>
            <br><br>
            @if(session('pesan'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4 class="alert-heading"><i class="icon fa fa-check"></i> Sukses!</h4>
                <p>{{ session('pesan') }}</p>
            </div>
            @endif

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Matkul</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php $no = 1; ?>
                        @foreach($dosen as $dsn)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $dsn->nama_dosen }}</td>
                            <td>{{ $dsn->nip }}</td>
                            <td>{{ $dsn->matkul }}</td>
                            <td>
                                <a href="/dosen/show/{{ $dsn->id }}" class="btn btn-sm btn-success">Detail</a>
                                <a href="/dosen/edit/{{ $dsn->id }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $dsn->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- /.modal -->
                @foreach($dosen as $dsn)
                <div class="modal fade" id="delete{{ $dsn->id }}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ $dsn->nama_dosen }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Hapus data {{ $dsn->nama_dosen }} ?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="" class="btn btn-outline" data-dismiss="modal">Close</button>
                                    <a href="/dosen/destroy/{{ $dsn->id }}" class="btn btn-outline">Yes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection