<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer View</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .footer ul li {
            margin-right: 20px;
        }

        .footer img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="footer">
        <div class="footer-content">
            <h2>{{ $footer->title_en }}</h2>
            <p>{{ $footer->title_bn }}</p>

            <div class="logo-section">
                <ul>
                    @foreach ($footer->media as $media)
                        <li>
                            <img src="{{ $media->url }}" alt="{{ $media->title }}">
                            {{ $media->title }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
