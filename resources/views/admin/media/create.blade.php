<?php
  /*
     AdminUserController  -  Add New Post
  */
?>
@extends('layouts.admin')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css">


@endsection('styles')
@section('content')
<h1>Upload Media</h1>
<div class="row">
   <div class="col-md-8">
   <form action="{{ url('/admin/media')}}" class="dropzone" id="my-awesome-dropzone">{{ csrf_field()}}</form>

            <!--{{ csrf_field()}}-->
   
   </div><!--md 7-->

   
@endsection('content')

@section('scripts')
 <!-- UPLOAD IMAGE-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection('scripts')