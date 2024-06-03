@extends('admin.layout.dashboard')

@section('content')

<script src="https://cdn.tiny.cloud/1/i76ab8u665a2vmi4zpvqdl15kpi4a73ypf56qkl7sysbfsvs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });

  function setHistoryContent(content) {
      tinymce.get('history_text').setContent(content);
  }

  document.addEventListener('DOMContentLoaded', function () {
      document.querySelector('.edit').addEventListener('click', function () {
          var historyContent = this.getAttribute('data-history-content');
          setHistoryContent(historyContent);
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
                    <li class="breadcrumb-item active">History</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">History</h5>
                <p class="card-title-desc">Manage History Details</p>
                <hr>

                <form action="{{ url('/admin/updateHistory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="history_id" value="{{ !empty($history) ? $history->id : null }}">
                    
                    <fieldset class="mb-3">
                        <p>Image</p>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="floatingImageInput" name="image">
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Title</p>
                        <div class="form-floating mb-3">
                            <input type="text" name="title" class="form-control" id="floatingTitleInput" required>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Text</p>
                        <div class="form-floating mb-3">
                            <textarea name="history_text" class="form-control" id="history_text" cols="30" rows="10"></textarea>
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
                <h5 class="card-title mb-4">History Details</h5>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Image</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <img src="{{ !empty($history) ? asset($history->image) : '' }}" alt="History Image" class="avatar-xl">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Title</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span>{{ !empty($history) ? $history->title : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">History Text</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span>{{ !empty($history) ? strip_tags($history->history_text) : '' }}</span>
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
