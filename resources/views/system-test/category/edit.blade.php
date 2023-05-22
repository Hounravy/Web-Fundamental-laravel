@extends('system-test.bar')

@section('title')

Category
@endsection

@section('content')

<!-- Page content-->
    <div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Create Category</h3>
          <a class="btn btn-success" href="{{url('category')}}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{route('system-test.category.update', ['id'=>$categories->id])}}">
                @csrf
                @method('PUT')
              <div class="mb-3">
                <label for="name" class="form-label">Tag</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$categories->name}}" />
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer-->
   @endsection
