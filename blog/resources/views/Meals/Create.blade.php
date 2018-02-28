@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Add New Meals</div>
                <div class="panel-body">

{!! Form::open(array('route'=>'Meals.store','files'=>true))!!}
Title {!! Form::text('title',null,array('require','class'=>'form-control','placeholder'=>'Meal title'))!!}

Desc {!! Form::textarea('dsec',null,array('require','class'=>'form-control','placeholder'=>'Meal desc'))!!}
Status {!! Form::select('status',['Active'=>'active','Inactive'=>'Inactive'],null,array('require','class'=>'form-control','placeholder'=>'Meal status'))!!}
Image {!! Form::file('image',null,array('require','class'=>'form-control','placeholder'=>'Meal image'))!!}
Price{!! Form::number('price',null,array('require','class'=>'form-control','placeholder'=>'Meal Price'))!!}
@foreach($menus as $menu)
@if(count($menu->items) >0)
<h4> {{$menu->title}} </h4>
@endif
<ul>
@foreach($menu->items as $items)
<li>
<input type="checkbox" name="items[]" value="{{$items->id}}" > {{$items->title}}
discount: <input type="number" name="discount[{{$items->id}}]" value="">
</li>
@endforeach
</ul>


@endforeach

 {!! Form::submit('Add',array('require','class'=>'btn btn-primary'))!!}

{!! Form::close()!!}
              </div>

<div class="panel-heading"> Meals</div>
<div class="panel-body">



</div>
@endsection
