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
                    <li class="breadcrumb-item active">Feedback</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Add Feedback Button -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add Feedback</h4>
            </div>

            <div class="card-body">
                <div class="listjs-table" id="feedbackList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#feedbackModal">
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

                    <!-- Feedback Table -->
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="feedbackTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th></th>
                                    <th class="sort" data-sort="title">Title</th>
                                    <th class="sort" data-sort="name">Name</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($feedbacks as $feedback)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $feedback->id }}">
                                        </div>
                                    </td>
                                    <td><img src="{{ asset($feedback->image) }}" alt="Image" width="50"></td>
                                    <td>{{ $feedback->title }}</td>
                                    <td>{{ $feedback->name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editFeedbackModal{{$feedback->id}}">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$feedback->id}}">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>



                                <div class="modal fade" id="editFeedbackModal{{$feedback->id}}" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="feedbackForm" enctype="multipart/form-data" method="POST" action="{{ url('/admin/editFeedback')}}">
                                                @csrf

                                                <input type="hidden" id="feedback_id" name="feedback_id" value="{{ $feedback->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feedbackModalLabel">Update Feedback</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <textarea class="form-control" id="title" name="title" rows="2" required>{{ $feedback->title }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <textarea class="form-control" id="name" name="name" rows="2" required>{{$feedback->name}}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="feedback" class="form-label">Feedback</label>
                                                        <textarea class="form-control" id="feedback" name="feedback" rows="4" required>{{$feedback->feedback}}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage()">
                                                    </div>
                                                    <div id="image-preview" value=" {{ $feedback->image }}"></div>
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
                                <div class="modal fade" id="deleteRecordModal{{$feedback->id}}" tabindex="-1" aria-labelledby="deleteRecordModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="deleteForm" method="POST" action="{{ url('/admin/deleteFeedback') }}">
                                                @csrf

                                                <input type="hidden" id="feedback_id" name="feedback_id" value="{{$feedback->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteRecordModalLabel">Delete Feedback</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this feedback?</p>
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

<!-- Modal for Add Feedback -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="feedbackForm" enctype="multipart/form-data" method="POST" action="{{ url('/admin/addFeedback')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Add Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <textarea class="form-control" id="title" name="title" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <textarea class="form-control" id="name" name="name" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="feedback" class="form-label">Feedback</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage()">
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



<!-- Modal for update Confirmation -->


<!-- JavaScript for Add/Edit/Delete functionality -->
<script>
    function previewImage() {
        var fileInput = document.getElementById('image');
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
