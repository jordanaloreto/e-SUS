@extends('dashboard.corpo')

@section('title', 'Prontuario')

@section('content')

    <br>
    <div class="container">
        <div class="text-end">
            <a type="button" class="btn btn-primary" href="{{route('cadastroProntuario')}}">Gerar Prontuário</a>
        </div>
        <br>
        <div class="row">
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="table-responsive text-nowrap">
                    <table id="escutaInicial_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Enfermeira</th>
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
                ajax: "{{ route('createProntuario') }}",
                columns: [
                    { data: 'pacienteSelecionado', name: 'pacienteSelecionado' },
                    { data: 'medicoSelecionado', name: 'medicoSelecionado' },
                    { data: 'enfermeiraSelecionado', name: 'enfermeiraSelecionado' },
                ]
            });
        });

    </script>



@endsection



