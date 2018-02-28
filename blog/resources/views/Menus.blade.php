@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Add New Menus  <a href="Menus/create">
                  <button type="button" class="info btbtn btn-n-lg">
          <span class="glyphicon glyphicon-plus"></span> Plus
        </button>

                 </a>
                </div>
                <div class="panel-body">


<div class="panel-heading"> Menus</div>
<div class="panel-body">



<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>title</th>
    <th>type</th>
        <th>desc</th>
      <th>status</th>
          <th>image</th>
        <th>createBy</th>
      <th>Delete</th>
    <th>Edit</th>
    </tr>
  </thead>
  <tbody>

    @foreach($menus as $menus)
    <tr>
      <td>{{$menus->title}}</td>
      <td>{{$menus->type}}</td>
      <td>{{$menus->desc}}</td>
      <td>{{$menus->status}}</td>
      <td><img class="img-responsive MenuThumb" src="{{$menus->image}}">

      <td>{{$menus->User->name}}</td>
      <td>
        {!! Form::open(['method'=>'DELETE','route'=>['Menus.destroy',$menus->id]]) !!}
        {!! Form::submit('x',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
      </td>
      <td>

      <a href="Menus/{{$menus->id}}/edit"> <span class="glyphicon glyphicon-edit"> </span> </a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
