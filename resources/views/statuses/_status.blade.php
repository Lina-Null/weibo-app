<li class="d-flex mt-2 mb-4 p-2">
    <a class="flex-shrink-0" href="{{ route('users.show', $user->id )}}">
      <img src="{{url('img/123.png')}}"  style="width:60px;height: auto;" alt="{{ $user->name }}" class="me-1 "/>
    </a>
    <div class="flex-grow-1 ms-3">
      <h5 class="mt-0 mb-1">{{ $user->name }} <small> / {{ $status->created_at->diffForHumans() }}</small></h5>
      {{ $status->content }}
    </div>
    @can('destroy', $status)
    <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('您确定要删除本条微博吗？');">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
    </form>
  @endcan
    
  </li>