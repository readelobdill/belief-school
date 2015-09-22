<div class="content">
    <div class="inner-padding">
        <ul class="list-content">
            <li>
                <span>My fear is:</span>
                {{ $module->pivot->data[0]->{'challenge-1'} }}
                <span>confronting it made me feel</span>
                {{ $module->pivot->data[1]->{'response-1'} }}
            </li>

            <li>
                <span>My fear is:</span>
                {{ $module->pivot->data[0]->{'challenge-2'} }}
                <span>confronting it made me feel</span>
                {{ $module->pivot->data[1]->{'response-2'} }}
            </li>

            <li>
                <span>My fear is:</span>
                {{ $module->pivot->data[0]->{'challenge-3'} }}
                <span>confronting it made me feel</span>
                {{ $module->pivot->data[1]->{'response-3'} }}
            </li>

        </ul>
    </div>
</div>