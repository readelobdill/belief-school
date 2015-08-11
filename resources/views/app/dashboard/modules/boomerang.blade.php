<div class="content">
    <p class="center">My trusted friends &amp; family think that I am...</p>
    <div class="dots"></div>

    <script class="tagcloud-words" type="application/json">
        {!! json_encode($module->pivot->data) !!}
    </script>
    <div class="tagcloud"></div>

     <p class="center">
        <a class="button small-dashboard">Re-send email</a>
    </p>
</div>