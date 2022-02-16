@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <td>#</td>
                <th>Categoria</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->categoriaNome}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection