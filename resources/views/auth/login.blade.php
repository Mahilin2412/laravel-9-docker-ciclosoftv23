<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="FCDCEKIuIDRXOCo5GZ8f6CirvcmSLLLyK0KGPJUY">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="http://skote-v.laravel.themesbrand.com/assets/images/favicon.ico">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="http://skote-v.laravel.themesbrand.com/assets/libs/owl.carousel/owl.carousel.min.css">

    <!-- Bootstrap Css -->
    <link href="http://skote-v.laravel.themesbrand.com/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="http://skote-v.laravel.themesbrand.com/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="http://skote-v.laravel.themesbrand.com/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />



</head>


<body class="auth-body-bg">


<div>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xl-9">
                <div class="auth-full-bg pt-lg-5 p-4">
                    <div class="w-100">
                        <div class="bg-overlay"></div>
                        <div class="d-flex h-100 flex-column">

                            <div class="p-4 mt-auto">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="text-center">
                                            <h4 class="mb-3"><span
                                                    class="text-primary">Bicicletas Bogotá</span> | Encuentra tu estilo</h4>
                                            <div dir="ltr">
                                                <div class="owl-carousel owl-theme auth-review-carousel"
                                                     id="auth-review-carousel">
                                                    <div class="item">
                                                        <p class="font-size-16 mb-4">"Información"</p>
                                                    </div>

                                                    <div class="item">
                                                        <div class="py-3">
                                                            <p class="font-size-16 mb-4">" Aquí puede ir un lema de la empresa "</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5">
                                <a href="index" class="d-block auth-logo">
                                    <!-- AQUÍ VA EL LOGO DE LA EMPRESA O DE LA PAGINA -->
                                </a>
                            </div>
                            <div class="my-auto">

                                <div>
                                    <h1 class="text-primary">Bienvenido !</h1>
                                    <p class="text-muted">Inicia sesión para continuar</p>
                                </div>

                                <div class="mt-4">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-3">
                                            @if (session('status'))
                                                <div class="mb-4 font-medium text-sm text-green-600">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <label for="CodeUser" class="form-label">Correo</label>
                                            <input name="email" type="email"
                                                   class="form-control "
                                                   id="CodeUser"
                                                   value="{{ old('email') }}"
                                                   placeholder="Correo" autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contraseña</label>
                                            <div
                                                class="input-group auth-pass-inputgroup ">
                                                <input type="password" name="password"
                                                       class="form-control  "
                                                       id="userpassword" placeholder="Contraeña"
                                                       aria-label="password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Iniciar Sesion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0"> <script>
                                        document.write(new Date().getFullYear())

                                    </script> CicloSoft by Sena </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
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


<!-- JAVASCRIPT -->
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/libs/jquery/jquery.min.js"></script>
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/libs/metismenu/metismenu.min.js"></script>
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/libs/simplebar/simplebar.min.js"></script>
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/libs/node-waves/node-waves.min.js"></script>
<!-- owl.carousel js -->
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/libs/owl.carousel/owl.carousel.min.js"></script>
<!-- auth-2-carousel init -->
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/js/pages/auth-2-carousel.init.js"></script>

<!-- App js -->
<script src="http://skote-v-rtl.laravel.themesbrand.com/assets/js/app.min.js"></script>

</body>
</html>
