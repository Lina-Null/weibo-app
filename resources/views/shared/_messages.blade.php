@foreach(['danger','warning','success','info'] as $msg)
    @if(session()->has($msg))
        <div class="flash-message offset-md-3 col-md-6 text-center">
            <p class="alert alert-{{ $msg }} ">
                {{ session()->get($msg) }}
            </p>
        </div>
    @endif

@endforeach