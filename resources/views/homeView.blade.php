<!DOCTYPE html>
<html>
<head>
    <title>Homepage View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }
        .slider {
            padding: 50px;
            border: 2px solid purple;
            border-radius: 20px;
            margin-bottom: 40px;
        }
        img {
            width: 100%;
            max-width: 800px;
            height: auto;
            object-fit: cover;
            border-radius: 30px;
        }
        h3 {
            margin-top: 20px;
            text-align: center;
            color: orangered;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Homepage</h1>
        
        <div class="navbar">
            Navbar ID: {{ $data['navbar_id'] }}
        </div>
        
        <div class="slider">
            @foreach ($data['slider']['media'] as $media)
                <img src="{{ asset($media['file_path']) }}" alt="Slider Image">
            @endforeach
        </div>
        
        <div class="cards">
            @foreach ($data['cards'] as $card)
                <div class="card">
                    Card ID: {{ $card['id'] }}
                    <!-- Display other card-related data here -->
                </div>
            @endforeach
        </div>
        
        <div class="media">
            <img src="{{ asset($data['media']['file_path']) }}" alt="Media Image">
        </div>
        
        <div class="footer">
            Footer ID: {{ $data['footer_id'] }}
        </div>
    </div>
    
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
