<!doctype html>
<html lang="">
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title></title>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5">
                <h3 class="mt-3 text-center">Register form</h3>
                <form method="POST" action="{{ route('admin.register.create') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your name</label>
                        <input type="text" class="form-control" id="name" required autofocus name="name"
                               value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback"
                                  role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               id="email" required name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback"
                                  role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               id="password" required name="password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback"
                                  role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control"
                               id="confirm" required name="password_confirmation">

                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
