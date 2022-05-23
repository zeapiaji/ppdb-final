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
        <div class="row">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">
                    {{$heading -> title}}
                </h1>
                <p class="lead content-heading" style="white-space: pre-line;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id nunc eget tortor ultricies aliquam. Fusce ac quam sit amet urna congue ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec quis volutpat nunc. Nulla libero nulla, blandit quis lobortis vel, semper vel lorem. Duis tempor elit velit. In dolor eros, consectetur at libero in, pellentesque bibendum massa. Proin aliquet gravida faucibus. Phasellus lacinia pharetra mattis. Ut in augue urna. Vivamus gravida elit ut tristique porta. Mauris fermentum pellentesque ultricies. Ut elementum erat pharetra, lobortis elit non, eleifend ante. Nunc diam justo, rutrum ut rutrum quis, consectetur eu sapien.

                    Aliquam molestie dui et augue lacinia, ac dictum erat ultrices. Aliquam fringilla ultricies felis ac semper. Sed a nibh mauris. Duis tristique ac nulla vitae luctus. Pellentesque fringilla felis id lobortis tempus. Aliquam egestas vitae nisl et venenatis. In ut tincidunt sem. Morbi blandit diam sed ante cursus rhoncus. Aenean in volutpat arcu, quis varius ligula. Maecenas vulputate pulvinar erat et convallis. Suspendisse gravida risus purus, vitae porttitor sapien bibendum eget. Quisque ut mi quis sapien vestibulum sagittis vitae non elit. Sed et laoreet orci, nec pretium magna. Vestibulum a mauris ante. Quisque ut turpis quis leo imperdiet laoreet.

                    Sed eu ultrices quam. Nunc dui dui, scelerisque vitae quam eu, elementum interdum nibh. Curabitur pulvinar luctus augue, eget faucibus ante faucibus a. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec scelerisque a felis sit amet ultrices. Quisque feugiat ornare massa auctor imperdiet. Duis vel varius magna, eu malesuada elit. Fusce tempor nisl et urna finibus, ut sodales enim dapibus. Donec eget purus mattis, vestibulum augue sed, pharetra leo. Praesent sed semper elit. Vestibulum eu tortor sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;

                    Morbi in velit ac nibh congue sollicitudin. Fusce blandit nunc urna, vel porttitor mi scelerisque eu. Curabitur eu lacinia tortor. Mauris placerat viverra laoreet. Quisque rhoncus lobortis dui quis aliquet. Vestibulum cursus diam nec ipsum tincidunt condimentum et at risus. Aliquam tempus metus a arcu dapibus elementum sit amet quis ligula. Nam cursus, libero vel vehicula efficitur, nulla turpis rutrum libero, non sollicitudin dolor enim vel nibh.

                    Etiam vel mauris vel lorem egestas finibus. Duis posuere sed tortor at tincidunt. Vivamus dapibus quam eget pharetra semper. Aenean sit amet feugiat nibh. Donec rutrum placerat nunc id iaculis. Quisque id mollis enim, et interdum est. Maecenas quis tincidunt purus. Morbi pellentesque sagittis arcu at convallis. Cras arcu turpis, rutrum non vestibulum vitae, laoreet nec sapien. Pellentesque non libero molestie, cursus urna a, tincidunt sapien. Nulla quis urna magna. Integer in lorem magna. Phasellus condimentum sapien pulvinar, iaculis turpis et, varius dolor. Quisque eleifend fringilla arcu, eu gravida sem rutrum eget.</p>
                <p class="lead mb-0"><a href="/news/detail/{{$heading -> id}}" class="text-white fw-bold">Continue reading...</a></p>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <img src="{{asset('News_Images/'.$heading->image)}}" alt="Thumbnail"  width="392" height="390">
            </div>
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
                      <p class="card-text mb-auto heading-content">{{$item -> content}}</p>
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
