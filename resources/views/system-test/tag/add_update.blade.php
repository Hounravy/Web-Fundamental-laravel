@extends('system-test.bar')
@section('title')
tag
@endsection
@section('content')
    <!-- Page content-->
    <div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Create Tag</h3>
          <a class="btn btn-success" href="{{url('/admin/tag')}}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{url('admin/tag/store')}}">
                @csrf
              <div class="mb-3">
                <label for="tag" class="form-label">Tag</label>
                <input type="text" class="form-control" id="tag" name="name" />
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
