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
        <h2 class="font-weight-bold"> DETAILS OF WRITTEN BLOGS   <i class="far fa-comments"></i> {{ count($u->posts) }} </h2>
    </div>

    @if(count($u->posts) == 0)
        <div>
            <h2 class="text-danger mt-2 mb-5 no-review">So far you have not written a single post</h2>
        </div>
    @else
            @if (session()->has('successInsertPost'))
                <div class="alert alert-success">
                    <h3>{{ session('successInsertPost') }}</h3>
                </div>
            @endif
            @if (session()->has('successUpdatePost'))
                <div class="alert alert-success">
                    <h3>{{ session('successUpdatePost') }}</h3>
                </div>
            @endif
            @if (session()->has('errorDeletePost'))
                <div class="alert alert-info">
                    <h3>{{ session('errorDeletePost') }}</h3>
                </div>
            @endif
            @if (session()->has('warningDeletePost'))
                <div class="alert alert-warning">
                    <h3>{{ session('warningDeletePost') }}</h3>
                </div>
            @endif
            @if (session()->has('successDeletePost'))
                <div class="alert alert-success">
                    <h3>{{ session('successDeletePost') }}</h3>
                </div>
            @endif
        <div class="table-responsive table__wrapper  p-5" >
            <table class="table tablesorter text-light mt-5 ">
                <thead class=" text-primary bg-dark">
                <tr>
                    <th class="text-center">
                        #ID
                    </th>
                    <th class="text-center">
                        IMAGE
                    </th>
                    <th class="text-center">
                        TITLE
                    </th>
                    <th class="text-center">
                        CATEGORY
                    </th>
                    <th class="text-center">
                        QUOTE/NOTE
                    </th>
                    <th class="text-center">
                        DESCRIPTION
                    </th>
                    <th class="text-center">
                        STATE
                    </th>
                    <th class="text-center">
                        ACTIONS
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($u->posts as $key => $post)
                    <tr>
                        <td class="text-center">
                            {{ $post->id }}
                        </td>
                        <td class="text-center">
                            <img width="80" height="80" src="{{ asset('/storage/assets/img/post/'.$post->image->path) }}" />
                        </td>
                        <td class="text-center">
                            {{ $post->title }}
                        </td >
                        <td class="text-center">
                            {{ $post->category->name }}
                        </td >
                        <td class="text-center">
                            {{ $post->quote == null ? "no quote/note" : $post->quote}}
                        </td >
                        <td class="text-center">
                            @php
                                if(strlen($post->description)<=50){
                                    echo $post->description;
                                }else{
                                    $post->description=substr($post->description,0,50) . '...';
                                        echo $post->description;
                                }

                            @endphp
                        </td>
                        <td class="text-center">
                            @php
                                if($post->published == 0){
                                    echo "STILL WAITING";
                                }else{
                                    echo "PUBLISHED";
                                }

                            @endphp
                        </td>
                        <td class="text-center">
                            <a href="{{ route('blogs.edit', $post->id ) }}"   data-id="{{ $post->id }}">
                                <i class="fas fa-edit adminIcons"></i>
                            </a>
                            <a href="{{ route('blogs.show', $post->id ) }}"   data-id="{{ $post->id }}"> <i class="fas fa-info-circle adminIcons"></i> </a>
                            <form method="POST" action="{{ route('blogs.destroy', $post->id ) }}">
                                @method("DELETE")
                                @csrf
                                <button class="btn"><i class="fas fa-trash-alt adminIcons"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</main>

@endsection
