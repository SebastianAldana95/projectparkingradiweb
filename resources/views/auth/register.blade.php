<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Register </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1">{{ config('app.name') }}</b>Admin</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Registrar Usuario</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input id="name"
                           name="name"
                           type="text"
                           placeholder="Nombre"
                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                </div>
                <div class="input-group mb-3">
                    <input id="email"
                           name="email"
                           type="email"
                           placeholder="Email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                </div>
                <div class="input-group mb-3">
                    <input id="document"
                           name="document"
                           type="number"
                           placeholder="Cedula"
                           class="form-control {{ $errors->has('document') ? 'is-invalid' : '' }}"
                           value="{{ old('document') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-passport"></span>
                        </div>
                    </div>
                    {!! $errors->first('document', '<span class="invalid-feedback">:message</span>') !!}
                </div>
                <div class="input-group mb-3">
                    <input id="password"
                           placeholder="Password"
                           type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm"
                           type="password"
                           class="form-control"
                           placeholder="Repetir Password"
                           name="password_confirmation"
                           required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">Iniciar Sesión</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>
</body>
</html>
