@extends('system-test.bar')

@section('title')
Home
@endsection

@push('index_page')
    <style>
      .img-post {
        width: 250px;
        
      }
      .text-post {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
                line-clamp: 2; 
        -webkit-box-orient: vertical;
      }
    </style>
@endpush


@section('content')


      <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
          <!-- Nested row for non-featured blog posts-->
          <div class="row">
            {{-- <div class="col-lg-12">
              <!-- Featured blog post-->
              <div class="card mb-4">
                <a href="./blog.html"
                  ><img
                    class="card-img-top"
                    src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                    alt="..."
                /></a>
                <div class="card-body">
                  <div class="small text-muted">January 1, 2022</div>
                  <h2 class="card-title">Featured Post Title</h2>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a
                    laboriosam. Dicta expedita corporis animi vero voluptate
                    voluptatibus possimus, veniam magni quis!
                  </p>
                  <a class="btn btn-primary" href="./blog.html">Read more →</a>
                </div>
              </div>
            </div> --}}
            {{-- <div class="col-lg-6">
              <!-- Blog post-->
              <div class="card mb-4">
                <a href="./blog.html"
                  ><img
                    class="card-img-top"
                    src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                    alt="..."
                /></a>
                <div class="card-body">
                  <div class="small text-muted">January 1, 2022</div>
                  <h2 class="card-title h4">Post Title</h2>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Reiciendis aliquid atque, nulla.
                  </p>
                  <a class="btn btn-primary" href="./blog.html">Read more →</a>
                </div>
              </div>
            </div> --}}
            @if ($posts->count())
              @foreach ($posts as $post)
              <div class="col-lg-6">
              <!-- Blog post-->
              <div class="card mb-4">
                <a href="./blog.html"
                  ><img
                   class="card-img-top img-post"
                    src="{{asset('storage/'.$post->thumnail)}}"
                    alt="..."
                /></a>
                <div class="card-body">
                  <div class="small text-muted">{{$post->created_at->format('F d, Y')}}</div>
                  <h2 class="card-title h4">{{$post->title}}</h2>
                  <p class="card-text text-post">
                    {{$post->content}}
                  </p>
                  <a class="btn btn-primary" href="{{Route('system-test.article', ['id'=>$post->id])}}">Read more →</a>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <h1>No Post Found!!</h1>
            @endif
            
            
          </div>
          <!-- Pagination-->
          {{-- <nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
                  >Newer</a
                >
              </li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#!">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#!">2</a></li>
              <li class="page-item"><a class="page-link" href="#!">3</a></li>
              <li class="page-item disabled">
                <a class="page-link" href="#!">...</a>
              </li>
              <li class="page-item"><a class="page-link" href="#!">15</a></li>
              <li class="page-item">
                <a class="page-link" href="#!">Older</a>
              </li>
            </ul>
          </nav> --}}
          {{ $posts->links() }}
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
          <!-- Search widget-->
          <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
              <form method="GET" action="{{Route('system-test.index')}}">
                @foreach (collect(request()->only(['category_id', 'tag_id'])) as $key=>$value)
                  <input
                  class=" form-control"
                  name="{{$key}}"
                  value="{{$value}}"
                  type="hidden">
                @endforeach
                <div class="input-group">
                <input
                  class="form-control"
                  type="text"
                  name="search"
                  placeholder="Enter search term..."
                  aria-label="Enter search term..."
                  aria-describedby="button-search"
                />
                <button
                  class="btn btn-primary"
                  id="button-search"
                  type="submit"
                >
                  Go!
                </button>
              </div>
              </form>
              
            </div>
          </div>
          <!-- Tags widget-->
          <div class="card mb-4">
            <div class="card-header">Tags</div>
            <div class="card-body">
              <div class="row">
                @foreach ($side_tage as $side_tages)
                  <div class="col-sm-6">
                  <ul class="list-unstyled mb-0">
                    <li><a href="{{Route('system-test.index', ['tag_id'=>$side_tages->id])}}">{{$side_tages->name}}</a></li>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
