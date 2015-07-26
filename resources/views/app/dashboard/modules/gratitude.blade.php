<p>Over the past 2 months I experienced</p>
<ul>
    @foreach($module->pivot->data[0] as $experience)
        <li>
            {{ $experience }}
        </li>
    @endforeach
</ul>

<p>and I sent this letter to someone</p>
<p>
    <em>{{ $module->pivot->data[1]->letter }}</em>
</p>