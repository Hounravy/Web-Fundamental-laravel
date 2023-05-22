@extends('system-test.bar')
@section('title')
category
@endsection
@section('content')
<div class="container my-5">
  <div class="row">
    <div class="d-flex justify-content-between mb-2">
      <h3>Tag List</h3>
      <a class="btn btn-success" href="{{'category/create'}}" role="button"
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
              <th>Category</th>
              <th style="width: 100px">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$category->name}}</td>
              <td class="d-flex">
                <a
                  class="btn btn-primary p-1 mx-2"
                  href="{{ Route('system-test.category.update', ['id'=> $category->id])}}"
                  role="button"
                  >Edit</a
                >
                <form method="POST" action="{{ Route('system-test.category.destroy', ['id'=> $category->id])}}">
                  @method('DELETE')
                  @csrf
                  <button
                  class="btn btn-danger p-1 mx-2"
                  type="submit"
                  role="button"
                  >Delete</button
                >
                </form>
              </td>
            </tr>
            @endforeach


          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
    <!-- Footer-->



    @endsection
