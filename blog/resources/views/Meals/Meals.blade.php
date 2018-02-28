@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Add New Meals  <a href="Meals/create">
                  <button type="button" class="info btbtn btn-n-lg">
          <span class="glyphicon glyphicon-plus"></span> Plus
        </button>

                 </a>
                </div>
                <div class="panel-body">


<div class="panel-heading"> Meals</div>
<div class="panel-body">



<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>title</th>
        <th>desc</th>
      <th>status</th>
          <th>image</th>
          <th>Price</th>

        <th>createBy</th>

      <th>Delete</th>
    <th>Edit</th>
    </tr>
  </thead>
  <tbody>

    @foreach($meals as $Meals)
    <tr>
      <td>{{$Meals->title}}</td>

      <td>{{$Meals->dsec}}</td>
      <td>{{$Meals->status}}</td>
      <td><img class="img-responsive MenuThumb" src="{{$Meals->image}}">
    <td>{{$Meals->price}}</td>


      <td>{{$Meals->user->name}}
      <td>
        {!! Form::open(['method'=>'DELETE','route'=>['Meals.destroy',$Meals->id]]) !!}
        {!! Form::submit('x',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
      </td>
      <td>

      <a href="Meals/{{$Meals->id}}/edit"> <span class="glyphicon glyphicon-edit"> </span> </a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
<div class="paginations col-lg-12" >
  {!! $meals->render() !!}
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
