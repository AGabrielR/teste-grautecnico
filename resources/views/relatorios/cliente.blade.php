@extends('layouts.app')

@section('content')

{{var_dump($qtdClienteCat)}}
{{var_dump($clientes)}}


<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Perfil</th>
                <th>Categoria</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach ($clientes as $cliente):
            <tr>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->profile}}</td>
                <td>{{$cliente->categoriaNome}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </table>

    <div class="row">
        <div class="col-md-5">
            <p>"Gráfico ficará aqui: "</p>
            
        </div>
    </div>
</div>

@endsection