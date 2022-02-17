@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Cliente') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('updateCliente', $cliente->id)}}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="clienteNome">Nome do Cliente</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="clienteNome" class="form-control" value="{{$cliente->name}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="">Categoria</label>
                                <div class="col-md-6">
                                    <select name="categoria_id" class="form-select" required>  
                                        <option disabled>Escolha uma Categoria</option>
                                        @foreach ($categories as $category)
                                            @if($cliente->categoria_id == $category->id)
                                                <option value="{{$category->id}}" selected>{{$category->categoriaNome}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->categoriaNome}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="profile" class="col-md-4 col-form-label text-md-end">Perfil</label>
                                <div class="col-md-6">
                                    <select name="profile" id="profile" class = "form-select" required>
                                        <option disabled>Escolha um perfil de usuário</option>
                                        <option value="OPERADOR">Operador</option>
                                        <option value="VISUALIZADOR">Visualizador</option>
                                        <option value="ADMINISTRADOR" selected>Administrador</option>
                                    </select>
                                </div>
                            </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-warning">
                                            Alterar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection