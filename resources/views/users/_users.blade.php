<div class="list-group-item d-flex  bd-highlight align-items-center">
    <img class="mr-3" src="{{url('img/123.png')}}" alt="" style="width:60px;height: auto;">
    <a href="{{ route('users.show',$user)}}">
        {{ $user->name }}
    </a>

    @can('destory',$user)
    <form action="{{ route('users.destroy',$user->id) }}" method="POST" class="float-end ms-auto p-2 bd-highlight">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>

    </form>
    @endcan
</div>