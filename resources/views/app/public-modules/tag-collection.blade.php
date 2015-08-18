@extends('app.public-layout')

@section('content')
    <form action="{{route('tags.submit', [$moduleUser->secret])}}" method="POST" class="tag-cloud-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-row">
            <input type="text" name="tags[]">
        </div>
        <div class="form-row">
            <input type="text" name="tags[]">
        </div>
        <div class="form-row">
            <input type="text" name="tags[]">
        </div>
        <div class="actions">
            <button class="button">Submit</button>
        </div>
    </form>


@endsection