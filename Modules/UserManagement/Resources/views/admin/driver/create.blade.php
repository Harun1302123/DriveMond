@extends('adminmodule::layouts.master')

@section('title', translate('Add_New_Driver'))

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between gap-3 align-items-center mb-4">
                <h2 class="fs-22">{{translate('add_Driver')}}</h2>
            </div>

            <form action="{{route('admin.driver.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-lg-8">
                                <h5 class="text-primary text-uppercase mb-4">{{translate('general_info')}}</h5>

                                <div class="row align-items-end">
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label for="f_name"
                                                   class="mb-2 text-capitalize">{{translate('first_name')}} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" value="{{old('first_name')}}" name="first_name"
                                                   id="f_name" class="form-control"
                                                   placeholder="{{translate('Ex: Maximilian')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label for="l_name" class="mb-2">{{translate('last_name')}} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" value="{{old('last_name')}}" name="last_name" id="l_name"
                                                   class="form-control"
                                                   placeholder="{{translate('Ex: Schwarzmüller')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label for="p_email" class="mb-2">{{translate('email')}} <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" value="{{old('email')}}" name="email" id="p_email"
                                                   class="form-control"
                                                   placeholder="{{translate('Ex: company@company.com')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label for="identity_type" class="mb-2">{{translate('identity_type')}}
                                                <span class="text-danger">*</span></label>
                                            <select name="identification_type" class="js-select text-capitalize"
                                                    id="identity_type" required>
                                                <option disabled selected>-- {{translate('select_identity_type')}}
                                                    --
                                                </option>
                                                <option value="passport">{{translate('passport')}}</option>
                                                <option value="nid">{{translate('NID')}}</option>
                                                <option
                                                    value="driving_license">{{translate('driving_license')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label for="identity_card_num"
                                                   class="mb-2">{{translate('identity_number')}} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" value="{{old('identification_number')}}"
                                                   name="identification_number"
                                                   id="identity_card_num" class="form-control"
                                                   placeholder="{{translate('Ex: 3032')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex flex-column justify-content-around gap-3">
                                            <h5 class="">{{translate('identity_card_image')}}</h5>
                                            
                                                <div class="upload-file image-contain d-flex" id="multi_image_picker">
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-around gap-3">
                                    <h5 class="text-center">{{translate('driver_image')}}</h5>

                                    <div class="d-flex justify-content-center">
                                        <div class="upload-file">
                                            <input type="file" name="profile_image" class="upload-file__input" accept=".jpg, .jpeg, .png" required>
                                            <div class="upload-file__img w-auto h-auto">
                                                <img width="150"
                                                     src="{{asset('assets/admin-module/img/media/upload-file.png')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <p class="opacity-75 mx-auto max-w220">{{translate('File Format - jpg, png, jpeg')}}
                                        {{translate('Image Size - Maximum Size 5 MB.')}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card overflow-visible mt-3">
                    <div class="card-body">
                        <h5 class="text-primary text-uppercase mb-4">{{translate('account_information')}}</h5>

                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <div class="d-flex flex-column">
                                    <label for="phone_number" class="mb-2">{{translate('phone')}} <span
                                            class="text-danger">*</span></label>
                                    <div class="mb-4">
                                        <input type="tel" pattern="[0-9]{1,14}" value="{{old('phone')}}" required
                                               id="phone_number" class="form-control w-100 text-dir-start"
                                               placeholder="{{translate('Ex: xxxxx xxxxxx')}}">
                                        <input type="hidden" id="phone_number-hidden-element" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 input-group_tooltip">
                                    <label for="password" class="mb-2">{{translate('password')}}</label>
                                    <input type="password" name="password" id="password" required class="form-control"
                                           placeholder="{{ translate('ex') }}: ********">
                                    <i id="password-eye" class="mt-3 bi bi-eye-slash-fill text-primary tooltip-icon"
                                       data-bs-toggle="tooltip" data-bs-title=""></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 input-group_tooltip">
                                    <label for="confirm_password"
                                           class="mb-2">{{translate('confirm_password')}}</label>
                                    <input type="password" name="confirm_password" required id="confirm_password"
                                           class="form-control" placeholder="{{ translate('ex') }}: ********">
                                    <i id="conf-password-eye"
                                       class="mt-3 bi bi-eye-slash-fill text-primary tooltip-icon"
                                       data-bs-toggle="tooltip" data-bs-title=""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="text-primary text-uppercase mb-4">{{translate('upload_Other_Documents')}}</h5>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="upload-file file__input" id="file__input">
                                <input type="file" class="upload-file__input2" multiple="multiple"
                                       name="other_documents[]">
                                <div class="">
                                    <div class="upload-box rounded media gap-4 align-items-center p-4 px-lg-5">
                                        <i class="bi bi-cloud-arrow-up-fill fs-20"></i>
                                        <div class="media-body">
                                            <p class="text-muted mb-2 fs-12">{{translate('upload')}}</p>
                                            <h6 class="fs-12">{{translate('file_or_image')}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-3">
                    <button class="btn btn-primary" type="submit">{{translate('save')}}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- End Main Content -->

@endsection

@push('script')
    <link href="{{ asset('assets/admin-module/css/intlTelInput.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/admin-module/js/intlTelInput.min.js') }}"></script>
    <script src="{{asset('assets/admin-module/js/spartan-multi-image-picker.js')}}"></script>
    <script src="{{asset('assets/admin-module/js/password.js')}}"></script>

    <script>
        "use strict";
        initializePhoneInput("#phone_number", "#phone_number-hidden-element");

        $("#multi_image_picker").spartanMultiImagePicker({
                fieldName: 'identity_images[]',
                maxCount: 2,
                rowHeight: '130px',
                groupClassName: 'upload-file__img upload-file__img_banner',
                placeholderImage: {
                    image: "{{asset('assets/admin-module/img/media/banner-upload-file.png')}}",
                    width: '100%',
                },

                onRenderedPreview: function (index) {
                    toastr.success('{{translate('image_added')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('{{translate('please_only_input_png_or_jpg_type_file')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('{{translate('file_size_too_big')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            }
        );
    </script>
@endpush
