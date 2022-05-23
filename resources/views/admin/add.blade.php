@extends('layouts.admin-app')

@section('content')

<div class="container-fluid p-0">
    <div class="card">
        <div class="card-body">
            <div class="card-header fs-3 fw-bolder">Tambah Berita</div>
            <div class="card-body">
                <form action="/dashboard/add/store" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" name="title" id="judul" class="form-control" placeholder="Judul.." required\>
                        <label for="judul">Judul..</label>
                        @if($errors->has('title'))
                        <div class="text-danger">
                            {{ $errors->first('title')}}
                        </div>
                    @endif
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="content" id="content" class="form-control" cols="30" rows="10"  placeholder="Konten.." required\></textarea>
                        <label for="content">Konten..</label>
                        @if($errors->has('content'))
                        <div class="text-danger">
                            {{ $errors->first('conten')}}
                        </div>
                    @endif
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail & Gambar</label>
                        <input type="file" name="image" id="formFile" class="form-control" accept="image/*" required\>
                        @if($errors->has('image'))
                        <div class="text-danger">
                            {{ $errors->first('image')}}
                        </div>
                    @endif
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="heading" value="1" role="switch" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Jadikan Heading?</label>
                    </div>
                <button type="submit" class="btn btn-large btn-success">Tambahkan Berita</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
