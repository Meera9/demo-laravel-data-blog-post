<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @yield('title')
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('web/css/index.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
</head>
<body>
    @include('web.header')
    <div class="container h-100">
        <div class="row my-5">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-header">
                        Menu
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{route('admin.categories.index')}}">
                                Categories
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.blogs.index')}}">
                                Blogs
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.posts.index')}}">
                                Posts
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="col-12">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('web.footer')
</body>
</html>
