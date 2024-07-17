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
                    <li class="breadcrumb-item active">Program</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Add Program Button -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add Program</h4>
            </div>

            <div class="card-body">
                <div class="listjs-table" id="programList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#programModal">
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

                    <!-- Program Table -->
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="programTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th>Image</th>
                                    <th class="sort" data-sort="programcode">Code</th>
                                    <th class="sort" data-sort="title">Title</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($programs as $program)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $program->id }}">
                                        </div>
                                    </td>
                                    <td><img src="{{ asset($program->program_image) }}" alt="Image" width="50"></td>
                                    <td>{{ $program->programcode }}</td>
                                    <td>{{ $program->title }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editProgramModal{{$program->id}}">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$program->id}}">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal for Editing Program -->
                                <div class="modal fade" id="editProgramModal{{$program->id}}" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form id="editProgramForm{{$program->id}}" enctype="multipart/form-data" method="POST" action="{{ url('/admin/editProgram') }}">
                                                @csrf

                                                <input type="hidden" id="program_id" name="program_id" value="{{ $program->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="programModalLabel">Update Program</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" name="title" class="form-control" id="title" required value="{{ $program->title }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="programcode" class="form-label">Code</label>
                                                        <input type="text" name="programcode" class="form-control" id="programcode" required value="{{ $program->programcode }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="overview" class="form-label">Overview</label>
                                                        <textarea class="form-control ckeditor" id="overview" name="overview" rows="2" >{{ $program->overview }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="curriculum" class="form-label">Curriculum</label>
                                                        <textarea class="form-control ckeditor" id="curriculum" name="curriculum" rows="2">{{ $program->curriculum }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="program_image" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="program_image" name="program_image" accept="program_image/*" onchange="previewImage()">
                                                        <div id="image-preview{{$program->id}}">
                                                            <img src="{{ asset($program->program_image) }}" alt="Program Image" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal for Delete Confirmation -->
                                <div class="modal fade" id="deleteRecordModal{{$program->id}}" tabindex="-1" aria-labelledby="deleteRecordModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="deleteForm{{$program->id}}" method="POST" action="{{ url('/admin/deleteProgram') }}">
                                                @csrf

                                                <input type="hidden" id="program_id" name="program_id" value="{{ $program->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteRecordModalLabel">Delete Program</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this program?</p>
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

<!-- Modal for Adding Program -->
<div class="modal fade" id="programModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="programForm" enctype="multipart/form-data" method="POST" action="{{ url('/admin/addProgram') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="programModalLabel">Add Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required> 
                    </div>
                    <div class="mb-3">
                        <label for="programcode" class="form-label">Code</label>
                        <input type="text" name="programcode" class="form-control" id="programcode" required>
                    </div>
                    <div class="mb-3">
                        <label for="overview" class="form-label">Overview</label>
                        <textarea class="form-control ckeditor" id="overview" name="overview" rows="2" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="curriculum" class="form-label">Curriculum</label>
                        <textarea class="form-control ckeditor" id="curriculum" name="curriculum" rows="2" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="program_image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="program_image" name="program_image" accept="image/*" required>
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
        var fileInput = document.getElementById('program_image');
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
