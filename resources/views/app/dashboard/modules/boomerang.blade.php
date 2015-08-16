<div class="content">
    <div class="inner-padding">
        <h1 class="plain">My trusted friends &amp; family think that I am...</h1>
        <div class="dots"></div>

        <script class="tagcloud-words" type="application/json">
            {!! json_encode($module->pivot->data) !!}
        </script>
        <div class="tagcloud"></div>

         <p class="center">
            <a class="button small-dashboard">Re-send email</a>
        </p>
    </div>
</div>