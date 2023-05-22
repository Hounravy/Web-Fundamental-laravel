@extends('system-test.bar')
@section('title')
post
@endsection

@section('content')
 


    <div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Create Post</h3>
          <a class="btn btn-success" href="{{url('post')}}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{ Route('system-test.post.update', ['id'=>$posts->id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title"
                  value="{{$posts->title}}"
                />
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea
                  class="form-control"
                  id="content"
                  name="content"
                  rows="5"
                >{{$posts->content}}</textarea>
              </div>
              <div class="mb-3">
                <label for="thumbnail" class="form-label"
                  >Choose Thumbnail</label
                >
                <input
                  class="form-control"
                  type="file"
                  id="thumbnail"
                  name="thumbnail"
                />
              </div>
              <input
                  type="hidden"
                  class="form-control"
                  id="title"
                  name="cur_pic"
                  value="{{$posts->thumnail}}"
                />
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select
                  class="form-select"
                  name="category_id"
                  aria-label="Default select example"
                >
                  <option selected>Select Category</option>
                  @foreach ($categories as $category)

                     <option value="{{$category->id}}" {{$category->id === $posts->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                  @endforeach
                 
                  
                </select>
              </div>
              <div class="mb-3">
                <label for="tags" class="form-label">Tag</label>
                <div class="tag-wrapper">

                  @foreach ($tags as $tag )
                    <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="tags[]"
                      value="{{$tag->id}}"
                      id="tag{{$tag->id}}"
                      {{in_array($tag->id, $posts->tags()->pluck('id')->toArray()) ? 'checked' : ''}}
                    />
                    <label class="form-check-label" for="tag{{$tag->id}}">{{$tag->name}}</label>
                  </div>
                  @endforeach
                  
                 
                 
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      </div>
    </div>
    @endsection
