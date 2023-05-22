<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"S
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    {{-- <script>
        $(document).ready(function(){
    //   $("#vi").click(function(){
    //     $(this).hide();
    //   });
        if(sessionStorage.getItem('#vi')!=='true')
        {

            $('#vi').modal('show');
            $('#vi')=$ravy==1;

        }
        sessionStorage.setItem('#vi','true');
    });


    </script> --}}

  </head>
  <body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Blog Name</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Category 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Category 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Category 3</a>
            </li>
            @if (auth()->check())
            <li class="nav-item">
              <form method="POST" action="{{Route('logout')}}">
                @csrf
                <button class=" nav-link bg-dark text-white active" type="submit" role="button">Logout</button>
              
              </form>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Manage
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="{{url('admin/category')}}"
                    >category</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="{{url('admin/tag')}}">Tag</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="{{url('admin/post')}}"
                    >Post</a
                  >
                </li>
              </ul>
            </li>
          </ul>
            @else
              <li class="nav-item">
              <a class="nav-link text-info active" href="{{Route('system-test.login')}}">Login</a>
            </li>
            
            @endif
            
            
        </div>
      </div>
    </nav>
    <section>


          <!-- The Modal -->
          <div class="modal" id="vi">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  Modal body..
                </div>

    </section>

    <!-- Page content-->

@yield('content')



 <!-- Footer-->
 <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">
        Copyright &copy; Laravel9 My Test 2023
      </p>
    </div>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="js/javascript.js"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</body>
</html>
