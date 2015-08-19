<script type="application/json">
    {!! $comment->toJson() !!}
</script>

@if(!empty($comment->title))
    <h3>{{$comment->title}}</h3>
@endif

<div class="inner">
    <h4>{{$comment->user->name}}</h4>
    <div class="comment-creation-date">{{$comment->created_at->diffForHumans()}}</div>
    <div class="comment-username"><strong>{{$comment->user->username}}</strong> said:</div>

    <p>{{$comment->body}}</p>

    <a href="#" data-id="{{$comment->id}}" class="reply">Write reply</a>

    @if($comment->depth == 0 && Auth::user()->isAdmin())
        <a href="{{route('admin.comments.sticky', [$comment->id])}}" class="btn btn-info btn-xs sticky-comment {{($comment->sticky ? 'active' : '')}}">Sticky</a>
    @endif

    {{--@if($comment->user->id === Auth::user()->id || Auth::user()->isAdmin())
        <a href="{{route('admin.comments.delete', [$comment->id])}}" class="btn btn-danger btn-xs delete-comment">Delete</a>
    @endif --}}

    <form action="{{route('comments.reply', [$comment->id])}}" method="POST" class="is-hidden reply-form">
        <div class="form-row">
            <textarea placeholder="Write a comment" name="body"></textarea>
        </div>
        <div class="actions">
            <button class="button small">Reply</button>
        </div>
    </form>
</div>

