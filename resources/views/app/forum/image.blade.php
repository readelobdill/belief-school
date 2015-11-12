<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Belief School</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:image" content="{{asset('uploads/comment-images/'.$comment->user->id.'/'.$image->filename)}}" />
    <meta property="og:title" content="My Belief School" />
    <meta property="og:site_name" content="My Belief School" />
    <meta property="og:description" content="Belief School Transforms Lives. Insightful interactive online modules give you the evidence you need to create the life you want." />
    <meta property="og:type" content="website" />

    <style>
        body {
            margin: 0;
        }
    </style>


</head>
<body data-page="comment-image">

<img src="{{asset('uploads/comment-images/'.$comment->user->id.'/'.$image->filename)}}" alt="Belief School">
</body>
</html>