@extends('layouts.admin')

@section('title') HarmonyBlog | List Of Blogs @endsection
@section('description')  @endsection
@section('keywords')  admin panel, dashboard, blogs @endsection

@section('content')

    <div class="row col-sm-12 col-lg-9 bg-light ml-2" id="content-admin">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('errorPublished'))
                        <div class="alert alert-info">
                            <h3>{{ session('errorPublished') }}</h3>
                        </div>
                    @endif
                    @if (session()->has('successPublished'))
                        <div class="alert alert-success">
                            <h3>{{ session('successPublished') }}</h3>
                        </div>
                    @endif
                    <h4 class="card-title">Details</h4>
                    <div class="table-responsive table__wrapper"  >
                        <table class="table tablesorter main__table">
                            <tbody>
                                <tr>
                                    <td class="text-white head__table">USER</td>
                                    <td>
                                        <div class="main__table-text">{{ $post->user->firstname }}  {{ $post->user->lastname }} ({{ $post->user->email }})</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">TITLE</td>
                                    <td>
                                        <div class="main__table-text">{{ $post->title }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">COVER IMAGE</td>
                                    <td>
                                        <div class="main__table-text">
                                            <img width="100" height="100" src="{{ asset('/storage/assets/img/post/'.$post->image->path) }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">STATE</td>
                                    <td>
                                        <div class="main__table-text {{ $post->published == 0 ? "text-danger" : "text-success" }} main__table-text--green">
                                            {{ $post->published == 0 ? "STILL WAITING" : "PUBLISHED" }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">CATEGORY</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green">{{ $post->category->name }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white head__table">DESCRIPTION</td>
                                    <td>
                                        <div class="main__table-text main__table-text--green text-justify">{{ $post->description }}</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-white head__table" colspan="2">
                                        <div class="d-flex justify-content-center">
                                            @if($post->published == 0)
                                                <form method="POST" action="{{ route('approved_post', $post->id) }}" class="btn btn-dark mr-2">
                                                    @method("PUT")
                                                    @csrf
                                                    <button class="btn text-white"><i class="fa fa-check"></i>APPROVE </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('blogs-manage.index') }}" class="btn btn-dark ml-5"><i class="fa fa-arrow-left"></i>  Back to list of blogs</a>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
