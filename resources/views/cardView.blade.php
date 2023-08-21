<!DOCTYPE html>
<html>
<head>
    <title>Card List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Card List</h1>
        <div class="row">
        @foreach ($cards as $card)
<div class="col-md-4">
    <div class="card">
        @foreach ($card->media as $media)
        @if (strpos($media->file_type, 'image') !== false)
        <img src="{{ asset($media->file_path) }}" class="card-img-top" alt="Media">
        @elseif (strpos($media->file_type, 'video') !== false)
        <video controls>
            <source src="{{ asset($media->file_path) }}" type="{{ $media->file_type }}">
            Your browser does not support the video tag.
        </video>
        @else
        <a href="{{ asset($media->file_path) }}" target="_blank">{{ $media->file_name }}</a>
        @endif
        @endforeach
        <div class="card-body">
            <h5 class="card-title">{{ $card->title_en }}</h5>
            <p class="card-text">{{ $card->description_en }}</p>
            <a href="{{ $card->link_url }}" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>
@endforeach

        </div>
    </div>
</body>
</html>
