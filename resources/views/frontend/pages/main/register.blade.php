@extends('layouts.template')

@section('title') Register  @endsection
@section('description')  @endsection
@section('keywords') blog, posts @endsection


@section('content')


    <main class="container-fluid register__content d-flex justify-content-center col-12 p-0">
        <div class="col-12 col-md-7 d-flex flex-column register__form">
            <form action="{{ route('register.store') }}"  method="POST" >
                @csrf
                <div class="row d-flex flex-column justify-content-center align-items-center mt-5">

                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <p class="text-black font-weight-bold">Firstname</p>
                        <input type="text" id="tbFirstname" name="firstname" data-field="firstname" class="register__form__firstname form-control">
                        <p class="text-danger err"></p>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <p class="text-black font-weight-bold">Lastname</p>
                        <input type="text" id="tbLastname" name="lastname" data-field="email" class="register__form__lastname form-control">
                        <p class="text-danger err"></p>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <p class="text-black font-weight-bold">Email</p>
                        <input type="text" id="tbEmailRegister" name="email" data-field="email" class="register__form__email form-control">
                        <p class="text-danger err"></p>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <p class="text-black font-weight-bold">Password</p>
                        <input type="password" data-field="password" id="tbPassRegister" name="password" class="register__form__password form-control"/>
                        <p class="text-danger err"></p>

                    </div>
                    <div class=" mb-2 d-flex flex-column justify-content-center align-items-center">
                        <button id="btnLogin" name="btnLogin" type="submit" class="register__form__button btn btn-dark">Register</button>
                        <p class="mt-3"> Already have an account? <a href="{{ route('login.create') }}">Login</a> </p>
                    </div>
                </div>
            </form>
            <div class="container d-flex justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <h3>{{session('success') }}</h3>
                    </div>
                @endif
                @if (session()->has('warning'))
                    <div class="alert alert-warning">
                        <h3>{{ session('warning') }}</h3>
                    </div>
                @endif
            </div>
        </div>


        <div class="register__image d-flex justify-content-end">
            <img src="{{ asset('assets/images/bg___register.jpg') }}" class="img-fluid col-12 p-0 m-0 z-index-0 register__image__img">

            <div class="position-absolute z-index-1 register__image__title d-flex flex-column text-center justify-content-center align-items-center">
                <h1 class="mb-5">Sign Up</h1>
                <p class="register__image__subtitle"><span class="register__form__title__logo">HarmonyBlog</span> is much better when you have an account</p>
                <p class="register__image__subtitle">Give yourself one</p>
                <div>
                    <i class="fas fa-arrow-circle-left register__image__arrow "></i>
                </div>
            </div>
        </div>
    </main>

@endsection
