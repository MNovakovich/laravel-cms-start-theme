<?php
  /*
     AdminUserController  -  Add New Post
  */
?>
@extends('layouts.admin')


@section('content')
<h1>Add new Post</h1>
<div class="row">
   <div class="col-md-8">
   <form method="POST" action="/admin/posts" enctype="multipart/form-data">
   <button type="submit" class="btn btn-default pull-right">Submit</button><br>

  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
     <textarea class="form-control ckeditor" name="body"></textarea>
  </div>
  {{ csrf_field()}}
  
   </div><!--md 7-->
   <div class="col-md-4">
    @include('admin.partials.widgets.post-create-wdg')
      
    

   </div><!--md-4-->
</div><!--row-->
</form><!-- main form for entern new post-->


@endsection('content')