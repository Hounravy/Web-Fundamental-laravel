
 @extends('system-test.bar')

@section('title')
tag
@endsection

@section('content')

    <div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Tag List</h3>
          <a class="btn btn-success" href="{{'tag/create'}}" role="button"
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
                  <th>Tag</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($tags as $tag)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{$tag->name}}</td>
                  <td class="d-flex">
                    <a
                      class="btn btn-primary p-1 mx-2"
                      href="{{ Route('system-test.tag.update', ['id'=> $tag->id])}}"
                      role="button"
                      >Edit</a
                    >
                    <form method="POST" action="{{ Route('system-test.tag.destroy', ['id'=> $tag->id])}}">
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
   @endsection
