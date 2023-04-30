@extends('layouts.app', ['activePage' => 'users_table', 'titlePage' => __('User detail')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($admin->status == 0)
                        @include('common.buttons',['btn' => 'unblock', 'username' => $admin->username, 'prefix' => $prefix])
                    @else
                        @include('common.buttons',['btn' => 'block', 'username' => $admin->username, 'prefix' => $prefix])
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Mise à jour du profil') }}</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('update-user', $admin->id) }}" method="POST" class="mt-3">
                            @method('PUT')
                            @csrf
                            <input hidden type="text" name="id" value="{{ $admin->id }}">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name="username"
                                    value="{{ $admin->username }}"  />
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name="email"
                                    value="{{ $admin->email }}" />
                            </div>
                            <div class="form-group">
                                <label for="">Mot da passe</label>
                                <input type="password" class="form-control" id="myInput" name="password"
                                    value="Mot De passe caché" required />
                                <input type="checkbox" onclick="showPlainPassword()"> Voir mot de passe
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Mise à jour </button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- update profile informations --}}
            
        </div>
    </div>
@endsection

<script type="text/javascript">
    
    function showPlainPassword() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

</script>
