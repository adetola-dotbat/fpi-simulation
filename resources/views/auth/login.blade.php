    @extends('layouts.app')
    @section('content')
        <div class="wrapper">

            <!--start content-->
            <main class="authentication-content">
                <div class="container-fluid">
                    <div class="authentication-card">
                        <div class="">
                            <div class="row g-0 d-flex justify-content-center">

                                <div class="col-lg-6">
                                    <div class="card-body p-4 p-sm-5">
                                        <h5 class="card-title">Sign In</h5>
                                        <p class="card-text">See your growth and get consulting
                                            support!</p>
                                        <form class="form-body" action="{{ route('login') }}" method="post">
                                            @csrf
                                            @method('post')
                                            @if (Session::has('success'))
                                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                            @endif
                                            @if (Session::has('fail'))
                                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                            @endif
                                            <div class="login-separater text-center mb-4"> <span>
                                                    SIGN IN WITH EMAIL AND PASSWORD</span>
                                                <hr>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email
                                                        Address</label>
                                                    <div class="ms-auto position-relative">
                                                        <div
                                                            class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                            <i class="bibi-envelope-fill"></i>
                                                        </div>
                                                        <input type="email" name="email" class="form-control radius-30"
                                                            id="inputEmailAddress" placeholder="Email Address">
                                                        @if ($errors->has('email'))
                                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Enter
                                                        Password</label>
                                                    <div class="ms-auto position-relative">
                                                        <div
                                                            class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                            <i class="bibi-lock-fill"></i>
                                                        </div>
                                                        <input type="password" name="password"
                                                            class="form-control radius-30" id="inputChoosePassword"
                                                            placeholder="Enter Password">
                                                        @if ($errors->has('password'))
                                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary radius-30">
                                                            SignIn</button>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mb-0">Don't have an account yet?
                                                        <a href="{{ route('register') }}">Sign Up here</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!--end page main-->

        </div>

        </div>
        {{-- @include('home.pages.footer-script') --}}
    @endsection
