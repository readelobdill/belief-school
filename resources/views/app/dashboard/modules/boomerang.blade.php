<div class="content">
    <div class="inner-padding">
        <h1 class="plain">My trusted friends &amp; family think that I am...</h1>
        <div class="dots"></div>

        <script class="tagcloud-words" type="application/json">
            {!! json_encode($module->pivot->data) !!}
        </script>
        <div class="tagcloud"></div>

         <p class="center">
            <a href="mailto:?subject=&body={{rawurlencode(config('belief.email') . "\n\n" . route('tagcloud', [$module->pivot->secret]))}}" class="button small">Re-send email</a>
        </p>
    </div>
</div>