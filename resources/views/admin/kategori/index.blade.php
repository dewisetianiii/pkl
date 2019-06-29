@extends('adminbackend')
@section('css')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/select2.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/components/select2-init.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editorl');

    $(document).ready(function () {
        $('#select2').select2();
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Halaman Kategori</div>
                <br>
                <center><a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a></center>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th colspan="3" style="text-align: center;">Aksi</th>
                            </tr>
                @php $no =1; @endphp
                @foreach($kategori as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama_kategori }}</td>
                    <td>{{ $data->slug }}</td>
                    <td><a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ route('kategori.show', $data->id) }}" class="btn btn-success">Detail Data</a></td>
                    <td><form action="{{ route('kategori.destroy', $data->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn -sm btn-danger" type="submit">Hapus Data</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
