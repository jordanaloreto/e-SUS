@extends('dashboard.corpo')

@section('title', 'Enfermeiras')

@section('content')

    <br>
    <div class="container">
        <div class="text-end">
            <a type="button" class="btn btn-primary" href="{{route('cadastroEnfermeira')}}">Cadastrar</a>
        </div>
        <br>
        <div class="row">
            @if(Session::has('erroDelete'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('erroDelete') }}
            </div>
        @endif
        
        @if(Session::has('sucessoDelete'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('sucessoDelete') }}
            </div>
        @endif
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="table-responsive text-nowrap">
                    <table id="enfermeiras_table" class="table table-hover">
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
            $('#enfermeiras_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('createEnfermeira') }}",
                columns: [
                    { data: 'nomeEnfermeira', name: 'nomeEnfermeira' },
                    { data: 'cpfEnfermeira', name: 'cpfEnfermeira' },
                    { data: 'acao', name: 'acao', orderable: false, searchable: false }
                ]
            });
        });

        setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(element) {
            element.style.display = 'none';
        });
    }, 5000); // Oculta as mensagens após 5 segundos (5000 milissegundos)

    </script>



@endsection



