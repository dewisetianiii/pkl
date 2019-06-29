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
                <div class="card-header">Membuat Data Tag</div>
                <div class="card-body">
                    <form action="{{ route('tag.store') }}" method="post">
                        {{ csrf_field() }}

    <div class="form-group">
        <label for="">Tag</label>
        <input class="form-control" type="text" name="nama_tag">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('tag') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
                                @endsection
