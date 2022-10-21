<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="CodeUser" value="{{ __('Email') }}" />
                <x-jet-input id="CodeUser" class="block mt-1 w-full" type="text" name="CodeUser" :value="old('CodeUser')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Sistema </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="L9Nt3MjvDTwPdzJQzibziwf1YstmFI6o5vrHcOly">
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

                            </div>
                            <div class="my-auto">

                                <div>
                                    <h5 class="text-primary">Bienvenido!</h5>
                                    <p class="text-muted">Sistema Sena</p>
                                </div>

                                <div class="mt-4">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            @if (session('status'))
                                                <div class="mb-4">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <label for="username" class="form-label">Correo</label>
                                            <input name="email" type="email"
                                                   class="form-control "
                                                   placeholder="prueba@correo.com" id="username"
                                                   placeholder="Enter Email" autocomplete="email" autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                        {{ __('¿Olvidaste tu contraseña?') }}
                                                    </a>
                                                @endif
                                            </div>
                                            <label class="form-label">Contraseña</label>
                                            <div
                                                class="input-group auth-pass-inputgroup ">
                                                <input type="password" name="password"
                                                       class="form-control  "
                                                       id="userpassword" placeholder="contraseña"
                                                       aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember"
                                            >
                                            <label class="form-check-label" for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Iniciar sesión</button>
                                        </div>
                                    </form>
                                    <div class="mt-5 text-center">
                                        <p> ¿No tienes cuenta? <a href="{{route('register')}}"
                                                                  class="fw-medium text-primary"> registrate ahora </a> </p>
                                    </div>
                                </div>
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


<!-- JAVASCRIPT -->
<script src="http://skote-v.laravel.themesbrand.com/assets/libs/jquery/jquery.min.js"></script>
<script src="http://skote-v.laravel.themesbrand.com/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="http://skote-v.laravel.themesbrand.com/assets/libs/metismenu/metismenu.min.js"></script>
<script src="http://skote-v.laravel.themesbrand.com/assets/libs/simplebar/simplebar.min.js"></script>
<script src="http://skote-v.laravel.themesbrand.com/assets/libs/node-waves/node-waves.min.js"></script>
<script>
    $('#change-password').on('submit',function(event){
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "" + "/" + Id,
            type:"POST",
            data:{
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "L9Nt3MjvDTwPdzJQzibziwf1YstmFI6o5vrHcOly",
            },
            success:function(response){
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if(response.isSuccess == false){
                    $('#current_passwordError').text(response.Message);
                }else if(response.isSuccess == true){
                    setTimeout(function () {
                        window.location.href = "";
                    }, 1000);
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            }
        });
    });
</script>

<!-- owl.carousel js -->
<script src="http://skote-v.laravel.themesbrand.com/assets/libs/owl.carousel/owl.carousel.min.js"></script>
<!-- auth-2-carousel init -->
<script src="http://skote-v.laravel.themesbrand.com/assets/js/pages/auth-2-carousel.init.js"></script>

<!-- App js -->
<script src="http://skote-v.laravel.themesbrand.com/assets/js/app.min.js"></script>

</body>
</html>

