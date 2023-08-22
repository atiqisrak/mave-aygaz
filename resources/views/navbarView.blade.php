<!DOCTYPE html>
<html>
<head>
    <title>Navbar View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                @if ($navbar->logo)
                    <img src="{{ asset($navbar->logo->file_path) }}" alt="Logo" width="50" height="50">
                @else
                    Logo
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @foreach ($navbar->menu->menuItems as $menuItem)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $menuItem->link }}">{{ $menuItem->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
