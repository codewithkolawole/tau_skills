@extends('admin.layout.dashboard')

@section('content')

<script src="https://cdn.tiny.cloud/1/b9d45cy4rlld8ypwkzb6yfzdza63fznxtcoc3iyit61r4rv9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });

  function setMissionContent(content) {
        tinymce.get('mission').setContent(content);
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.edit').addEventListener('click', function () {
            var missionContent = this.getAttribute('data-mission-content');
            setMissionContent(missionContent);
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

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Auth::guard('admin')->user()->name }}'s Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Mission</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Insert Program Details</h4>
                <form action="{{ url('/admin/updateProgram') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3 text-center">
                                <label for="program-img-file-input" class="custom-file-upload">
                                    Choose Image
                                </label>
                                <input id="program-img-file-input" type="file" class="profile-img-file-input" accept="image/png, image/jpeg" name="program_image" required onchange="previewImage('program')">
                            </div>
                            <div id="program-image-preview"></div>
                            <br>
                            <hr>
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="overview">Overview</label>
                                <textarea name="overview" class="form-control" id="overview" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="curriculum">Curriculum</label>
                                <textarea name="curriculum" class="form-control" id="curriculum" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="programcode">Program Code</label>
                                <input type="text" name="programcode" class="form-control" id="programcode">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(id) {
        var fileInput = document.getElementById(id + '-img-file-input');
        var file = fileInput.files[0];
        var reader = new FileReader();
        
        reader.onload = function() {
            var output = document.getElementById(id + '-image-preview');
            output.innerHTML = '<img src="' + reader.result + '" alt="Preview Image">';
            toggleCurrentImageHeading(id);
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function toggleCurrentImageHeading(id) {
        var imagePreview = document.getElementById(id + '-image-preview');
        var currentImageHeading = document.querySelector('.' + id + '-current-image-heading');
        
        if (imagePreview.querySelector('img')) {
            currentImageHeading.style.display = 'block';
        } else {
            currentImageHeading.style.display = 'none';
        }
    }
</script>

@endsection
