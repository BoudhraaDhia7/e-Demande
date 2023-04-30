@extends('layouts.app', ['activePage' => 'material_table', 'titlePage' => __('Material detail')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card">
                @include('common.alerts')
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Mise à jour du profil') }}</h4>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="{{ route('update-material', $material->id) }}" method="POST" class="mt-3">
                            @method('PUT')
                            @csrf
                            <input hidden type="text" name="id" value="{{ $material->id }}">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name="name"
                                    value="{{ $material->name }}"  />
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Mise à jour </button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- update material informations --}}
            
        </div>
    </div>
@endsection



