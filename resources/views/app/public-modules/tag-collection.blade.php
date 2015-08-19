@extends('app.public-layout')

@section('content')
    <div class="container non-mod-page">
        <div class="inner">
            <header>
                <h1 class="title">
                    Write a few words about {{$moduleUser->user->first_name}}
                </h1>
            </header>

            <section class="tag-cloud">
                   <div class="inner">
                    <div class="content">
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
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection