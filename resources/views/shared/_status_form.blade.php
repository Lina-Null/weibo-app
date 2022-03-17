<form action="{{ route('statuses.store') }}" method="POST">
    @include('shared._errors')
    {{ csrf_field()}}

    <textarea class="form-control" name="content" placeholder="留言 想看什么……"  rows="3"></textarea>
    <div class="text-end">
        <button type="submit" class="btn btn-primary mt-3">发布</button>
    </div>
</form>