<!DOCTYPE html>
<html>
<head>
    <title>Mave Aygaz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            width: 50%;
            margin: 0 auto;
        }
        .panel-primary {
            border-color: orange;
        }
        .panel-heading {
            color: orange;
        }
        .form-control {
            border-color: orange;
        }
        .btn-success {
            background-color: orange;
            border-color: orange;
        }
        .medex{
            width: 400px;
            height: 240px;
            padding: 30px;
            border-radius: 40px;
            object-fit: cover;
        }
        .boom{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            margin-left: 0;
        }
        .close{
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            padding: 10px 20px;
            border: 3px solid white;
            background: orange;
            border-radius: 9px;
        }
        .close:hover{
            background: red;
        }
        .alertMessage{
            color: green;
            font-size: 1.2em;
            font-weight: 600;
        }
    </style>
</head>
      
<body>
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>Upload Media</h2>
      </div>
 
      <div class="panel-body">
       
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" onclick="window.location.reload()">×</button>
                <strong class="alertMessage">{{ $message }}</strong>
        </div>
        @endif
      
        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <div class="mb-3">
                <label class="form-label" for="media">Media:</label>
                <input 
                    type="file" 
                    name="media[]" 
                    id="media"
                    class="form-control @error('media') is-invalid @enderror"
                    multiple>
                    
  
                @error('media')
                    <span class="text-danger"><br>{{ $message }}</span>
                @enderror
            </div>
   
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
                        <!-- Show uploaded images -->

            <div class="panel-heading">
                <h2>Recent Uploads</h2>
            </div>
                
            <!-- <div class="container boom">
                @if (Session::has('media'))
                    @foreach (Session::get('media') as $mediaName)
                        <img class="medex" src="{{ asset('media/'.$mediaName) }}" width="800px">
                    @endforeach
                @endif
            </div> -->
            <div class="mb-3">
    @if (Session::has('media'))
        @foreach (Session::get('media') as $mediaName)
            @php
                $extension = pathinfo($mediaName, PATHINFO_EXTENSION);
            @endphp

            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                <img class="medex" src="{{ asset('media/'.$mediaName) }}" width="800px">
            @elseif (in_array($extension, ['mp4', 'mkv']))
                <video class="medex" controls width="800px">
                    <source src="{{ asset('media/'.$mediaName) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @elseif ($extension === 'pdf')
                <iframe class="medex" src="{{ asset('media/'.$mediaName) }}" width="800px" height="600px"></iframe>
            @else
                <p>Unsupported file format: {{ $extension }}</p>
            @endif
        @endforeach
    @endif
</div>

       
        </form>
      
      </div>
    </div>
</div>
</body>
    
</html>
