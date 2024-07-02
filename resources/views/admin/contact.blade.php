@extends('admin.layout.dashboard')

@section('content')
<script src="https://cdn.tiny.cloud/1/i76ab8u665a2vmi4zpvqdl15kpi4a73ypf56qkl7sysbfsvs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });

  function setContactContent(content) {
      tinymce.get('contact').setContent(content);
  }

  document.addEventListener('DOMContentLoaded', function () {
      document.querySelector('.edit').addEventListener('click', function () {
          var contactContent = this.getAttribute('data-contact-content');
          setContactContent(contactContent);
      });
  });
</script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Auth::guard('admin')->user()->name }}'s Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Insert Contact Image</h4>
                <form action="{{ url('/admin/updateContact') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="mb-2">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage()">
                            </div>
                            <br>
                            <hr></hr>

                            <div class="mb-3">
                                <h4 class="card-title mb-4">Address</h4>
                                <input type="text" name="address" class="form-control" id="address" required>
                            </div>
                            <div class="mb-3">
                                <h4 class="card-title mb-4">Phone</h4>
                                <input type="text" name="phone" class="form-control" id="phone" required>
                            </div>
                            <div class="mb-3">
                                <h4 class="card-title mb-4">Email</h4>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Current Contact</h5>
                <div class="text-end">
                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editContact" data-contact-content="{!! $contact ? htmlspecialchars($contact->contact) : '' !!}">
                        <i class="ri-pencil-fill text-success"></i>
                    </a>                   
                </div>
                <hr>
                <div class="table-responsive">
                    @if($contact)
                        <table class="table table-nowrap align-middle mb-0">
                            <tr>                            
                                <td>
                                    <div>
                                        <label for="">Address</label>
                                        {!! $contact->address !!}
                                    </div>
                                    <br>
                                    <hr>
                                    <div>
                                        <label for="">Phone Number</label>
                                        {!! $contact->phone !!}
                                    </div>
                                    <hr>
                                    <br>
                                    <div>
                                        <label for="">Email:</label>
                                        {!! $contact->email !!}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    @else
                        <p>No contact information available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
