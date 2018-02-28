@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Add New Items  <a href="Items/create">
                  <button type="button" class="info btbtn btn-n-lg">
          <span class="glyphicon glyphicon-plus"></span> Plus
        </button>

                 </a>
                </div>
                <div class="panel-body">


<div class="panel-heading"> Items</div>
<div class="panel-body">



<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>title</th>
        <th>desc</th>
      <th>status</th>
          <th>image</th>
          <th>Price</th>
          <th> Menu Name </th>
        <th>createBy</th>

      <th>Delete</th>
    <th>Edit</th>
    </tr>
  </thead>
  <tbody>

    @foreach($items as $Items)
    <tr>
      <td>{{$Items->title}}</td>

      <td>{{$Items->dsec}}</td>
      <td>{{$Items->status}}</td>
      <td><img class="img-responsive MenuThumb" src="{{$Items->image}}">
    <td>{{$Items->price}}</td>

      <td>{{$Items->menu->title}}</td>
      <td>{{$Items->User->name}}
      <td>
        {!! Form::open(['method'=>'DELETE','route'=>['Items.destroy',$Items->id]]) !!}
        {!! Form::submit('x',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
      </td>
      <td>

      <a href="Items/{{$Items->id}}/edit"> <span class="glyphicon glyphicon-edit"> </span> </a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
<div class="paginations col-lg-12" >
  {!! $items->render() !!}
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
