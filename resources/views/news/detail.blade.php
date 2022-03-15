@extends('layouts.app')

@section('content')
    <main class="container mt-5">
      <div class="row g-5">
        <div class="col-md-8 border-bottom">
          <h2 class="fst-italic">
            {{$data -> title}}
          </h2>
          <p class="pb-4 mb-4 blog-post-meta border-bottom">{{$data -> created_at -> format('d/m/Y')}}, {{$data -> created_at -> format('h:i')}} WIB</p>

          <article class="blog-post">
            <img src="data:image/jpeg;base64,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" alt="" style="width: 728px">
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

        <div class="col-md-4">
          <div class="position-sticky">
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

@endsection
