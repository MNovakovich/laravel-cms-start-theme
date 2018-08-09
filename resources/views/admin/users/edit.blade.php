<?php
/*
AdminUserController@edit  - edit user
 */
?>
@extends('layouts.admin')


@section('content')
<div class="row">
   <h2>User: {{$user->name}} </h2><h5>USER ID: {{$user->id}}</h5>
</div>
<div class="row">
@include('errors.form_errors')
<form method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
   <div class="col-sm-3">
        <img style="width:100%;" src=" {{ $user->avatar ? asset('img/'.$user->avatar) : 'http://www.placehold.it/400x400'}}">
        <input type="file" class="form-control" name="avatar" id="avatar" >
   </div>
   <hr>
   <div class="col-sm-6 ">
        <div class="form-group">
                <div class="form-group">
                     <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                     <label for="title">email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{$user->email}}">
                </div>
                <div class="row">
                   <div class="form-group col-xs-4">
                      <label for="title">Role:</label>
                            @foreach($roles as $role)
                            <div class="lass="checkbox"">
                            <label><input type="checkbox" name="role_id[]" value="{{$role->id}}" {{$user->hasRole($role->name)? 'checked' :''}}> {{$role->name}}</label>
                            </div>
                            @endforeach
                   </div>
                </div><!--row-->
                <div class="form-group">
                     <label for="status">Status:&nbsp;&nbsp;</label>

                    @if($user->status == 1)
                    <input  type="radio" name="status" value="1" checked="checked">Active &nbsp; &nbsp;
                    <input  type="radio" name="status" value="0">Deactive
                    @else
                    <input  type="radio" name="status" value="1">&nbsp;Active &nbsp; &nbsp;
                    <input  type="radio" name="status" value="0"  checked="checked">&nbsp;Deactive&nbsp;
                    @endif
                    <hr>
                </div>
                <div class="row">
                <div class="form-group col-xs-3">
                     <label for="status">Super Admin:&nbsp;&nbsp;</label>
                     @if($user->is_admin)

                    <input  type="checkbox" name="is_admin" value="1" checked="checked">
                    @else
                    <input  type="checkbox" name="is_admin" value="1">
                    @endif

                </div>
                <div class="form-group col-xs-5">
                     <label for="password">New Password:</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="password" value="">
                </div>

                </div>
                <hr>
               
        </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
                {{ method_field('PATCH') }}
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-success col-md-4">Edit</button>

            </form>
            <form method="post" action="/admin/users/{{ $user->id }}">
                     {{ method_field('DELETE') }}
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <button type="submit" class="btn btn-danger col-sm-4 ">Delete</button>
            </form>
            </div><!-- col-md-9-->
    </div>
</div><!--row glavni-->

@endsection('content')