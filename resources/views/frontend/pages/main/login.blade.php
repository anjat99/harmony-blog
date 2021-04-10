@extends('layouts.template')

@section('title') Login  @endsection
@section('description')  @endsection
@section('keywords') blog, posts @endsection

@section('content')

    <main class="container-fluid login__content d-flex justify-content-center col-12 p-0">

        <div class="login__image d-flex justify-content-start">
            <img src="{{ asset('assets/images/bg___register.jpg') }}" class="img-fluid col-12 p-0 m-0 z-index-0 login__image__img border">


            <div class="position-absolute z-index-1 login__image__title d-flex flex-column text-center justify-content-center align-items-center">
                <h1>Welcome back,</h1>
                <p class="register__image__subtitle">Sign in to continue access pages</p>
                <div>
                    <i class="fas fa-arrow-circle-right login__image__arrow "></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-7 d-flex flex-column login__form">
            <form action="{{route('login.store')}}" method="POST" >
                @csrf
                <div class="row d-flex flex-column justify-content-center align-items-center">

                    <div class="d-flex justify-content-center mb-5 mt-3">
                        <h2 class="login__form__title mb-3 initialism">Sign in to <span class="login__form__title__logo">HarmonyBlog</span></h2>

                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <p class="text-black font-weight-bold">Email</p>
                        <input type="text" id="tbEmailLogin" name="email" data-field="email" class="login__form__email form-control">
                        <p class="text-danger msgErrorName"></p>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <p class="text-black font-weight-bold">Password</p>
                        <input type="password" data-field="password" id="tbPassLogin" name="password" class="login__form__password form-control"/>
                        <p class="text-danger msgErrorEmail"></p>

                    </div>
                    <div class=" mb-2 d-flex flex-column justify-content-center align-items-center">
                        <button id="btnLogin" name="btnLogin" type="submit" class="login__form__button btn btn-dark">Login</button>
                        <p class="mt-3"> Don't have account? <a href="{{ route('register.create') }}">Register</a> </p>
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
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <h3>{{ session('error') }}</h3>
                    </div>
                @endif
            </div>
        </div>

    </main>
@endsection
