@extends('admin.layout.dashboard')

@section('content')
<script src="https://cdn.tiny.cloud/1/i76ab8u665a2vmi4zpvqdl15kpi4a73ypf56qkl7sysbfsvs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });

  // Function to set the value of the textarea when edit button is clicked
  function setAboutContent(content) {
        tinymce.get('history').setContent(content);
    }

    // Ensure the document is ready before attaching the click event
    document.addEventListener('DOMContentLoaded', function () {
        // Attach the click event to the edit button
        document.querySelector('.edit').addEventListener('click', function () {
            // Get the about content from the button's data attribute
            var historyContent = this.getAttribute('data-history-content');

            // Set the about content in the textarea
            setAboutContent(historyContent);
        });
    });
</script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Auth::guard('admin')->user()->name }}'s Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">History</li>
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
                <h4 class="card-title mb-4"> Insert History Image</h4>
                <form action="{{ url('/admin/updateHistory') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf

                    <input type="hidden" name="history_id" value="{{ $history->id }}">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="mb-2">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage()">
                            </div>

                            <br>
                            <hr></hr>
                            <div class="mb-3">
                                <h4 class="card-title mb-4"> Title</h4>
                            
                                <input type="text" name="title" class="form-control" id="title" required value= "{{ $history->title }}">
                            </div>

                            <div class="mb-3">
                                <h4 class="card-title mb-4"> Type History Statement</h4>
                                <textarea name="history_text" class="form-control" id="history_text" cols="30" rows="10" required> {{ $history->history_text}}  </textarea>
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
                <h5 class="card-title mb-4">Current History Statement</h5>
                <div class="text-end">
                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editHistory" data-about-content="{!! !empty($history) ? htmlspecialchars($history->history) : '' !!}">
                        <i class="ri-pencil-fill text-success"></i>
                    </a>                   
                </div>
                <hr>
                <div class="table-responsive">
                    @if($history)
                        <table class="table table-nowrap align-middle mb-0">
                            <tr>                            
                                <td>
                                    <div>
                                        {!! $history->history_text !!}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    @else
                        <p>No History information available.</p>
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


@endsection