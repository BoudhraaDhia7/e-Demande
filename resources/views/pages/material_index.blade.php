@extends('layouts.app', ['activePage' => 'material_table', 'titlePage' => __('Liste du matériels')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('common.alerts')
                    @include('common.buttons',['btn' => 'add'])
                    <div class="card mt-3">
                        <div class="card-header card-header-primary justify-content-between">
                            <h4 class="card-title ">Liste des Utilisateurs </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead class="text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Actions
                                        </th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal create new admin -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter matériel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-material') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Libelle</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="name"/>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('material') }}",
                language: {
                    "search": "Recherche:",
                    "zeroRecords": "Pas de résultats"
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

    </script>


@endsection
