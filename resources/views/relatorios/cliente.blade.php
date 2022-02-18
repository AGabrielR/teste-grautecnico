@extends('layouts.app')

@section('content')

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
                        <td>
                            <a href="{{route('editCliente', $cliente->id)}}" class="btn btn-outline-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('deleteCliente', $cliente->id)}}" method="post">
                                @csrf
                                @method('delete')
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

    <div class="row col-md-4 mt-1">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    
    let qtdClientesCat = {!! json_encode($qtdClienteCat->toArray()) !!};
    let categorias = {!! json_encode($categorias->toArray()) !!};

    let categoriaNome = [];

    for (let index = 0; index < categorias.length; index++) {
        categoriaNome.push(
            categorias[index].categoriaNome
        );
    }

    let qtdClientes = Array(categorias.length);
    
    for (let index = 0; index < qtdClientesCat.length; index++) {
        let idCat = qtdClientesCat[index].categoria_id;
        idCat--;
        qtdClientes[idCat] = qtdClientesCat[index].getqtd
    }
    
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: categoriaNome,
            datasets: [{
                label: categoriaNome,
                data: qtdClientes,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
   
@endsection