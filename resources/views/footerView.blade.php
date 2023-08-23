<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['title_en'] }}</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    h1, h2, h3, h4 {
        color: #333;
    }

    h1 {
        margin-top: 20px;
        text-align: center;
    }

    h2, h3, h4 {
        margin: 20px 0;
    }

    p {
        margin: 10px 0;
        line-height: 1.5;
    }

    a {
        color: #007bff;
        text-decoration: none;
        margin-right: 10px;
    }

    img {
        max-width: 100%;
        height: auto;
        margin: 10px 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

</head>
<body>
<h1>Footer Details</h1>

@if ($data)
    <h2>{{ $data['title_en'] }}</h2>
    <p>{{ $data['title_bn'] }}</p>

    <h3>Address 1</h3>
    <h4>{{ $data['address1_title_en'] }}</h4>
    <p>{{ $data['address1_title_bn'] }}</p>
    <p>{{ $data['address1_description_en'] }}</p>
    <p>{{ $data['address1_description_bn'] }}</p>

    <h3>Address 2</h3>
    <h4>{{ $data['address2_title_en'] }}</h4>
    <p>{{ $data['address2_title_bn'] }}</p>
    <p>{{ $data['address2_description_en'] }}</p>
    <p>{{ $data['address2_description_bn'] }}</p>

    <h3>Column 2</h3>
    <h4>{{ $data['column2_title_en'] }}</h4>
    <p>{{ $data['column2_title_bn'] }}</p>

    @foreach (json_decode($data['column2_links_en'], true) as $link)
        <a href="{{ $link['link'] }}">{{ $link['text'] }}</a>
    @endforeach

    @foreach (json_decode($data['column2_links_bn'], true) as $link)
        <a href="{{ $link['link'] }}">{{ $link['text'] }}</a>
    @endforeach

    <h3>Column 3</h3>
    <h4>{{ $data['column3_title1_en'] }}</h4>
    <p>{{ $data['column3_title1_bn'] }}</p>

    @foreach (json_decode($data['column3_links1_en'], true) as $link)
        <a href="{{ $link['link'] }}">{{ $link['text'] }}</a>
    @endforeach

    @foreach (json_decode($data['column3_links1_bn'], true) as $link)
        <a href="{{ $link['link'] }}">{{ $link['text'] }}</a>
    @endforeach

    <h4>{{ $data['column3_title2_en'] }}</h4>
    <p>{{ $data['column3_title2_bn'] }}</p>

    @foreach (json_decode($data['column3_logos'], true) as $logo)
        <img src="{{ $logo['link'] }}" alt="{{ $logo['title'] }}">
    @endforeach

    <h3>Column 4</h3>
    <h4>{{ $data['column4_title_en'] }}</h4>
    <p>{{ $data['column4_title_bn'] }}</p>
    <img src="{{ $data['column4_image'] }}" alt="Column 4 Image">
    <p>{{ $data['column4_text_en'] }}</p>
    <p>{{ $data['column4_text_bn'] }}</p>
    <a href="{{ $data['column4_link'] }}">{{ $data['column4_link'] }}</a>
    <p>{{ $data['column4_description_en'] }}</p>
    <p>{{ $data['column4_description_bn'] }}</p>
@else
    <p>No footer data found.</p>
@endif
</body>
</html>
