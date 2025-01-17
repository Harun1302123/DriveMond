@section('title', 'Vehicle Category')

@extends('adminmodule::layouts.master')

@push('css_or_js')
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-12">

                    <div class="d-flex flex-wrap justify-content-between align-items-center my-3 gap-3">
                        <h2 class="fs-22 text-capitalize">{{ translate('deleted_category_list') }}</h2>

                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted text-capitalize">{{ translate('total_category') }} : </span>
                            <span class="text-primary fs-16 fw-bold">{{ $categories->total() }}</span>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="all-tab-pane" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-top d-flex flex-wrap gap-10 justify-content-between">
                                        <form action="javascript:;"
                                              class="search-form search-form_style-two" method="GET">
                                            <div class="input-group search-form__input_group">
                                                <span class="search-form__icon">
                                                    <i class="bi bi-search"></i>
                                                </span>
                                                <input type="search" class="theme-input-style search-form__input"
                                                       value="{{request()->get('search')}}" name="search" id="search"
                                                       placeholder="{{translate('search_here_by_Category_Name')}}">
                                            </div>
                                            <button type="submit"
                                                    class="btn btn-primary search-submit" data-url="{{ url()->full() }}">{{ translate('search') }}</button>
                                        </form>

                                    </div>

                                    <div class="table-responsive mt-3">
                                        <table class="table table-borderless align-middle">
                                            <thead class="table-light align-middle">
                                            <tr>
                                                <th>{{ translate('SL') }}</th>
                                                <th class="text-capitalize name">{{ translate('category_name') }}</th>
                                                <th class="text-capitalize total-vehicle">{{ translate('total_vehicle') }}</th>
                                                <th class="text-center action">{{ translate('action') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($categories as $category)
                                                <tr id="hide-row-{{$category->id}}">
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td class="name">{{ $category->name }}</td>
                                                    <td class="total-vehicle">{{ $category->vehicles->count() }}</td>
                                                    <td class="action">
                                                        <div
                                                            class="d-flex justify-content-center gap-2 align-items-center">
                                                            <button
    data-route="{{ route('admin.vehicle.attribute-setup.category.restore', ['id' => $category->id]) }}"
    data-message="{{ translate('Want_to_recover_this_category?_') . translate('if_yes,_this_category_will_be_available_again_in_the_Category_List')}}"
    class="btn btn-outline-primary btn-action restore-data">
    <i class="bi bi-arrow-repeat"></i>
</button>
                                                            <button
                                                                data-id="delete-{{ $category->id }}" data-message="{{ translate('want_to_permanent_delete_this_category?') }} {{translate('you_cannot_revert_this_action')}}"
                                                                type="button" class="btn btn-outline-danger btn-action form-alert">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>

                                                            <form
                                                                action="{{ route('admin.vehicle.attribute-setup.category.permanent-delete', ['id'=>$category->id]) }}"
                                                                id="delete-{{ $category->id }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="d-flex flex-column justify-content-center align-items-center gap-2 py-3">
                                                            <img src="{{ asset('assets/admin-module/img/empty-icons/no-data-found.svg') }}" alt="" width="100">
                                                            <p class="text-center">{{translate('no_data_available')}}</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {!! $categories->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection

@push('script')
    <script>
        "use strict";
        let selectBox = document.getElementById('category_type');

        // Add the 'required' attribute to the select box
        selectBox.attr('required', 'required');

    </script>
@endpush
