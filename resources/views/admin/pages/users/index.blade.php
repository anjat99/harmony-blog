@extends('layouts.admin')

@section('title') HarmonyBlog | List Of Users @endsection
@section('description')  @endsection
@section('keywords')  admin panel, dashboard, users @endsection

{{--{{ dd($users) }}--}}
@section('content')
<div class="row col-sm-12 col-lg-9 bg-light ml-2" id="content-admin">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Users</h4>
                    <div class="table-responsive"  >
                        <table class="table__centered table table-striped table-responsive" border="1">
                            <thead class="thead-dark">
                            <tr>
                                <th>RB</th>
                                <th>BASIC INFO</th>
                                <th>ROLE</th>
                                <th>NO.PUBLISHED BLOGS</th>
                                <th>NO. WAITING BLOGS</th>
                                <th>DATE OF REGISTRATION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $u)
                            <tr class="py-1">
                                <td class="text-center">
                                    {{ $u->id }}
                                </td>
                                <td class="text-center">
                                    <div class="table__wrapper__user">
                                        <div class="table__wrapper__meta">
                                            <h3> {{ $u->firstname ." ".$u->lastname }}</h3>
                                            <span>{{ $u->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $u->role->name }}</td>
                                <td class="text-center">
                                    @php

                                    $published = array_filter($u->posts->toArray(),function ($v){
                                                                            return $v['published'] == 1;
                                                                        });
                                    @endphp
                                    <i class="fas fa-comments"></i> {{ count($published)}}
                                </td>
                                <td class="text-center">
                                    @php

                                        $nonPublished = array_filter($u->posts->toArray(),function ($v){
                                                                                return $v['published'] == 0;
                                                                            });
                                    @endphp
                                    <i class="far fa-comments"></i> {{ count($nonPublished) }}
                                </td>
                                <td>{{ $u->created_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
