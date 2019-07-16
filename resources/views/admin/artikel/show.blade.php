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
                <div class="card-header">Menampilkan Data Artikel</div>
                <div class="card-body">
    <div class="form-group">
        <label for="">Judul</label>
        <input class="form-control" value="{{ $artikel->judul }}" type="text" name="judul" disabled>
    </div>
    <div class="form-group">
        <label>Konten</label>
        <textarea id="editorl" rows="8" cols="30" type="text" name="konten" disabled>{{ $artikel->konten }}</textarea>
    </div>
    <div class="form-group">
        <label for="">Foto</label><br>
        <img src="{{ asset('assets/img/artikel/'.$artikel->foto) }}" alt="" height="250px" width="250px">
        <input type="file" class="form-control" name="foto" disabled>
    </div>
    <div class="form-group">
            <label for="">Tag</label>
            <select name="tag[]" id="select2" class="form-control multiple" multiple disabled>
                @foreach($tag as $data)
                    <option value="{{ $data->id }}"
                        {{ (in_array($data->id, $selected)) ?
                            'selected="selected"' : '' }}>
                            {{ $data->nama_tag }}
                    </option>
                @endforeach
            </select>
        </div>
    <div class="form-group">
        <label for="">Kategori</label>
        <select name="kategori_id" class="form-control" value="{{ $artikel->kategori }}" disabled>
            @foreach($kategori as $data)
                <option value="{{ $data->id }}"
                    {{ $artikel->kategori->id ==
                        $data->id ? 'selected="selected"' : '' }}>
                    {{ $data->nama_kategori }}
                </option>
            @endforeach
        </select>
        </div>
    <div class="form-group">
        <a href="{{ url('/admin/artikel') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </div>
            </div>
                </div>
                    </div>
                        </div>
                            @endsection
