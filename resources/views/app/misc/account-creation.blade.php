@extends('app/layout')

@section('content')
    <div class="module home-module account-creation" data-skip="{{Input::get('skip', false)}}" data-step="0" data-update-url="{{route('modules.update', ['creating-clarity'])}}" data-complete-url="{{route('modules.complete', ['creating-clarity'])}}">
        <section class="account-creation module-section has-container" data-type="AccountCreation" data-step="0">
            @include('app/modules/home/acquire-email')
        </section>

        <section class="account-creation module-section has-container" data-type="AccountCreation" data-step="1">
            @include('app/modules/home/account-creation')
        </section>

        <section class="questions module-section has-container" data-type="Questions" data-step="2">
            @include('app/modules/home/questions')
        </section>

        <section class="details module-section has-container has-text" data-type="Payment" data-step="3">
            @include('app/modules/home/details')
        </section>
    </div>
@endsection