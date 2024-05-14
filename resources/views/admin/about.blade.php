@extends('admin.layout.dashboard')

@section('content')

<script src="https://cdn.tiny.cloud/1/b9d45cy4rlld8ypwkzb6yfzdza63fznxtcoc3iyit61r4rv9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });

  // Function to set the value of the textarea when edit button is clicked
  function setAboutContent(content) {
        tinymce.get('about').setContent(content);
    }

    // Ensure the document is ready before attaching the click event
    document.addEventListener('DOMContentLoaded', function () {
        // Attach the click event to the edit button
        document.querySelector('.edit').addEventListener('click', function () {
            // Get the about content from the button's data attribute
            var aboutContent = this.getAttribute('data-about-content');

            // Set the about content in the textarea
            setAboutContent(aboutContent);
        });
    });
</script>

<style>
    .profile-img-file-input {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        background-color: #f8f9fa;
        border-radius: 5px;
        text-align: center; 
    }

    .custom-file-upload:hover {
        background-color: #e9ecef;
    }

    #image-preview {
        margin-top: 10px;
        text-align: center; 
    }

    #image-preview img {
        max-width: 100%;
        max-height: 200px;
        border: 1px solid #ccc; 
        border-radius: 5px;
        margin-bottom: 10px;
    }
</style>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Auth::guard('admin')->user()->name }}'s Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"> Insert About Image</h4>
                <form action="{{ url('/admin/updateAbout') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="mb-3 text-center">
                                <label for="profile-img-file-input" class="custom-file-upload">
                                    Choose Image
                                </label>
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input" accept="image/png, image/jpeg" name="image" required onchange="previewImage()">
                            </div>

                            <div id="image-preview">

                            </div>

                            

                            <br>
                            <hr>

                            <div class="mb-3">
                                <h4 class="card-title mb-4"> Type About Statement</h4>
                                <textarea name="about" class="form-control" id="about" cols="30" rows="10">   </textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>

            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Current About Statement</h5>
                <div class="text-end">
                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editAbout" data-about-content="{!! !empty($about) ? htmlspecialchars($about->about) : '' !!}">
                        <i class="ri-pencil-fill text-success"></i>
                    </a>                   
                </div>
                <hr>
                <div class="table-responsive">
                    @if($about)
                        <table class="table table-nowrap align-middle mb-0">
                            <tr>                            
                                <td>
                                    <div>
                                        {!! $about->about !!}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    @else
                        <p>No About information available.</p>
                    @endif
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    
</div>
<!-- end row -->


<script>
   // Function to preview image
    function previewImage() {
        var fileInput = document.getElementById('profile-img-file-input');
        var file = fileInput.files[0];
        var reader = new FileReader();
        
        reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.innerHTML = '<img src="' + reader.result + '" alt="Preview Image">';
            toggleCurrentImageHeading(); // Call the function to toggle visibility
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Function to toggle visibility of "Current About Image" heading
    function toggleCurrentImageHeading() {
        var imagePreview = document.getElementById('image-preview');
        var currentImageHeading = document.querySelector('.current-image-heading');
        
        // If image preview is present, show the heading; otherwise, hide it
        if (imagePreview.querySelector('img')) {
            currentImageHeading.style.display = 'block';
        } else {
            currentImageHeading.style.display = 'none';
        }
    }
</script>


@endsection