<?php
  /*
     AdminUserController  -  show all Posts
  */

  use App\User;
?>
@extends('layouts.admin')

@section('content')

<?php   $users =  User::find(1);
    print_r($users->name);

?>
<h1>Posts  <a href="/admin/posts/create"><button class="btn btn-basic btn-sm">Add New</button></a></h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            @if (session('status'))
                <div class="alert alert-danger">
                    <h3>{{ session('status') }}</h3>
                 </div>
            @endif
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Status</th>
                                <th>Created at</th>
                               
             
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)
                            <tr class="odd gradeX">
                                <td>{{$post->id}}</td>
                                <td><a href="/admin/posts/{{$post->id}}/edit">{{$post->title}}</a></td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->status}}</td>
                                <td>{{$post->created_at}}</td>
                          

                            </tr>
                        @endforeach    
                     </table>
               </div>
           </div>
       </div>
    </div>
</div>
@endsection('content')

@section('scripts')
<script>
$(document).ready(function() {
        $('#dataTables-example').DataTable({
         responsive: true
      });
    });
</script>

@endsection('scripts')