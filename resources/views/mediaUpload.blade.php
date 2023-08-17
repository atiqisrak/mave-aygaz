<!DOCTYPE html>
<html>
<head>
    <title>Mave Aygaz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .media-upload-container {
            width: 500px;
            margin: 0 auto;
        }

        .media-upload-heading {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .media-upload-input {
            width: 100%;
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
        }

        .media-upload-button {
            width: 100%;
            height: 40px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .media-upload-success {
            color: green;
            font-weight: bold;
        }

        .media-upload-filename {
            font-size: 14px;
        }
    </style>
</head>
      
<body>
<div class="container">
       
    <div class="media-upload-container">
  
      <h2 class="media-upload-heading">Upload your file</h2>
 
      <div class="media-upload-input">
        <input type="file" name="file" />
      </div>
 
      <button class="media-upload-button">Upload</button>
      
      @if ($message = Session::get('success'))
        <div class="alert alert-success media-upload-success">
            <strong>{{ $message }}</strong>
        </div>
        <p class="media-upload-filename">Filename: {{ Session::get('filename') }}</p>
      @endif
      
    </div>
</div>
</body>
    
</html>
