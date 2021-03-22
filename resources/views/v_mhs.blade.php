@extends('layout.v_template')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Basic Datatable</h5>
            <a href="/mhs/create" class="btn btn-success btn-sm">Tambah Data</a>
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
                            <th>NIM</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php $no = 1; ?>
                        @foreach($mahasiswa as $mhs)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $mhs->nama_mhs }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>
                                <a href="/mhs/show/{{ $mhs->id }}" class="btn btn-sm btn-success">Detail</a>
                                <a href="/mhs/edit/{{ $mhs->id }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $mhs->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- /.modal -->
                @foreach ($mahasiswa as $mhs)
                <div class="modal fade" id="delete{{ $mhs->id }}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ $mhs->nama_mhs }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Hapus data {{ $mhs->nama_mhs }} ?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="" class="btn btn-outline" data-dismiss="modal">Close</button>
                                    <a href="/mhs/destroy/{{ $mhs->id }}" class="btn btn-outline">Yes</button>
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