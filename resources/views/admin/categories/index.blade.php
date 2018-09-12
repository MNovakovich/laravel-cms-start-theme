@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
      <h2>Categories</h2>
      
    </div>
</div><!--row-->
<hr>
<div class="row">
   <div  id="new-cateogry" class="col-sm-4">
      @include('admin.partials.new-categories')
   </div><!--sm-5-->
   <div class="col-sm-6">
   <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>               
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                            <tr class="odd gradeX">
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{str_slug($category->name, '-')}}</td>
                                
                            </tr>
                        @endforeach    
                     </table>
               </div>
           </div>
       </div>
   </div><!--sm-7-->
</div><!--row-->

@endsection('content');

@section('scripts')

<script>
var slug = new Vue({
   el: '#new-cateogry',
     data: {
       slug: ''
     },


});

</script>


@section('scripts')
<script>
$(document).ready(function() {
        $('#dataTables-example').DataTable({
         responsive: true
      });
    });
</script>

@endsection('scripts')