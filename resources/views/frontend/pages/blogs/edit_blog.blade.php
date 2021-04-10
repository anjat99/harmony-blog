@extends('layouts.template')

@section('title') Edit blog I wrote  @endsection
@section('description')  @endsection
@section('keywords') blog, posts @endsection


@section('content')

<main class="container-fluid blogs__content d-flex flex-column align-items-center justify-content-center col-sm-12 p-0 mt-2 ">
    <form action="{{ route('blogs.update', $post->id) }}" method="POST" class="register__form col-12 " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row d-flex flex-column justify-content-center align-items-center">
                <div class=" mb-3 d-flex justify-content-center mb-5">
                    <h2 class="login__form__title mb-3 initialism">Edit blog</h2>
                </div>

                <div class="col-sm-10 d-flex flex-column ">
                  <p class="text-black font-weight-bold">TITLE</p>
                  <input type="text" id="tbTitle" name="title" data-field="firstname" class="register__form__firstname form-control adminForm" value="{{ $post->title }}">
                  <p class="text-danger err"></p>
                </div>
                <div class="col-sm-10 d-flex flex-column ">
                    <p class="text-black font-weight-bold">QUOTE/NOTE</p>
                    <input type="text" id="tbQuote" name="quote" data-field="firstname" class="register__form__firstname form-control adminForm" value="{{ $post->quote }}">
                    <p class="text-danger err"></p>
                </div>
                <div class="col-sm-10 form-group purple-border mt-2">
                  <p class="text-black font-weight-bold">DESCRIPTION</p>
                  <textarea class="form-control adminForm" name="description"  id="taDescriptionUpdate" wrap="hard">{{ $post->description }}</textarea>
                </div>
                <div class="col-sm-10 mt-3 d-flex justify-content-between">
                    <div class="col-sm-5">
                        <p class="text-black font-weight-bold">IMAGE</p>
                        <input type="file"  class="form-control adminForm" name="image"  id="image">
                    </div>
                    <div class="form-group col-sm-5 mb-2 mt-2">
                        <p class="text-black font-weight-bold">CATEGORY</p>
                        <select class="form-control adminFormWhite" id="ddlCategoryAdd" name="category">
                            <option value="0" selected disabled>Choose category:</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}"  {{ $c->id == $post->category_id ? "selected" : "" }}>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="mt-5 mb-5 d-flex  justify-content-center align-items-center">
                  <button id="btnSaveUpdate" name="btnSaveUpdate" type="submit" class="register__form__button btn btn-dark mr-2">SAVE</button>
                    <a id="btnSaveUpdate" name="btnBackUpdate" href="{{ route('blogs.index') }}" class="register__form__button btn btn-dark">Back to list</a>
              </div>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('warningUpdatePost'))
        <div class="alert alert-warning">
            <h3>{{ session('warningUpdatePost') }}</h3>
        </div>
    @endif
    @if (session()->has('errorUpdatePost'))
        <div class="alert alert-danger">
            <h3>{{ session('errorUpdatePost') }}</h3>
        </div>
    @endif
</main>

@endsection
