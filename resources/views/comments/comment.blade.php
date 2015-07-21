<script type="application/json">
    {!! $comment->toJson() !!}
</script>
@if(!empty($comment->title))
    <h3>{{$comment->title}}</h3>
@endif
<h4>{{$comment->user->name}}</h4>
<p>{{$comment->created_at->diffForHumans()}}</p>
<p>
    {{$comment->body}}
</p>
<a href="#" data-id="{{$comment->id}}" class="btn btn-primary btn-xs">Reply</a>
@if($comment->depth == 0 && Auth::user()->isAdmin())
<a href="{{route('admin.comments.sticky', [$comment->id])}}" class="btn btn-info btn-xs sticky-comment {{($comment->sticky ? 'active' : '')}}">Sticky</a>
@endif
@if($comment->user->id === Auth::user()->id || Auth::user()->isAdmin())
<a href="{{route('admin.comments.delete', [$comment->id])}}" class="btn btn-danger btn-xs delete-comment">Delete</a>
@endif

<form action="{{route('comments.reply', [$comment->id])}}" method="POST" class="reply-form">
    <div class="form-row">
        <textarea name="body"></textarea>
    </div>
    <div class="actions">
        <button class="button">Reply</button>
    </div>
</form>
