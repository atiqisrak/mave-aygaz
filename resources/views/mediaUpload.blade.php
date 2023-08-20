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
        img {
            width: 300px;
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
                <strong>{{ $message }}</strong>
        </div>
        @endif
      
        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <div class="mb-3">
                <label class="form-label" for="media">Media:</label>
                <input 
                    type="file" 
                    name="media" 
                    id="media"
                    class="form-control @error('media') is-invalid @enderror">
  
                @error('media')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
   
            <div class="mb-3">
                <!-- <img id="previewImage" src="" alt="Preview Image"> -->
                <img src="{{ asset('media/'.Session::get('media')) }}" width="300px">

            </div>
   
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
       
        </form>
      
      </div>
    </div>
</div>

@section('scripts')
<script>
var inputMedia = document.getElementById("media");
var previewImage = document.getElementById("previewImage");

inputMedia.addEventListener("change", function() {
    var reader = new FileReader();
    reader.onload = function() {
        previewImage.src = reader.result;
    };
    reader.readAsDataURL(inputMedia.files[0]);
});
</script>
@endsection
</body>
    
</html>
