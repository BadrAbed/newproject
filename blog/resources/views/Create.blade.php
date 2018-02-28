@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Add New Menus</div>
                <div class="panel-body">

{!! Form::open(array('route'=>'Menus.store','files'=>true))!!}
Title {!! Form::text('title',null,array('require','class'=>'form-control','placeholder'=>'Menu title'))!!}
type {!! Form::select('type',['Food'=>'Food','hotDrinks'=>'hotDrinks','coldDrinks'=>'coldDrinks'],null,array('require','class'=>'form-control','placeholder'=>'Menu type'))!!}
Desc {!! Form::textarea('desc',null,array('require','class'=>'form-control','placeholder'=>'Menu desc'))!!}
Status {!! Form::select('status',['Active'=>'active','Inactive'=>'Inactive'],null,array('require','class'=>'form-control','placeholder'=>'Menu status'))!!}
Image {!! Form::file('image',null,array('require','class'=>'form-control','placeholder'=>'Menu image'))!!}
 {!! Form::submit('Add',array('require','class'=>'btn btn-primary'))!!}

{!! Form::close()!!}
              </div>

<div class="panel-heading"> Menus</div>
<div class="panel-body">



</div>
@endsection
