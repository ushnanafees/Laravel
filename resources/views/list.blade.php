@extends('layout')
@section('content')
<div>
<h1> List of Restaurants </h1>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('status')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $d)
    <tr>
      <th scope="row">{{$d->id}}</th>
      <td>{{$d->name}}</td>
      <td>{{$d->email}}</td>
      <td>{{$d->address}}</td>
      <td>
      <a href="delete/{{$d->id}}"><i class="fa fa-trash"></i></a>
      <a href="edit/{{$d->id}}"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@stop