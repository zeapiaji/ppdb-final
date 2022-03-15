@extends('layouts.admin-app')

@section('content')

<div class="container-fluid p-0">
    <div class="card">
        <div class="card-body">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">Jumlah Berita : </div>
                    <div class="col-6">
                        <a href="/dashboard/add" class="btn btn-large btn-success">Tambah Berita</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Pengunjung</th>
                        <th>Tanggal Diupload</th>
                        <th>Opsi</th>
                    </tr>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item -> id}}</td>
                        <td><img src="{{asset('News_Images/'.$item->image)}}" style="width: 200px;" alt=""></td>
                        <td>{{$item -> title}}</td>
                        <td>{{$item -> content}}</td>
                        <td>{{$item -> visitors}}</td>
                        <td>{{$item -> created_at}}</td>
                        <td>
                        <a href="/dashboard/edit/{{$item->id}}" class="btn btn-info">Edit</a>
                        |
                        <a href="/dashboard/delete/{{$item->id}}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
