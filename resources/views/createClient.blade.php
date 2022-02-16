@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Cliente') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('registerClient')}}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="clienteNome">Nome do Cliente</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="clienteNome" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="">Categoria</label>
                                <div class="col-md-6">
                                    <select name="category_id" id="" class="form-select" required>  
                                        <option selected disabled>Escolha uma Categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->categoriaNome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="profile" class="col-md-4 col-form-label text-md-end">Perfil</label>
                                <div class="col-md-6">
                                    <select name="profile" id="profile" class = "form-select" required>
                                        <option selected disabled>Escolha um perfil de usuário</option>
                                        <option value="OPERADOR">Operador</option>
                                        <option value="VISUALIZADOR">Visualizador</option>
                                        <option value="ADMINISTRADOR">Administrador</option>
                                    </select>
                                </div>
                            </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Criar
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