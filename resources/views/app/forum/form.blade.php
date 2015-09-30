<form action="{{route('modules.comment', [$module->slug])}}" method="POST" class="comment-form">
    <div class="error-message"></div>
    <div class="form-row">
        <textarea name="body"></textarea>
    </div>
    <div class="form-row">
        <input type="file" name="image" />
    </div>
    <div class="actions">
        <button class="button small">Submit Comment</button>
    </div>
</form>