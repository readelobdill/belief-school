<script type="application/json">
    {!! $comment->toJson() !!}
</script>
@if($comment->deleted)

    <div class="inner is-deleted">
        <h4>Comment removed</h4>
        <div class="comment-creation-date">{{$comment->created_at->diffForHumans()}}</div>

        @if($comment->depth == 0 && Auth::user()->isAdmin())
            <a href="{{route('admin.comments.sticky', [$comment->id])}}" class="btn btn-info btn-xs sticky-comment {{($comment->sticky ? 'active' : '')}}">Sticky</a>
        @endif

        @if(Auth::user()->isAdmin())
            <a href="{{route('admin.comments.delete', [$comment->id])}}" class="btn btn-danger btn-xs delete-comment">Un-Delete</a>
        @endif

    </div>
@else
    @if(!empty($comment->title))
        <h3>{{$comment->title}}</h3>
    @endif

    <div class="inner">
        <div class="comment-creation-date">{{$comment->created_at->diffForHumans()}}</div>
        <div class="comment-username"><strong>{{$comment->user->username}}</strong> said:</div>

        <p>{!! $comment->body !!}</p>

        <a href="#" data-id="{{$comment->id}}" class="reply">Reply</a>

        @if($comment->depth == 0 && Auth::user()->isAdmin() )
            <a href="{{route('admin.comments.sticky', [$comment->id])}}" class="btn btn-info btn-xs sticky-comment {{($comment->sticky ? 'active' : '')}}">Sticky</a>
        @endif

        @if(Auth::user()->isAdmin())
            <a href="{{route('admin.comments.delete', [$comment->id])}}" class="btn btn-danger btn-xs delete-comment">Delete</a>
        @endif
        @if(!Auth::user()->isAdmin() && Auth::user()->id == $comment->user->id)
            <a href="{{route('modules.comment.delete', [$comment->id])}}" class="btn btn-danger btn-xs delete-comment">Delete</a>
        @endif

        <form action="{{route('comments.reply', [$comment->id])}}" method="POST" class="is-hidden reply-form">
            <div class="form-row">
                <textarea placeholder="Write a comment" name="body"></textarea>
            </div>
            <div class="actions">
                <button class="button small">Comment</button>
            </div>
        </form>
    </div>
@endif


