@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Add New Items</div>
                <div class="panel-body">

{!! Form::open(array('route'=>'Items.store','files'=>true))!!}
Title {!! Form::text('title',null,array('require','class'=>'form-control','placeholder'=>'Item title'))!!}
Menu {!! Form::select('menu_id',$menus,null,array('require','class'=>'form-control','placeholder'=>'Item status'))!!}
Desc {!! Form::textarea('dsec',null,array('require','class'=>'form-control','placeholder'=>'Item desc'))!!}
Status {!! Form::select('status',['Active'=>'active','Inactive'=>'Inactive'],null,array('require','class'=>'form-control','placeholder'=>'Item status'))!!}
Image {!! Form::file('image',null,array('require','class'=>'form-control','placeholder'=>'Item image'))!!}
Price{!! Form::number('price',null,array('require','class'=>'form-control','placeholder'=>'Item Price'))!!}
 {!! Form::submit('Add',array('require','class'=>'btn btn-primary'))!!}

{!! Form::close()!!}
              </div>

<div class="panel-heading"> Items</div>
<div class="panel-body">



</div>
@endsection
