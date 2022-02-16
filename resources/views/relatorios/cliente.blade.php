@extends('layouts.app')

@section('content')

{{var_dump($clientes)}}

<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Perfil</th>
                <th>Categoria</th>
            </tr>
        </thead>
        @foreach ($clientes[0] as $cliente):
            <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->perfil}}</td>
                <td>{{$cliente->categoria}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </table>

    <div class="row">
        <div class="col-md-5">
            <p>"Gráfico ficará aqui: "</p>
            @foreach ($qtdClienteCat as $clienteCat):
                {{$clienteCat}}
            @endforeach
        </div>
    </div>
</div>

@endsection