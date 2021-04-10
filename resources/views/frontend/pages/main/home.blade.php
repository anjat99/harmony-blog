@extends('layouts.template')

@section('title') Home @endsection
@section('description')  @endsection
@section('keywords') blog, posts @endsection

{{--@dd($posts)--}}
@section('content')

<!-- #region SLIDER -->
@include('frontend.partials.slider')
<!-- #endregion SLIDER -->


    <main class="container-fluid content d-flex justify-content-around mb-3 mt-5">
        <section class="content__blogs col-sm-12 col-md-9 d-flex flex-wrap justify-content-between mb-4" id="blogs">

        </section>

        <div class="content__sidebar col-sm-12 col-md-3 ">
            <div class="content__sidebar__section">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <h3>{{session('success') }}</h3>
                    </div>
                @endif
            </div>
            <div class="content__sidebar__section search">

                <form class="form-inline content__sidebar__searchform">
                    <h2 class="section-title">Search</h2>
                    <input type="text" id="keyword" name="keyword" class="text-input form-control content__sidebar__searchform__input" placeholder="Search...">

                    <div class="d-flex flex-column topics">
                        <h2 class="section-title">Topics</h2>
                        <div class="form-check d-flex flex-column align-items-baseline">
                            @foreach($categories as $category)
                                <div class="d-flex justify-content-center">
                                    <input type="checkbox" name="categories[]" class="form-check-input categories" id="{{ $category->id }}" value="{{ $category->id }}">
                                    <label for="{{ $category->id }}">{{ $category->name }}</label>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </form>
            </div>
        </div>
</main>
@endsection
@section('javascript')
    <script src="{{ asset('assets/js/slider.js') }}"></script>
@endsection
