@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="">
        @csrf
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end" for="">Categoria</label>
                <div class="col-md-3">
                    <input type="text" name="categoriaNome" id="" class="form-control">
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
@endsection