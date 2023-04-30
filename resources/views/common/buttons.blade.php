@switch($btn)
    @case('add')
        <button class="btn btn-sm pull-right btn-warning btn-yellow mb-5" data-toggle="modal"
            data-target="#exampleModal">Ajouter</button>
    @break
    @case('list-all-contacts')
        <a href="{{ route('list-contants', 'all') }}" type="button"
            class="btn btn-sm pull-right btn-warning btn-yellow mb-5">Lister tous les contacts</a>
    @break
    @case('block')
        <a href="{{ route($prefix . '-modelAction', ['block', $username]) }}" type="button"
            class="btn btn-sm pull-right btn-danger mb-3"><span class="mr-1">Bloquer</span> <i
                class='fas fa-user-lock'></i></a>
    @break
    
    @default
@endswitch
