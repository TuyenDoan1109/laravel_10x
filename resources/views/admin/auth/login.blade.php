<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.layouts.components.meta')

    <!-- Title Page-->
    <title>Admin | Login</title>

    @include('admin.layouts.components.css')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset('backend/images/icon/logo.png') }}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('admin.auth.login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">Email Address</label>
                                    <input value="{{ old('email') }}" class="au-input au-input--full" type="text" name="email" placeholder="Email...">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">* {{ $errors->first('email') }}</span>
                                @endif
        
                                <div class="form-group">
                                    <label class="font-weight-bold">Password</label>
                                    <input value="{{ old('password') }}" class="au-input au-input--full" type="password" name="password" placeholder="Password...">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">* {{ $errors->first('password') }}</span>
                                @endif
        
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    @include('admin.layouts.components.js')
  
  </body>

</html>
<!-- end document-->