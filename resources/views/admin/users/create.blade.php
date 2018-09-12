<?php
  /*
     AdminUserController@create  -  enter new user 
  */
?>
@extends('layouts.admin')


@section('content')
<div class="row">
   <h1>Enter new user:</h1>
</div>
<div class="row">
   <div class="col-sm-10 ">
       @include('errors.form_errors') 
        <div class="form-group">
           <form method="POST" action="/admin/users" enctype="multipart/form-data">
                <div class="form-group">
                     <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="name" value="">
                </div>
                <div class="form-group">
                     <label for="title">email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" value="">
                </div>
                <div class="form-group">
                     <label for="title">avathar:</label>
                    <input type="file" class="form-control" name="avatar" id="avatar">
                </div>
                <div class="form-group">
                     <label for="title">Role:</label>
                     <select class="form-control" id="sel1" name="role_id">
                          <option>Choose role</option>
                            @foreach($roles as $role)
                             <option value="{{$role->id}}"> {{$role->name}}</option>
                            @endforeach
                     </select>
                </div>
                <div class="form-group">
                     <label for="status">Status:&nbsp;&nbsp;</label>
                    
                    <input  type="radio" name="status" value="1">Active &nbsp; &nbsp;
                    <input  type="radio" name="status" value="2">Deactive
                    <hr>
                </div>
                <div class="form-group">
                     <label for="status">Super Admin:&nbsp;&nbsp;</label>
                    <input  type="checkbox" name="is_admin" value="1">
                   
                    <hr>
                </div>
                <div class="form-group">
                     <label for="password">Password:</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="password" value="">
                </div>
                <div class="form-group">
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')