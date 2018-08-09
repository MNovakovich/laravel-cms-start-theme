<?php
  /*
     AdminUserController  -  show all users
  */
?>

@extends('layouts.admin')


@section('content')
<div class="row">
   <h1>Users</h1>
</div>
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
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th>Created at</th> 
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{$user->id}}</td>
                            @if($user->avatar)
                                <td><img style="height:75px" src="{{asset('img/'.$user->avatar)}}"></td>
                            @else
                               <td><img style="height:75px" src="http://via.placeholder.com/75x80"></td>
                            @endif
                            @if(auth()->user()->roles[0]->name == 'administrator')
                                <td><a href="/admin/users/{{$user->id}}/edit">{{$user->name}}</a></td>
                            @elseif(auth()->user()->roles[0]->name == 'editor')
                                <td>{{$user->name}}</td>
                            @endif
                                <td>{{$user->email}}</td>

                            

                                <td class="center">
                                @foreach($user->roles as $role)
                                   {{$role->name}}<br>
                                @endforeach
                                </td>
                            
                               
                                <td class="center">{{$user->status ==1? 'Active':'Deactive'}}</td>
                                <td class="center">{{$user->created_at->diffForHumans()}}</td>
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