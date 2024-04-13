@extends('dashboard.corpo')

@section('title', 'Prontuario')

@section('content')

    <br>
    <div class="container">
        <div class="row">
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="table-responsive text-nowrap">
                    <table id="prontuario_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Enfermeira</th>
                                <th>Ações</th> <!-- Nova coluna para as ações -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#prontuario_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('listarHistorico') }}",
                columns: [
                    { data: 'pacienteSelecionado', name: 'pacienteSelecionado' },
                    { data: 'medicoSelecionado', name: 'medicoSelecionado' },
                    { data: 'enfermeiraSelecionado', name: 'enfermeiraSelecionado' },
                    {
                        data: null,
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            return '<a href="/prontuario/visualizarProntuario/' + data.id + '" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Visualizar</a>';
                        }
                    }
                ]
            });
        });

    </script>

@endsection
