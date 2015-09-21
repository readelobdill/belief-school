<div class="content">
    <div class="inner-padding">
        <ul class="list-content">
            <li>
                <span>After</span>
                {{ $module->pivot->data[0]->{'challenge-1'} }}
                <span>I felt </span>
                {{ $module->pivot->data[1]->{'response-1'} }}
            </li>

            <li>
                <span>After</span>
                {{ $module->pivot->data[0]->{'challenge-2'} }}
                <span>I felt </span>
                {{ $module->pivot->data[1]->{'response-2'} }}
            </li>

            <li>
                <span>After</span>
                {{ $module->pivot->data[0]->{'challenge-3'} }}
                <span>I felt </span>
                {{ $module->pivot->data[1]->{'response-3'} }}
            </li>
        </ul>
    </div>
</div>