@extends('templates.layout')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormAbsensi">
                <i class="fas fa-plus"></i> Tambah Nama karyawan
            </button>

            <a href="{{ route('export-absensi') }}" class="btn btn-success">
                <i class="fa fa-file-excel"></i> Export
            </a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formImport">
                <i class="fa fa-file-excel"></i> Import
            </button>
            <a href="{{ route('absensi-pdf')}}" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
            @include('absensi.data')
        </div>
    </div>
</section>
@endsection

@include('absensi.form')
@include('absensi.edit')

@push('script')
<script>
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })

    $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-danger').slideUp(500)
    })

    $(function() {
        // dialog hapus data
        $('.delete-data').on('click', function(e) {
            const nama = $(this).closest('tr').find('td:eq(1)').text();
            // console.log('nama')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${nama}</b> akan di hapus?`,
                confirmButtonText: 'Ya',
                denyButtonText: 'Tidak',
                'showDenyButton': true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        $('#modalEdit').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget)
            let id = $(button).data('id')
            let nama_karyawan = $(button).data('nama_karyawan')
            let tanggal_masuk = $(button).data('tanggal_masuk')
            let waktu_masuk = $(button).data('waktu_masuk')
            let status = $(button).data('status')
            let waktu_selesaikerja = $(button).data('waktu_selesaikerja')

            $(this).find('#nama_karyawan').val(nama_karyawan)
            $(this).find('#tanggal_masuk').val(tanggal_masuk)
            $(this).find('#waktu_masuk').val(waktu_masuk)
            $(this).find('#status').val(status)
            $(this).find('#waktu_selesaikerja').val(waktu_selesaikerja)

            $('.form-edit').attr('action', `/absensi/${id}`)
        })
    })
</script>
@endpush