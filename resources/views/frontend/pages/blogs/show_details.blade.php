@extends('layouts.template')

@section('title') All blogs I wrote  @endsection
@section('description')  @endsection
@section('keywords') blog, posts @endsection


@section('content')

    @php
        $u = session('user');
    @endphp


    <main class="container-fluid blogs__content d-flex flex-column justify-content-center col-12 pt-4 mt-5 align-items-center">
        <div class="mt-5">
            <h2 class="font-weight-bold"> DETAILS OF POST   <i class="far fa-comments"></i>  </h2>
        </div>
        <div class="table-responsive table__wrapper col-10"  >
            <table class="table tablesorter main__table">
                <tbody>
                    <tr>
                        <td class="text-white head__table">COVER IMAGE</td>
                        <td>
                            <div class="main__table-text">
                                <img width="100" height="100" src="{{ asset('/storage/assets/img/post/'.$post->image->path) }}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-white head__table">TITLE</td>
                        <td>
                            <div class="main__table-text">{{ $post->title }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-white head__table">QUOTE/NOTE</td>
                        <td>
                            <div class="main__table-text">{{ $post->quote == null ? "no quote/note" : $post->quote }}</div>
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
                                <a href="{{ route('blogs.index') }}" class="btn btn-dark ml-5"><i class="fa fa-arrow-left"></i>  Back to list of blogs</a>
                            </div>

                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </main>
@endsection
