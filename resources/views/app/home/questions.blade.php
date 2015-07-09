<?php $questionCount = 7 ?>
<div class="inner">
    @for($i = 1; $i < $questionCount + 1; $i++)
        <div class="question question-{{$i}}">
            @include('app/home/questions/'.$i)
            <div class="next-question down-arrow">
                @include('app/partials/icons/down-arrow')
            </div>
        </div>
    @endfor

    <nav class="question-nav">
        <ul>
            @for($i = 2; $i < $questionCount + 1; $i++)
                <li data-question="{{ $i-1 }}"><a href="#"></a></li>
            @endfor
            <li></li>
        </ul>
    </nav>


</div>