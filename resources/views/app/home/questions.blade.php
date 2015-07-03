<div class="inner">
    @for($i = 1; $i < 8; $i++)
        <div class="question"">
            @include('app/home/questions/'.$i)
        </div>
    @endfor

    <nav class="question-nav">
        <ul>
            <li data-question="0">1</li>
            <li data-question="1" >2</li>
            <li data-question="2">3</li>
            <li data-question="3">4</li>
            <li data-question="4">5</li>
            <li data-question="5">6</li>
            <li data-question="6">7</li>
        </ul>
    </nav>
</div>