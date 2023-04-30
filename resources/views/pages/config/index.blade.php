@extends('layouts.app', ['activePage' => 'config', 'titlePage' => __('Configurations')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger mb-3">
                    <span id="name-error" class="error text-center">*** This place is for <b>DEVELOPER</b> only ***</span>
                </div>
            </div>
        </div>
        @include('common.alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="pt-2">Update rgs game list</h5>
                    </div>
                    <div class="card-body pt-0">
                        <a href="{{route('config-update-rgs-gamelist')}}" type="button" class="btn btn-danger">UPDATE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        // demo.initGoogleMaps();
    });
</script>
@endpush