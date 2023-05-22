@extends('system-test.bar')
@section('title')
Post
@endsection

@section('content')
    <div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Post List</h3>
          <a class="btn btn-success" href="{{'post/create'}}" role="button"
            >Create</a
          >
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <table
              id="datatable"
              class="table table-striped"
              style="width: 100%"
            >
              <thead>
                <tr>
                  <th>No</th>
                  <th>User email</th>
                  <th>Thumbnail</th> 
                  <th>Title</th>
                  <th>Category</th>
                  <th>Tag</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                   <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$post->user?->email}}</td>
                  <td><img src="{{asset('storage/'.$post->thumnail)}}" style="width: 50px" alt=""></td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->category->name}}</td>
                  <td>
                    <ul>
                    @foreach ($post->tags as $tag )
                      <li>{{$tag->name}}</li>
                    @endforeach
                    </ul>
                   
                  <td>
                    <a
                      class="btn btn-primary btn-sm"
                      href="{{Route('system-test.post.edit', ['id'=>$post->id])}}"
                      role="button"
                      >Edit</a
                    >
                  </td>
                </tr>
                @endforeach
               
                
                
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    @endsection
