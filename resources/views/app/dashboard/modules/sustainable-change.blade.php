<div class="content">
    <div class="inner-padding">
        <ul class="list-content">
            <li>
                <span>Throughout my Belief School <br/>journey I choose to: </span>
                {{ $modules[1]->pivot->data[0]->challenge }}
            </li>
            <li>
                <span>It made me feel:</span>
                {{$module->pivot->data[0]->i_felt}}
            </li>
            <li>
                <span>I incorporated into my life:</span>
                {{ $module->pivot->data[1]->i_chose }}
            </li>
        </ul>
    </div>
</div>