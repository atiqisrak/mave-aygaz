<!DOCTYPE html>
<html>
<head>
    <title>About Page View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1>About Page</h1>

        <!-- Display media for section3_cards -->
        @foreach ($data->section3_cards as $card)
            <div class="card">
            @foreach ($card as $card)
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
                @endforeach
                <div class="card-body">
                    <h5 class="card-title">{{ $card->title_en }}</h5>
                    <p class="card-text">{{ $card->description_en }}</p>
                    <a href="{{ $card->link_url }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach

        <!-- Display media for section4_cards -->
        @foreach ($data->section4_cards as $card)
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
        @endforeach
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
