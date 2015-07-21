<form action="{{route('modules.comment', [$module->slug])}}" method="POST" class="comment-form">
    <div class="form-row">
        <textarea name="body"></textarea>
    </div>
    <div class="actions">
        <button class="button">Submit Comment</button>
    </div>


</form>