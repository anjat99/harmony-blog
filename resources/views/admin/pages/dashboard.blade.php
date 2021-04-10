@extends('layouts.admin')

@section('title') HarmonyBlog | Dashboard @endsection
@section('description')  @endsection
@section('keywords')  admin panel, dashboard @endsection

@section('content')

<div class="row col-12 col-lg-9 bg-light ml-2" id="content-admin">
    <div class="row">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex  flex-wrap">
                <div class="ml-auto">
                    <h2 class="ml-auto">Welcome back,
                        Anja Tomic <i class="fas fa-smile"></i>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid row mt-2 mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>Recent 5 Non-published Blogs</h4>
                    <a href="{{ route('blogs-manage.index') }}" class="btn">View all</a>
                    <div class="table-responsive"  >
                        <table class="table__centered table table-striped table-responsive">
                            <thead class="thead-dark">
                            <tr>
                                <th>User</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>CREATED_AT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $post)
                            <tr class="rem1 py-1">
                                <td> {{ $post->user->firstname }}  {{ $post->user->lastname }} ({{ $post->user->email }})</td>
                                <td class="text-center">
                                    <img width="150" height="150" src="{{ asset('/storage/assets/img/post/'.$post->image->path) }}" alt="{{ $post->title }}" />
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->created_at }}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid row mt-2 mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>5 Recent Registered Users </h4>
                    <a href="{{ route('users.index') }}" class="btn">View all</a>
                    <div class="table-responsive"  >
                        <table class="table__centered table table-striped table-responsive">
                            <thead class="thead-dark">
                            <tr>
                                <th>FULL NAME</th>
                                <th>Email</th>
                                <th>DATE OF REGISTERED</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr class=" py-1">
                                <td class="text-center">
                                    {{ $user->firstname ." ".$user->lastname }}
                                </td>
                                <td class="text-center">
                                    {{ $user->email }}
                                </td>
                                <td class="text-center">
                                    {{ $user->created_at }}
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
