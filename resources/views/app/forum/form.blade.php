<form action="{{route('modules.comment', [$module->slug])}}" method="POST" class="comment-form">
    <div class="error-message"></div>
    <div class="form-row">
        <textarea name="body"></textarea>
    </div>

    <label class="comment-image-upload">
        Upload an image
        <span class="image-name"></span>
        <input type="file" name="image" accept="image/gif,image/jpeg,image/png" />
    </label>

    <div class="actions">
        <button class="button small">Submit Comment</button>
    </div>
</form>