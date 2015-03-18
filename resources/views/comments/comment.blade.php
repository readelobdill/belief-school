@if(!empty($comment->title))
    <h3>{{$comment->title}}</h3>
@endif
<h4>{{$comment->user->name}}</h4>
<p>{{$comment->created_at->diffForHumans()}}</p>
<p>
    {{$comment->body}}
</p>
<a href="{{route('admin.comments.reply', [$comment->id])}}" class="btn btn-primary btn-xs">Reply</a>
@if($comment->depth == 0)
<a href="{{route('admin.comments.sticky', [$comment->id])}}" class="btn btn-info btn-xs sticky-comment {{($comment->sticky ? 'active' : '')}}">Sticky</a>
@endif
<a href="{{route('admin.comments.delete', [$comment->id])}}" class="btn btn-danger btn-xs delete-comment">Delete</a>
