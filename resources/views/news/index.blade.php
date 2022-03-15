@extends('layouts.app')

@section('content')
<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin:5px;
    }
</style>

<body>
    <div class="container mt-5">
      <header class="blog-header py-3">
        <div class="row d-flex flex-row">
            <div class="col-3"><input id="search" type="text" class="form-control" placeholder="Cari berita..."></div>
            <div class="col-9 text-end"><a class="btn btn-sm btn-outline-secondary" href="/dashboard/">Masuk</a></div>
        </div>
      </header>
    </div>

    <main class="container">
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
      </div>

      <div class="row">
        <div class="col-9">
            <div class="row mb-2">
                @foreach ($data as $item)
                <div class="col-md-12 search" id="news">
                  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                      <img src="{{asset('News_Images/'.$item->image)}}" alt="Thumbnail" class="bd-placeholder-img" style="height: 250px; width:200px;">
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                      <strong class="d-inline-block mb-2 text-primary">World</strong>
                      <h3 class="mb-0">{{$item -> title}}</h3>
                      <div class="mb-1 text-muted">{{$item -> created_at}}</div>
                      <p class="card-text mb-auto index">{{$item -> content}}</p>
                      <a href="/news/detail/{{$item -> id}}" class="stretched-link">Continue reading</a>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
            {{ $data->links() }}
        </div>

        <div class="col-3">
            <div class="position-sticky" style="top: 2rem;">
              <div class="p-4 mb-3 bg-light rounded">
                <h4 class="fst-italic">About</h4>
                <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
              </div>

              <div class="p-4">
                <h4 class="fst-italic">Archives</h4>
                <ol class="list-unstyled mb-0">
                  <li><a href="#">March 2021</a></li>
                  <li><a href="#">February 2021</a></li>
                  <li><a href="#">January 2021</a></li>
                  <li><a href="#">December 2020</a></li>
                  <li><a href="#">November 2020</a></li>
                  <li><a href="#">October 2020</a></li>
                  <li><a href="#">September 2020</a></li>
                  <li><a href="#">August 2020</a></li>
                  <li><a href="#">July 2020</a></li>
                  <li><a href="#">June 2020</a></li>
                  <li><a href="#">May 2020</a></li>
                  <li><a href="#">April 2020</a></li>
                </ol>
              </div>

              <div class="p-4">
                <h4 class="fst-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                  <li><a href="#">GitHub</a></li>
                  <li><a href="#">Twitter</a></li>
                  <li><a href="#">Facebook</a></li>
                </ol>
              </div>
            </div>
        </div>
      </div>

    </main>
    </body>
@endsection
