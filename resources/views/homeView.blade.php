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
            width: 60%;
            margin: 0 auto;
            padding-top: 20px;
        }
        .navbar {
            background-color: #333;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .navbar-nav {
            margin-right: 20px;
        }
        .nav-link {
            color: white;
        }
        .navbar img{
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .slider {
            padding: 50px;
            border: 2px solid purple;
            border-radius: 20px;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;

        }
        img {
            width: 1100px;
            /* max-width: 1100px; */
            height: 400px;
            object-fit: cover;
            border-radius: 30px;
        }
        h3 {
            margin-top: 20px;
            text-align: center;
            color: orangered;
        }
        .carousel-control-prev, .carousel-control-next {
            color: orangered;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <!-- <h1>Homepage</h1> -->
        
        <div class="navbar">
            @include('navbarView', ['navbar' => $data['navbar']])
        </div>
        
        <div class="slider">
            <div id="homepage-slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($data['slider']['media'] as $index => $media)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($media['file_path']) }}" alt="Slider Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#homepage-slider" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#homepage-slider" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
        
        <div class="container">
    <h2>Carousel of Cards</h2>
    <div id="cardsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($data['cards'] as $index => $card)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    @include('cardView', ['card' => $card])
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#cardsCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#cardsCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
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
