@extends('layouts.app')
@section('content')
<div class="container">    

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif
<a href="{{url('comida/create')}}" class="btn"> Registrar platillo</a>
<table class="table table-light" :>
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>nombre</th>
            <th>descripcion</th>
            <th>pais</th>
            <th>sabor</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $comidas as $comida) 
        <tr>
            <td>{{ $comida->id}}</td>
            <td>{{ $comida->nombre}}</td>
            <td>{{ $comida->descripcion}}</td>
            <td>{{ $comida->pais}}</td>
            <td>{{ $comida->sabor}}</td>
            <td>

            <a href="{{url('/comida/'.$comida->id.'/edit')}}">
                Editar
            </a>
        <form action="{{ url('/comida/'.$comida->id) }}" method="post">
        @csrf
        {{ method_field('DELETE')}}
        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="borrar">
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection