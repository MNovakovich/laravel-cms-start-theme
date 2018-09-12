
<!-- PUBLISH WIDGET 
   ova opcija jos ne radi, trebao bih dodati kolonu u tabeli u kojoj proveravam stanje objavljenog clanka
 -->
<div class="panel panel-default">
    <a href="#publish" data-toggle="collapse">
    <div class="panel-heading">Status</div>
    <div id="publish" class="collapse in">
        <div class="panel-body">
            <a href="#visibility" class="btn btn-default" data-toggle="collapse">   <i class="fa fa-eye" aria-hidden="true"></i>  Status:</a>
            <div id="visibility" class="collapse in">

               @foreach($statuses as $key => $status)
             
                <div class="checkbox">
                    <label><input type="checkbox" name="status" value="{{$status}}">{{$status}}</label>
                </div>
               @endforeach
               
            </div><!-- #visibility
        </div><!-- panel-body-->
    </div><!-- #publish colapse-->
    </div>
  </a>
</div><!--panel default-->

<!-- CATEGORIES WIDGET -->
<div class="panel panel-info">
    <a href="#categories-collaps" data-toggle="collapse">  
    <div class="panel-heading">CATEGORIES</div></a>
    <div id="categories-collaps" class="collapse in">
        <div class="panel-body">
           
                @foreach($categories as $category)
                <div class="checkbox">
                    <label><input type="checkbox" name="category_id" value="{{$category->id}}">{{$category->name}}</label>
                </div>
                 @endforeach
          
        </div><!-- panel-body-->
    </div><!-- #publish colapse-->
  
</div><!--panel default-->

<!-- FEATURED IMAGE WIDGET -->
<div class="panel panel-info">
    <a href="#featured-img-collaps" data-toggle="collapse">  
    <div class="panel-heading">FEATURED IMAGE</div></a>
    <div id="featured-img   -collaps" class="collapse in">
        <div class="panel-body">
              
             <input type="file" name="featured_image">Upload image
        </div><!-- panel-body-->
    </div><!-- #publish colapse-->
</div><!--panel default-->