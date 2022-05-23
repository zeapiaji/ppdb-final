@extends('layouts.app')

@section('content')
    <main class="container mt-5">
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8">
          <h2 class="fst-italic">
            {{$data -> title}}
          </h2>
          <p class="pb-4 mb-4 blog-post-meta border-bottom">{{$data -> created_at -> format('d/m/Y')}}, {{$data -> created_at -> format('h:i')}} WIB, Pengunjung {{$visitor -> count()}}</p>

          <article class="blog-post border-bottom mb-4">
            <img src="{{asset('News_Images/'.$data -> image)}}" class="img-fluid" style="width: 728px; height:400px;">
            <hr>
              <div class="container">
                  <div class="px-4">
                      <p style="white-space: pre-line;">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id nunc eget tortor ultricies aliquam. Fusce ac quam sit amet urna congue ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec quis volutpat nunc. Nulla libero nulla, blandit quis lobortis vel, semper vel lorem. Duis tempor elit velit. In dolor eros, consectetur at libero in, pellentesque bibendum massa. Proin aliquet gravida faucibus. Phasellus lacinia pharetra mattis. Ut in augue urna. Vivamus gravida elit ut tristique porta. Mauris fermentum pellentesque ultricies. Ut elementum erat pharetra, lobortis elit non, eleifend ante. Nunc diam justo, rutrum ut rutrum quis, consectetur eu sapien.

                          Aliquam molestie dui et augue lacinia, ac dictum erat ultrices. Aliquam fringilla ultricies felis ac semper. Sed a nibh mauris. Duis tristique ac nulla vitae luctus. Pellentesque fringilla felis id lobortis tempus. Aliquam egestas vitae nisl et venenatis. In ut tincidunt sem. Morbi blandit diam sed ante cursus rhoncus. Aenean in volutpat arcu, quis varius ligula. Maecenas vulputate pulvinar erat et convallis. Suspendisse gravida risus purus, vitae porttitor sapien bibendum eget. Quisque ut mi quis sapien vestibulum sagittis vitae non elit. Sed et laoreet orci, nec pretium magna. Vestibulum a mauris ante. Quisque ut turpis quis leo imperdiet laoreet.

                          Sed eu ultrices quam. Nunc dui dui, scelerisque vitae quam eu, elementum interdum nibh. Curabitur pulvinar luctus augue, eget faucibus ante faucibus a. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec scelerisque a felis sit amet ultrices. Quisque feugiat ornare massa auctor imperdiet. Duis vel varius magna, eu malesuada elit. Fusce tempor nisl et urna finibus, ut sodales enim dapibus. Donec eget purus mattis, vestibulum augue sed, pharetra leo. Praesent sed semper elit. Vestibulum eu tortor sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;

                          Morbi in velit ac nibh congue sollicitudin. Fusce blandit nunc urna, vel porttitor mi scelerisque eu. Curabitur eu lacinia tortor. Mauris placerat viverra laoreet. Quisque rhoncus lobortis dui quis aliquet. Vestibulum cursus diam nec ipsum tincidunt condimentum et at risus. Aliquam tempus metus a arcu dapibus elementum sit amet quis ligula. Nam cursus, libero vel vehicula efficitur, nulla turpis rutrum libero, non sollicitudin dolor enim vel nibh.

                          Etiam vel mauris vel lorem egestas finibus. Duis posuere sed tortor at tincidunt. Vivamus dapibus quam eget pharetra semper. Aenean sit amet feugiat nibh. Donec rutrum placerat nunc id iaculis. Quisque id mollis enim, et interdum est. Maecenas quis tincidunt purus. Morbi pellentesque sagittis arcu at convallis. Cras arcu turpis, rutrum non vestibulum vitae, laoreet nec sapien. Pellentesque non libero molestie, cursus urna a, tincidunt sapien. Nulla quis urna magna. Integer in lorem magna. Phasellus condimentum sapien pulvinar, iaculis turpis et, varius dolor. Quisque eleifend fringilla arcu, eu gravida sem rutrum eget.</p>
                  </div>
              </div>
          </article>

        </div>

        <div class="col-sm-12 col-md-4 col-lg-4">
          <div class="position-sticky">
            <h4 class="fst-italic">Terpopuler</h4>
            @foreach ($all_data as $item)
                <a href="/news/detail/{{$item->id}}">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <h1>{{$no++}}</h1>
                                </div>
                                <div class="col-10">
                                    <div class="h4">{{$item->title}}</div>
                                    <div class="fw-lighter">Dibaca {{$item->visitor->count()}} kali</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            <div class="p-4">
              <h4 class="fst-italic">Sosial Media Kami</h4>
              <ol class="list-unstyled">
                <li><a href="https://www.instagram.com/smkmahaputracerdasutama/">Instagram</a></li>
                <li><a href="https://www.facebook.com/SMK-Mahaputra-Cerdas-Utama-1670924676571186">Facebook</a></li>
              </ol>
            </div>

          </div>

        </div>
      </div>

    </main>

@endsection
