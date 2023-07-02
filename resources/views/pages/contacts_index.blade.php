@extends('layouts.app', ['activePage' => 'inbox', 'titlePage' => __('Boite de réception')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header card-header-primary justify-content-between">
                            <h4 class="card-title ">Boite de réception</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead class="text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Nom & Prénom
                                        </th>
                                        <th>
                                            Sujét
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Message
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
    
    <script type="text/javascript">
        window.addEventListener('load', function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('contact') }}",
                language: {
                    "search": "Recherche:",
                    "zeroRecords": "Pas de résultats"
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'from_user',
                        name: 'from_user'
                    },

                    {
                        data: 'subject',
                        name: 'subject'
                    },

                    {
                        data: 'email',
                        name: 'email'
                    },
                    
                    {
                        data: 'message',
                        name: 'message'
                    },
                ]
            });
        });
       
    </script>
@endsection
