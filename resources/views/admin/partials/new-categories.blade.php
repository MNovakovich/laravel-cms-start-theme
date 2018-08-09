
<div class="row">
    <div clas="col-sm-10 col-sm-offset-1">
        <form method="POST" action="/admin/categories">
       
            <div class="form-group">
                <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" >
            </div>
  
            <div class="form-group">
           
            {{ csrf_field() }}  
                <button type="submit" class="btn btn-primary">new category</button>
            </div>
        </form>   
    </div>
</div>


