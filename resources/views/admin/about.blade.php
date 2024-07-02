
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
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">About</h5>
                    <p class="card-title-desc">Manage About Details</p>
                    <hr>
    
                    <form action="{{ url('/admin/updateAbout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="about_id" value="{{ !empty($about) ? $about->id : null }}">
                        
                        <!--<fieldset class="mb-3">
                            <p>Banner</p>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingBannerInput" name="banner">
                            </div>
                        </fieldset> -->

                        <fieldset class="mb-3">
                            <p>Image</p>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingImageInput" name="image">
                            </div>
                        </fieldset>
    
                        <fieldset class="mb-3">
                            <p>Text</p>
                            <div class="form-floating mb-3">
                                <textarea name="about" class="form-control" id="floatingAboutInput" cols="30" rows="10"></textarea>
                            </div>
                        </fieldset>
                        <div>
                            <button type="submit" class="btn btn-primary w-md float-end">Save</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">About Details</h5>
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle mb-0">
                            <tbody>
                                <!--<tr> -->
                                    <!--<td> -->
                                      <!--  <h5 class="text-truncate font-size-14 m-0">
                                            <a href="javascript: void(0);" class="text-dark">Banner</a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <img src="{{ !empty($about) ? asset($about->banner) : '' }}" alt="Banner Image" class="avatar-xl">
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>
                                        <h5 class="text-truncate font-size-14 m-0">
                                            <a href="javascript: void(0);" class="text-dark">Image</a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <img src="{{ !empty($about) ? asset($about->image) : '' }}" alt="About Image" class="avatar-xl">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="text-truncate font-size-14 m-0">
                                            <a href="javascript: void(0);" class="text-dark">About Text</a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <span>{{ !empty($about) ? strip_tags($about->about) : '' }}</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
