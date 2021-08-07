<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css"/>


    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create your account!</h1>
                                </div>
                                <form method="post" class="user" action="{{ route('admin.register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Enter your name..." name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address..." name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Confirm Password"
                                               name="confirmpassword">
                                    </div>
                                    <div class="form-group">
                                        {{--                                        <div >--}}
                                        {{--                                            <input class="form-check-input" type="checkbox"  name="roles" value="">--}}

                                        {{--                                            <label class="custom-control-label" for="roleCheck">--}}
                                        {{--                                                sign in as user--}}
                                        {{--                                            </label>--}}
                                        {{--                                        </div>--}}

                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">Create</button>
                                    </a>
                                    <hr>
                                    {{--                                    <a href="index.html" class="btn btn-google btn-user btn-block">--}}
                                    {{--                                        <i class="fab fa-google fa-fw"></i> Login with Google--}}
                                    {{--                                    </a>--}}
                                </form>
                                <hr>
                                <a href="{{route('login')}}">My mistake! I already have an account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>

