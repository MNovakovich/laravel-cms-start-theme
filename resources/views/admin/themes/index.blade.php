@extends('layouts.admin')

@section('content')
<h2>Themes </h2>
<div class="row">
  @foreach($themes as $theme)
     <article class="col-md-3 col-sm-2 theme-item ">
         <img class="screenshot-img" src="{{asset('/img/empty.jpeg')}}" alt="">
         <div class="theme-id-container clearfix">
           <h4 class="theme-name pull-left"><span></span> {{$theme}}</h4>
           <button class="btn btn-default active-button pull-right">Active</button>
         </div>
     </article>
  @endforeach
  

</div>


@endsection('content');