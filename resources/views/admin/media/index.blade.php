<?php
  /*
     AdminUserController@create  -  enter new user 
  */
?>
@extends('layouts.admin')


@section('content')
<div class="container">
<h2>Media</h2>

    <div class="row">
        <div class="col-md-10">
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Author </th>
        <th>Created at</th>
      </tr>
    </thead>
    <tbody id="myTable">
      @foreach($medias as $media)
      <tr>
      <td><img style="height:75px" src="{{ URL::to('/') }}/img/{{$media->file}}"></td>
                            
        <td>{{$media->user->name}}</td>
        <td>{{$media->created_at}}</td>
      </tr>

      @endforeach
     
    </tbody>
  </table>
       </div><!--col-md-10-->
       <div class="col-md-1"></div>
    </div><!--row-->
</div><!-- container-->
  @endsection('content')
  @section('scripts')

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  @endsection('scripts')
  