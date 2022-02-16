@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Categoria</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach ($categorias as $categoria):
            <tr>
                <td>{{$categoria->categoriaNome}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </table>
</div>

@endsection