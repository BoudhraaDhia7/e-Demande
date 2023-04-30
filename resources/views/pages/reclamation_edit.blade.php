@extends('layouts.app', ['activePage' => 'reclamation_table', 'titlePage' => __('Reclamation detail')])

@section('content')

    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($reclamation->status == 0)
                        @include('common.buttons',['btn' => 'unblock', 'username' => $reclamation->username, 'prefix' => $prefix])
                    @else
                        @include('common.buttons',['btn' => 'block', 'username' => $reclamation->username, 'prefix' => $prefix])
                    @endif
                </div>
            </div>
            @include('common.alerts')
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Mise à jour des informations du réclamation') }}</h4>
                      
                    </div>
                   
                    <div class="card-body p-4">
                        <form action="{{ route('update-reclamation', $reclamation->id) }}" method="POST" class="mt-3">
                            @method('PUT')
                            @csrf
                            <input hidden type="text" name="id" value="{{ $reclamation->id }}">
                            <div class="form-group">
                                <label for="">Télephone</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name="cin"
                                    value="{{ $reclamation->phone }}" disabled />
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name="from_user"
                                    value="{{ $reclamation->email }}" disabled />
                            </div>

                            <div class="form-group">
                                <label for="">Citoyen</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name="to_user"
                                    value="{{ $reclamation->lastname . $reclamation->name }}" disabled />
                            </div>

                            
                           
                           
                        </form>
                    </div>
                </div>
            </div>

            @if(auth()->user()->role == '1' )
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Affecter un technicien') }}</h4>
                      
                    </div>
                   
                    <div class="card-body p-4">
                        <form action="{{ route('update-technicien', $reclamation->id) }}" method="POST" class="mt-3">
                            @method('PUT')
                            @csrf
                      
                            <div class="form-group">
                                <label for="">Technicien</label>
                                <select  class="form-control" id="" aria-describedby="" name="state"
                                    value="{{ $reclamation->state }}"  >
                                    <option value="not_selected" selected >-------- Choisir un technicien --------</option>
                                    @foreach ($users as $user)
                                        
                                        <option value="{{ $user->username }}">{{ $user->username }}</option>
                                       
                                    @endforeach                                     
                                </select>    
                            </div>
                           
                            <button type="submit" class="btn btn-primary pull-right">Mise à jour </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            
            @if(auth()->user()->role == '2' )
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Affecter un technicien') }}</h4>
                      
                    </div>
                   
                    <div class="card-body p-4">
                        <form action="{{ route('update-technicien', $reclamation->id) }}" method="POST" class="mt-3">
                            @method('PUT')
                            @csrf
                      
                            <div id="gmap" style="height:500px"></div>
                           
                            <button type="submit" class="btn btn-primary pull-right">Valider la tàche </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            {{-- update profile informations --}}
            
        </div>
    </div>
@endsection
@if(auth()->user()->role == '2')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
    <script type="text/javascript">
        $(function(){
            var la = "{{ $reclamation->la !=null ?  $reclamation->la : 35.67743306240599}} ";
            var ln = "{{ $reclamation->ln !=null ?  $reclamation->ln : 10.097028163014665 }} ";
            var latlng=new google.maps.LatLng(la, ln);
            var map=new google.maps.Map(document.getElementById('gmap'),{
                                                                    zoom:14,
                                                                    center:latlng,
                                                                    mapTypeId:google.maps.MapTypeId.ROADMAP
                                                                    });
                                                                   ;
        var marker=new google.maps.Marker({
                                    
                                            position:new google.maps.LatLng(35.67743306240599, 10.097028163014665),
                                            map:map,
                                            draggable:false,
                                            animation:google.maps.Animation.DROP
                                        });
        //default
        //change on map
        marker.addListener( 'mouseover', function(event) {
            document.getElementById("la").value = event.latLng.lat();
            document.getElementById("ln").value = event.latLng.lng();
        });
        marker.addListener( 'mouseout', function(event) {
            document.getElementById("la").value = event.latLng.lat();
            document.getElementById("ln").value = event.latLng.lng();
        });
        });
        //end change on map
        </script>
@endif        
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