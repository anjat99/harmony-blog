@extends('layouts.template')

@section('title') Single post @endsection
@section('description') See more info about this post. @endsection
@section('keywords') blog, posts @endsection
@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<?php include $_SERVER['DOCUMENT_ROOT']."/assets/helper/functions.php"?>

{{--{{ dd($blog) }}--}}
@section('content')

    <main class="container-fluid section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post__details d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center post__image">
                            <img class="img-fluid" src="{{ asset('/storage/assets/img/post/'.$post->image->path) }}" alt="">
                        </div>
                        <div class="d-flex justify-content-center">
                            <h1>{{ $post->title }}</h1>
                        </div>
                        <div class="user_details">
                            <div class="float-left">
                                <a href="#">{{ $post->category->name }}</a>
                            </div>
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{ $post->user->firstname }} {{ $post->user->lastname }}</h5>
                                       Last updated @php
                                        if($post->updated_at == null){
                                            $publishedDate = $post->published_at;
                                            $newFormat = date('d M, Y', strtotime($publishedDate));
                                            echo $newFormat;
                                        }else{
                                            $updatedDate = $post->updated_at;
                                            $newFormat = date('d M, Y', strtotime($updatedDate));
                                            echo $newFormat;
                                        }


                                        @endphp
                                    </div>
                                    <div class="d-flex">
                                        <i class="fas fa-user-circle user__icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{{ splitText($post->description,8,$post->quote) }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('home') }}" class="btn btn-outline-info ml-5"><i class="fa fa-arrow-left"></i>  Back to list of blogs</a>
                        </div>
                        <div class="d-flex">
                            @if($previous !== null)
                            <a href="{{route("blog",["id"=>$previous])}}" class="btn btn-outline-primary mr-2" ><i class="fa fa-arrow-left"></i>PREVIOUS POST </a>
                            @endif
                            @if($next !== null)
                            <a href="{{route("blog",["id"=>$next])}}" class="btn btn-outline-primary">NEXT POST <i class="fa fa-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>





@endsection



