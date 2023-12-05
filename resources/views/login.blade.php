<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{url('/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
        html,
        body {
            height: 100%;
        }
        
    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .error{
        color : red;
    }
    </style>
</head>
<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><img class="logo-img" src="{{url('/assets/images/logo.png')}}" alt="logo"></a><span class="splash-description">Entrer vos informations</span></div>
            <div class="card-body">
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="error">
                        @error("error")
                        {{$message}}
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="email" id="email" type="email" placeholder="Email" autocomplete="off">
                        <div class="error">
                            @error("email")
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Mot de passe">
                        <div class="error">
                            @error("password")
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Rester actif</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Se Connecter</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="{{url('/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>

</html>