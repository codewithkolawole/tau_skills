
@extends('admin.layout.dashboard')

@section('content')

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
                        
                        <fieldset class="mb-3">
                            <p>About Image</p>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingBannerInput" name="image">
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <p>About {{ env('APP_NAME') }}</p>
                            <div class="form-floating mb-3">
                                <textarea name="about" class="form-control ckeditor" id="floatingAboutInput" cols="30" rows="10">{!! !empty($about) ? $about->about : '' !!}</textarea>
                            </div>
                        </fieldset>

                        <hr>

                        <fieldset class="mb-3">
                            <p>History Image</p>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingImageInput" name="history_image">
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <p>History of {{ env('APP_NAME') }}</p>
                            <div class="form-floating mb-3">
                                <textarea name="history" class="form-control ckeditor" id="floatingAboutInput" cols="30" rows="10">{!! !empty($about) ? $about->history : '' !!}</textarea>
                            </div>
                        </fieldset>
                        
                        <hr>
                        <fieldset class="mb-3">
                            <p>Tour Image</p>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingImageInput" name="tour_image">
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <p>Tour note of {{ env('APP_NAME') }}</p>
                            <div class="form-floating mb-3">
                                <textarea name="tour_description" class="form-control ckeditor" id="floatingAboutInput" cols="30" rows="10">{!! !empty($about) ? $about->tour_description : '' !!}</textarea>
                            </div>
                        </fieldset>
    
                        <fieldset class="mb-3">
                            <p>Tour link of {{ env('APP_NAME') }}</p>
                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="floatingTwitterInput" name="tour_link" value="{{ !empty($about) ? $about->tour_link : '' }}">
                                <label for="floatingTwitterInput">Tour Video URL</label>
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
                                <tr>
                                    <td>
                                        <h5 class="text-truncate font-size-14 m-0">
                                            <a href="javascript: void(0);" class="text-dark">About</a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <span>{{ !empty($about) ? strip_tags($about->about) : '' }}</span>
                                        </div>
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
                                            <a href="javascript: void(0);" class="text-dark">History</a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <span>{{ !empty($about) ? strip_tags($about->history) : '' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <img src="{{ !empty($about) ? asset($about->history_image) : '' }}" alt="history Image" class="avatar-xl">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="text-truncate font-size-14 m-0">
                                            <a href="javascript: void(0);" class="text-dark">Tour</a><br>
                                            <a href="javascript: void(0);" class="text-dark">{{ !empty($about) ? $about->tour_link : '' }}</a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <span>{{ !empty($about) ? strip_tags($about->tour_description) : '' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <img src="{{ !empty($about) ? asset($about->tour_image) : '' }}" alt="tour Image" class="avatar-xl">
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
