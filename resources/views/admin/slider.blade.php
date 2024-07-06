@extends('admin.layout.dashboard')

@section('content')

<!-- Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Auth::guard('admin')->user()->name }}'s Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Slider</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Add instructor Button -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add Slider</h4>
            </div>

            <div class="card-body">
                <div class="listjs-table" id="sliderList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#sliderModal">
                                <i class="ri-add-line align-bottom me-1"></i> Add
                            </button>
                            <button class="btn btn-soft-danger" onClick="deleteMultiple()">
                                <i class="ri-delete-bin-2-line"></i>
                            </button>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- instructor Table -->
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="sliderTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th>Slider Image</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $slider->id }}">
                                        </div>
                                    </td>
                                    <td><img src="{{ asset($slider->slider_image) }}" alt="Image" width="50"></td>
                                    
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$slider->id}}">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal for Editing instructor -->


                                <!-- Modal for Delete Confirmation -->
                                <div class="modal fade" id="deleteRecordModal{{$slider->id}}" tabindex="-1" aria-labelledby="deleteRecordModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="deleteForm{{$slider->id}}" method="POST" action="{{ url('/admin/deleteSlider') }}">
                                                @csrf

                                                <input type="hidden" id="slider_id" name="slider_id" value="{{ $slider->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteRecordModalLabel">Delete Slider</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this slider?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ orders. We did not find any orders for your search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="javascript:void(0);">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<!-- Modal for Adding instructor -->
<div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="sliderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="sliderForm" enctype="multipart/form-data" method="POST" action="{{ url('/admin/addSlider') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="sliderModalLabel">Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="slider_text" class="form-label">Slider Text</label>
                        <input type="text" name="slider_text" class="form-control" id="slider_text" required>
                    </div>
                    <div class="mb-3">
                        <label for="slider_image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="slider_image" name="image" accept="image/*" onchange="previewImage()">
                    </div>
                    <div id="image-preview"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        var fileInput = document.getElementById('slider_image');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.innerHTML = '<img src="' + reader.result + '" alt="Preview Image" class="img-fluid">';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
