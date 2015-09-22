<div class="content">
    <div class="inner-padding">
        <h2 class="title">The people in my world think that I am&hellip;</h2>

        <script class="tagcloud-words" type="application/json">
            {!! json_encode($module->pivot->data) !!}
        </script>
        <div class="tagcloud"></div>

         <p class="center">
             <a href="mailto:?subject=Show%20your%20friend%20how%20special%20they%20are&body={{rawurlencode(view('emails.boomerang',['user' => Auth::user()])->render() . "\n\n" . route('tagcloud', [$module->pivot->secret]))}}" class="button small" data-update-module>Send your email to more people</a>
        </p>
    </div>
</div>