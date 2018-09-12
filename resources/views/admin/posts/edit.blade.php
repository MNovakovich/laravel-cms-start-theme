<?php
  /*
     AdminUserController  -  Add New Post
  */
?>
@extends('layouts.admin')


@section('content')
<h1>Edit Post</h1>
<div class="row">
   <div class="col-md-8">
   <form method="post" action="/admin/posts/{{ $post->id }}">
                     {{ method_field('DELETE') }}
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <button  style="margin-left:30px;" type="submit" class="btn btn-danger pull-right">Delete</button>
     </form>
   <form method="POST" action="/admin/posts/{{$post->id}}">
   <button type="submit" class="btn btn-primary pull-right">Submit</button><br>
  <div class="form-group">
    <label for="title">Title:</label>
    <input style="font-size:20px" type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
     <textarea class="form-control ckeditor " name="body">{{$post->body}}</textarea>
  </div>
  <div class="form-group">
  <label for="title">Author:</label>
   <h>{{$post->user->name}}</h3>
   <input type="hidden" name="user_id" value="{{$post->user_id}}">
  </div>

   </div><!--md 7-->

   <div class="col-md-4">
         <div class="panel panel-default">
            <div class="panel-heading">Kategorije</div>
                <div class="panel-body">
                {{$post->category->name}}
            </div>
         </div><!-- panel-default-->
         @include('admin.partials.widgets.post-edit-wdg')

      </div>
   </div><!--md-4-->
</div><!--row-->

  {{ method_field('PATCH') }}
                {{ csrf_field()}}
  


</form><!-- main form for entern new post-->


@endsection('content')