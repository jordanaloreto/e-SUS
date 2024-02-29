@extends('dashboard.corpo')

@section('title', 'Pacientes')

@section('content')

    <br>
    <div class="container">
        <div class="text-end">
            <a type="button" class="btn btn-primary" href="{{route('cadastroPaciente')}}">Cadastrar</a>
        </div>
        <br>
        <div class="row">
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="table-responsive text-nowrap">
                    <table id="pacientes_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#pacientes_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('createPaciente') }}",
                columns: [
                    { data: 'nomePaciente', name: 'nomePaciente' },
                    { data: 'cpfPaciente', name: 'cpfPaciente' },
                    { data: 'acao', name: 'acao', orderable: false, searchable: false }
                ]
            });
        });

    </script>



@endsection



