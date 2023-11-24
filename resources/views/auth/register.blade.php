<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Stellar Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <div class="brand-logo">
                                    <img src="../../images/logo.svg">
                                </div>
                                <h4>New here?</h4>
                                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                                <form class="pt-3" method="POST" action="{{ route('register') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="name"><h5>Name</h5></label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-lg" 
                                            id="name" 
                                            name="name" 
                                            :value="old('name')" 
                                            required autofocus autocomplete="name" 
                                            placeholder="Name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><h5>Email</h5></label>
                                        <input 
                                            id="email"
                                            type="email" 
                                            class="form-control form-control-lg" 
                                            name="email" 
                                            :value="old('email')" 
                                            required autocomplete="email" 
                                            placeholder="Email">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><h5>Password</h5></label>
                                        <input 
                                            id="password" 
                                            type="password" 
                                            class="form-control form-control-lg"
                                            name="password" 
                                            required autocomplete="new-password" 
                                            placeholder="Password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation"><h5>Confirm Password</h5></label>
                                        <input 
                                            id="password_confirmation" 
                                            type="password" 
                                            class="form-control form-control-lg"
                                            name="password_confirmation" 
                                            required autocomplete="new-password" 
                                            placeholder="Password">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/misc.js') }}"></script>
        <!-- endinject -->
    </body>
</html>