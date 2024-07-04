@extends('admin.layout.dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Auth::guard('admin')->user()->name }}'s Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Site Global Setting</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Site Global Setting</h5>
                <p class="card-title-desc">Manage Site Global Setting</p>
                <hr>

                <form action="{{ url('/admin/updateSiteGlobalSetting') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="site_info_id" value="{{ !empty($setting) ? $setting->id : null }}">

                    <fieldset class="mb-3">
                        <p>Header Logo</p>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="floatingLogoWInput" name="header_logo">
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Footer Logo</p>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="floatingLogoWInput" name="footer_logo">
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Page Banner</p>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="floatingLogoWInput" name="banner">
                        </div>
                    </fieldset>

                    <div class="form-floating mb-3">
                        <textarea name="description" class="form-control ckeditor" id="floatingDescInput" cols="30" rows="10">{!! !empty($setting) ? $setting->description : '' !!}</textarea>
                        <label for="floatingDescInput">Site Description</label>
                    </div>

                    <fieldset class="mb-3">
                        <p>Phone Number</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPhoneInput" name="phone_number" value="{{ !empty($setting) ? $setting->phone_number : '' }}">
                            <label for="floatingPhoneInput">Phone Number</label>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Email</p>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmailInput" name="email" value="{{ !empty($setting) ? $setting->email : '' }}">
                            <label for="floatingEmailInput">Email</label>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Address</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingAddressInput" name="address" value="{{ !empty($setting) ? $setting->address : '' }}">
                            <label for="floatingAddressInput">Address</label>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Facebook</p>
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="floatingFacebookInput" name="facebook" value="{{ !empty($setting) ? $setting->facebook : '' }}">
                            <label for="floatingFacebookInput">Facebook URL</label>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Twitter</p>
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="floatingTwitterInput" name="twitter" value="{{ !empty($setting) ? $setting->twitter : '' }}">
                            <label for="floatingTwitterInput">Twitter URL</label>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Instagram</p>
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="floatingInstagramInput" name="instagram" value="{{ !empty($setting) ? $setting->instagram : '' }}">
                            <label for="floatingInstagramInput">Instagram URL</label>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>LinkedIn</p>
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="floatingLinkedInInput" name="linkedin" value="{{ !empty($setting) ? $setting->linkedin : '' }}">
                            <label for="floatingLinkedInInput">LinkedIn URL</label>
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
                <h5 class="card-title mb-4">Site Global Setting </h5>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Site Header Logo</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <img src="{{ !empty($setting) ? asset($setting->header_logo) : '' }}" alt="Header Logo" class="avatar-xl">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Site Footer Logo</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <img src="{{ !empty($setting) ? asset($setting->footer_logo) : '' }}" alt="Footer Logo" class="avatar-xl">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Site Banner</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <img src="{{ !empty($setting) ? asset($setting->banner) : '' }}" alt="Banner" class="avatar-xl">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Site Description</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->description : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Phone Number</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->phone_number : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Email</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->email : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Address</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->address : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Facebook</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->facebook : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Twitter</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->twitter : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">Instagram</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->instagram : '' }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">LinkedIn</a>
                                    </h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->linkedin : '' }}</span>
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
