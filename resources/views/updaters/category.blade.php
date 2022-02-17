@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Categoria') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('updateCategory')}}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="">Categoria</label>
                                <div class="col-md-3">
                                    <input type="text" name="categoriaNome" id="" class="form-control" value="{{$categoria->categoriaNome}}">
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