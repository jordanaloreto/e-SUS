@extends('dashboard.corpo')

@section('title', 'Pacientes')

@section('content')

    <br>
    <div class="container">
        <div class="text-end">
            <a type="button" class="btn btn-primary" href="{{route('cadastroProntuario')}}">Gerar Escuta Inicial</a>
        </div>
        <br>
        <div class="row">
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="table-responsive text-nowrap">
                    <table id="escutaInicial_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#escutaInicial_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('createEscutaInicial') }}",
                columns: [
                    { data: 'nomePaciente', name: 'nomePaciente' },
                    { data: 'cpfPaciente', name: 'cpfPaciente' },
                ]
            });
        });

    </script>



@endsection



