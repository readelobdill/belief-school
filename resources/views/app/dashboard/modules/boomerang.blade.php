<div class="content">
    <div class="inner-padding">
        <div class="edit-button-container">
            <span class="edit"><i class="icon-edit"></i>Edit</span>
            <span class="cancel"><i class="icon-close"></i>Cancel</span>
            <span class="save"><i class="icon-validate"></i>Save</span>
        </div>

        <h2 class="title">The people in my world think that I am</h2>

        <script class="tagcloud-words" type="application/json">
            {!! json_encode($module->pivot->data) !!}
        </script>
        <div class="tagcloud"></div>

        <form action="{{route('dashboard.save-word-cloud')}}" method="POST" class="save-word-cloud is-hidden">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        </form>

         <p class="center">
             <a href="mailto:?subject=A%20request%20from%20your%20friend&body={{rawurlencode(view('emails.boomerang',['user' => Auth::user(), 'gender' => $modules[0]->pivot->data->{'1'}->gender])->render() . "\n\n" . route('tagcloud', [$module->pivot->secret]))}}" class="button small" title="Send your email to more people" data-update-module>Send your email to more people</a>
        </p>
    </div>
</div>