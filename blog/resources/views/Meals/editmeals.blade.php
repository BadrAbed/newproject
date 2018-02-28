@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Update Meal:: {{$meals->title}}</div>
                <div class="panel-body">

{!! Form::model($meals,array('method'=>'PATCH','action'=>['MealsController@update',$meals->id],'files'=>true))!!}
Title {!! Form::text('title',null,array('require','class'=>'form-control','placeholder'=>'Meal title'))!!}

Desc {!! Form::textarea('dsec',null,array('require','class'=>'form-control','placeholder'=>'Meal desc'))!!}
Status {!! Form::select('status',['Active'=>'active','Inactive'=>'Inactive'],null,array('require','class'=>'form-control','placeholder'=>'Meal status'))!!}
Price{!! Form::number('price',null,array('require','step'=>'any','class'=>'form-control','placeholder'=>'Meal Price'))!!}
Image {!! Form::file('image',null,array('class'=>'form-control','placeholder'=>'Meal image'))!!}


<img  src="{{asset($meals->image)}}">
<div>  </div>
 <div> </div>

 @foreach($menus as $menu)
 @if(count($menu->items) >0)
 <h4> {{$menu->title}} </h4>
 @endif
 <ul>
 @foreach($menu->items as $items)
 <li>

<input  @if(in_array($items->id,$mealitemsid))
checked
@endif
type="checkbox" name="items[]" value="{{$items->id}}">
{{$items->title}}
 <input

 type="number" name="discount[{{$items->id}}]" value="{{$meal[$items->id]}}"  placeholder="your discount">  @if(in_array($items->id,$mealitemsid))
current  discount is {{$meal[$items->id]}} %
 @endif
 </li>
 @endforeach
 </ul>


 @endforeach

 <div class="panel-heading"> {!! Form::submit('Update',array('require','class'=>'btn btn-primary'))!!}</div>
 <div class="panel-body">
{!! Form::close()!!}

              </div>





</div>
@endsection
