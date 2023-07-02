@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Accueil')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon " >
                        <div class="card-icon" style="background-color: #006d75">
                            <i class="far fa-question-circle fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Mon compte</h3>
                        <ul>
                            <li><strong> Username :</strong> {{ $currentUser->username }}</li>
                       
                        </ul>
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 1)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon ">
                        <div class="card-icon" style="background-color: #006d75">
                            <i class="fas fa-mail-bulk fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Boite de reception</h3>
                        
                        <div class="mb-3">
                            <span>Consulter les messages pour le moment.</span>
                        </div>
                       
                        <div class="row justify-content-center">
                            <a href="/contacts">Voir messages</a>
                        </div>
                    
                    </div>
                </div>
            </div>
            @endif
        
        </div>
       
     
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
        $('#dateStart').datepicker();
        $('#dateEnd').datepicker();

        $('#search-stats').on('submit', function(e) {
            e.preventDefault();
            let start = $('#dateStart').val();
            let end = $('#dateEnd').val();
            $.post("", {
                _token: "{{ csrf_token() }}",
                dateStart: start,
                dateEnd: end
            }, function(data, status) {
                let test = JSON.parse(data).amount_in + ' TND';
                $('#amountIn').text(JSON.parse(data).amount_in + ' TND');
                $('#amountOut').text(JSON.parse(data).amount_out + ' TND');
            });
        });
    });
</script>
@endpush