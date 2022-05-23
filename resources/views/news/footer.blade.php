@extends('news.detail')

@section('footer')
<div class="col-4">
    <div class="position-sticky">
      <h4 class="fst-italic">Terpopuler</h4>
      @foreach ($all as $item)
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
        <h4 class="fst-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>

    </div>

  </div>
@endsection
