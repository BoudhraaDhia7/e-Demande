@extends('layouts.app', ['activePage' => 'contacts', 'titlePage' => __('Mes Contacts')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('common.alerts')
                    @include('common.buttons',['btn' => 'list-all-contacts'])
                    <div class="card mt-3">
                        <div class="card-header card-header-primary justify-content-between">
                            <h4 class="card-title ">Liste des contacts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Nom
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Téléphone
                                        </th>
                                        <th class="text-center">
                                            Message
                                        </th>
                                        <th class="text-center">
                                            Vu !!
                                        </th>
                                    </thead>
                                    <tbody>
                                        @if (!empty($contact) && $contact->count())
                                            @foreach ($contact as $key => $value)
                                                <tr>
                                                    @if ($value->user_id === null)
                                                        <td>Visiteur</td>
                                                    @else
                                                        <td>Joueur #{{ $value->user_id }}</td>
                                                    @endif
                                                    @if ($value->status === 0)
                                                        <td class="text-center">
                                                            <div class="redDot" style="width: 20px;
                                                        height: 20px;
                                                        border-radius: 50%;
                                                        background-color: #640002;"> </div>
                                                        </td>
                                                    @else
                                                        <td class="text-center">
                                                            <div class="greenDot" style="width: 20px;
                                                        height: 20px;
                                                        border-radius: 50%;
                                                        background-color: #2fd635;"> </div>
                                                        </td>
                                                    @endif
                                                    <td>{{ $value->last_name }} {{ $value->first_name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->phone }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                                            data-id="{{ $value->message }}" data-toggle="modal"
                                                            data-target="#exampleModal" id="buttonMessage">
                                                            <i class="fas fa-envelope-open-text"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($value->status === 0)
                                                            <a href="{{ route('vu-contants', $value->id) }}" type="button"
                                                                class="btn btn-outline-success btn-sm">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10">
                                                    <div class="alert alert-danger" role="alert">
                                                        Pas de contact pour le moment
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {!! $contact->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Corps de message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="body"></p>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).on("click", "#buttonMessage", function() {
                var message = $(this).data('id');
                $('#body').text(message)
            });

        </script>
    @endpush

@endsection
