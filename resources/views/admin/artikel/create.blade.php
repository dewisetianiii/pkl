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
    })
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Data Artikel</div>
                <div class="card-body">
                    <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

    <div class="form-group">
        <label for="">Judul</label>
        <input class="form-control" type="text" name="judul">
    </div>
    <div class="form-group">
        <label>Konten</label>
        <textarea id="editorl" rows="8" cols="30" type="text" name="konten"></textarea>
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label for="">Tag</label>
        <select name="tag[]" id="select2" class="form-control multiple" multiple>
    @foreach($tag as $data)
        <option value="{{ $data->id }}">
            {{ $data->nama_tag }}
        </option>
    @endforeach
        </select>
        </div>
    <div class="form-group">
        <label for="">Kategori</label>
        <select name="kategori" class="form-control">
    @foreach($kategori as $data)
        <option value="{{ $data->id }}">
            {{ $data->nama_kategori }}
        </option>
    @endforeach
        </select>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('artikel') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
                                @endsection
