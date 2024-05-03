<div class="mt-4">
    <table class="table table-striped rounded overflow-hidden" id="myTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>nama_karyawan</th>
                <th>tanggal_masuk</th>
                <th>waktu_masuk</th>
                <th>status</th>
                <th>waktu_selesaikerja</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensi as $index => $s)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $s->nama_karyawan }}</td>
                <td>{{ $s->tanggal_masuk}}</td>
                <td>{{ $s->waktu_masuk}}</td>
                <td>{{ $s->status}}</td>
                <td>{{ $s->waktu_selesaikerja }}</td>
                <td>
                    <button type="button" class="btn btn-success btn-size" data-bs-toggle="modal" data-bs-target="#modalEdit" data-mode="edit" data-id="{{ $s->id }}" data-nama_karyawan="{{ $s->nama_karyawan }}" data-tanggal_masuk="{{ $s->tanggal_masuk }}" data-waktu_masuk="{{ $s->waktu_masuk }}" data-status="{{ $s->status }}" data-waktu_selesaikerja="{{ $s->waktu_selesaikerja }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('absensi.destroy', $s->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data btn-size" data-id="{{ $s->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
