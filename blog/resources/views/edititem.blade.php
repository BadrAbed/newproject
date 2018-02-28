@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Update Item:: {{$item->title}}</div>
                <div class="panel-body">

{!! Form::model($item,array('method'=>'PATCH','action'=>['ItemsController@update',$item->id],'files'=>true))!!}
Title {!! Form::text('title',null,array('require','class'=>'form-control','placeholder'=>'Item title'))!!}
type {!! Form::select('menu_id',$menus,null,array('require','class'=>'form-control','placeholder'=>'Item Menu'))!!}
Desc {!! Form::textarea('dsec',null,array('require','class'=>'form-control','placeholder'=>'Item desc'))!!}
Status {!! Form::select('status',['Active'=>'active','Inactive'=>'Inactive'],null,array('require','class'=>'form-control','placeholder'=>'Item status'))!!}
Image {!! Form::file('image',null,array('class'=>'form-control','placeholder'=>'Item image'))!!}
<img  src="{{asset($item->image)}}">
<div>  </div>
 <div> </div>
 <div class="panel-heading"> {!! Form::submit('Update',array('require','class'=>'btn btn-primary'))!!}</div>
 <div class="panel-body">
{!! Form::close()!!}
              </div>





</div>
@endsection
