<!DOCTYPE html>
<html>
<head>
    <title>Slider View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            width: 40%;
            margin: 0 auto;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .slider {
            padding: 50px;
            border: 2px solid purple;
            border-radius: 20px;
            margin-bottom: 40px;
        }
        img{
            width: 100%;
            max-width: 800px;
            height: 500px;
            object-fit: cover;
            border-radius: 30px;
        }
        h3{
            margin-top: 20px;
            text-align: center;
            color: orangered;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sliders</h1>

        <!-- Create Slider -->
        <div class="mt-4">
        <h2>Create New Slider</h2>
        <form id="createSliderForm">
            @csrf
            <div class="mb-3">
                <label for="title_en" class="form-label">English Title</label>
                <input type="text" class="form-control" id="title_en" name="title_en">
            </div>
            <div class="mb-3">
                <label for="title_bn" class="form-label">Bangla Title</label>
                <input type="text" class="form-control" id="title_bn" name="title_bn">
            </div>
            <div class="mb-3">
                <label for="media_ids" class="form-label">Media IDs (comma-separated)</label>
                <input type="text" class="form-control" id="media_ids" name="media_ids">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
            </div>
            <button type="button" id="submitForm" class="btn btn-primary">Create Slider</button>
        </form>
        <div id="messageContainer" class="mt-3"></div>
    </div>

    <!-- Show Sliders -->
        @foreach ($sliders as $slider)
        <div class="slider">
            <div id="slider-{{ $slider->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($slider->media as $index => $media)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset($media->file_path) }}" class="d-block w-100" alt="Slider Image">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#slider-{{ $slider->id }}" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider-{{ $slider->id }}" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            <div class="slider-content">
                @if (app()->getLocale() === 'en')
                <h3>{{ $slider->title_en }}</h3>
                @else
                <h3>{{ $slider->title_bn }}</h3>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('submitForm').addEventListener('click', function() {
        var formData = {
            title_en: document.getElementById('title_en').value,
            title_bn: document.getElementById('title_bn').value,
            media_ids: document.getElementById('media_ids').value.split(','),
            status: document.getElementById('status').checked ? true : false
        };
        
        fetch('http://127.0.0.1:8000/api/sliders', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            // Clear previous messages
            document.getElementById('messageContainer').innerHTML = '';

            // Display success message
            var successMessage = document.createElement('div');
            successMessage.classList.add('alert', 'alert-success');
            successMessage.innerText = 'Slider created successfully.';
            document.getElementById('messageContainer').appendChild(successMessage);
            console.log(data);
        })
        .catch(error => {
            // Clear previous messages
            document.getElementById('messageContainer').innerHTML = '';

            // Display error message
            var errorMessage = document.createElement('div');
            errorMessage.classList.add('alert', 'alert-danger');
            errorMessage.innerText = 'An error occurred while creating the slider.';
            document.getElementById('messageContainer').appendChild(errorMessage);

            console.error('Error:', error);
        });
    });
</script>
</body>
</html>
