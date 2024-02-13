@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }
  tr:nth-child(odd) td{
    background-color: #FFFFFF;
  }
  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }
  button {
    padding: 10px 20px;
    background-color: #289ADC;
    border: none;
    color: white;
  }
</style>
@section('title', 'delete.blade.php')

@section('content')
<table>
    <tr>
      <th>id</th>
      <td>{{$autbor->id}}</td>
    </tr>
    <tr>
      <th>name</th>
      <td>{{$autbor->name}}</td>
    </tr>
    <tr>
      <th>age</th>
      <td>{{$autbor->age}}</td>
    </tr>
    <tr>
      <th>nationality</th>
      <td>{{$autbor->nationality}}</td>
    </tr>
    <tr>
      <th></th>
      <td>
        <form action="/delete?id={{$autbor->id}}" method="POST">
            @csrf
            <button>送信</button>
        </form>
    </td>
    </tr>
</table>

@endsection