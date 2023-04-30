@extends('layouts.app', ['activePage' => 'reclamation_table', 'titlePage' => __('Liste des Réclamations')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
           
                    <div class="card mt-3">
                        <div class="card-header card-header-primary justify-content-between">
                            <h4 class="card-title ">Liste des Réclamations </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead class="text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Numéro de téléphone
                                        </th>
                                        <th>
                                            Nom
                                        </th>
                                        <th>
                                            Prénom
                                        </th>
                                        <th>
                                            État
                                        </th>
                                        <th class="text-center ">
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
    <!-- Modal create new reclamation -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une réclamation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-reclamation') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">CIN</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="cin"/>
                        </div>

                        <div class="form-group">
                            <label for="">De</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="from_user"/>
                        </div>

                        <div class="form-group">
                            <label for="">À</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="to_user"/>
                        </div>

                        <div class="form-group">
                            <label for="">État</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="state"/>
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
                ajax: "{{ route('reclamations') }}",
                language: {
                    "search": "Recherche:",
                    "zeroRecords": "Pas de résultats"
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                   
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'lastname',
                        name: 'lastname'
                    },
                    {
                        data: 'state',
                        name: 'state'
                    },
                  
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]});
        });
    </script>
@endsection
