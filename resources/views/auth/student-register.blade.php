@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif


        <!-- Login & Register Start -->
        <div class="section section-padding">
            <div class="container">

                <!-- Login & Register Wrapper Start -->
                <div class="login-register-wrapper ">
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-6">

                            <!-- Login & Register Box Start -->
                            <div class="login-register-box">
                                {{-- <div class="single-form my-4">
                                    <small><a href="{{ url('admin') }}">Click to go back to admin dashboard</a>
                                    </small>
                                </div> --}}
                                <!-- Section Title Start -->
                                <div class="section-title">
                                    <h2 class="title">Register Student</h2>
                                </div>
                                <!-- Section Title End -->

                                @if (Session::has('error'))
                                    <p class="text-danger">{{ Session::get('error') }}</p>
                                @endif
                                <div class="login-register-form">

                                    <form action="{{ route('student.adxd') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="single-form">
                                            <input type="text" name="name" class="form-control" placeholder="name" />
                                            @if ($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="single-form">
                                            <input type="email" name="email" class="form-control" placeholder="Email" />
                                            @if ($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>

                                        <div class="single-form">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" />
                                            @if ($errors->has('password'))
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="single-form">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Password Confirmation" />
                                        </div>

                                        <div class="single-form">
                                            <button class="btn btn-primary btn-hover-heading-color w-100">Register</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <!-- Login & Register Box End -->

                        </div>
                    </div>
                </div>
                <!-- Login & Register Wrapper End -->

            </div>
        </div>
        <!-- Login & Register End -->

    </div>
    @include('home.pages.footer-script')
@endsection
