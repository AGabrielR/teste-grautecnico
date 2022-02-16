@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Login</th>
                <th>Perfil</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach ($users as $user):
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->profile}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </table>
</div>

@endsection