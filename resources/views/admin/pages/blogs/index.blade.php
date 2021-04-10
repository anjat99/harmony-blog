@extends('layouts.admin')

@section('title') HarmonyBlog | List Of Blogs @endsection
@section('description')  @endsection
@section('keywords')  admin panel, dashboard, blogs @endsection

@section('content')

<div class="row col-sm-12 col-lg-9 bg-light ml-2" id="content-admin">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">All Blogs</h4>
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
                <div class="table-responsive"  >
                    <table class="table__centered table table-striped table-responsive" border="1">
                        <thead class="thead-dark">
                            <tr>
                                <th>RB</th>
                                <th>User</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Quote/Note</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>STATE</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr class="py-1">
                                <td> {{ $post->id }}</td>
                                <td> {{ $post->user->firstname }}  {{ $post->user->lastname }} ({{ $post->user->email }})</td>
                                <td class="text-center">
                                    <img width="150" height="100" src="{{ asset('/storage/assets/img/post/'.$post->image->path) }}" alt="{{ $post->title }}" />
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->quote == null ? "no quote/note" : $post->quote}}</td>
                                <td class="text-center">
                                    @php
                                        if(strlen($post->description)<=50){
                                            echo $post->description;
                                        }else{
                                            $post->description=substr($post->description,0,50) . '...';
                                                echo $post->description;
                                        }

                                    @endphp

                                </td >
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    @php
                                        if($post->published == 0){
                                            echo "STILL WAITING";
                                        }else{
                                            echo "PUBLISHED";
                                        }

                                    @endphp
                                </td>
                                <td>
                                    <a href='{{ route('blogs-manage.show', $post->id ) }}' data-id=" {{ $post->id }}" class='btnAdmin btn-primary obrisi'><i class="fas fa-info-circle"></i></a>
                                    <form method="POST" action="{{ route("blogs-manage.destroy",$post->id) }}">
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

                <div class="d-flex justify-content-end mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
