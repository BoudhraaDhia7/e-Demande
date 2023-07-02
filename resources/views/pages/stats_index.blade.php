@extends('layouts.app', ['activePage' => 'stats', 'titlePage' => __('Statistiques des réclamations')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header card-header-primary justify-content-between">
                            <h4 class="card-title ">Statistiques des réclamations </h4>
                            
                        </div>
                        <table class="table table-striped">
                            <thead style="font-size:20px">
                                <tr class="table-dark" >
                                <th scope="col"></th>
                                <th scope="col">Type réclamation</th>
                                <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-danger">
                                <th scope="row" ></th>
                                <td>En attente</td>
                                <td>{{$stats['en attente']}}</td>
                                </tr>
                                <tr class="table-info">
                                <th scope="row"></th>
                                <td>En cours</td>
                                <td>{{$stats['en cours']}}</td>
                                </tr>
                                <tr class="table-success">
                                <th scope="row"></th>
                                <td>Traité</td>
                                <td>{{$stats['traité']}}</td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
