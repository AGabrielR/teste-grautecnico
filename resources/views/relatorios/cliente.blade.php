@extends('layouts.app')

@section('content')

{{var_dump($qtdClienteCat)}}

<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Perfil</th>
                <th>Categoria</th>
                @guest @else
                    @if (auth()->user()->profile === 'ADMINISTRADOR')
                        <th></th>
                        <th></th>
                    @endif
                @endguest
            </tr>
        </thead>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->profile}}</td>
                <td>{{$cliente->categoriaNome}}</td>
                @guest @else
                    @if (auth()->user()->profile === 'ADMINISTRADOR')
                        <td></td>
                        <td>
                            <form action="{{route('deleteCliente', $cliente->id)}}" method="POST" @method('delete')>
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" value="{{$cliente->id}}">
                                <button class="btn btn-outline-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                        </td>
                    @endif
                @endguest
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