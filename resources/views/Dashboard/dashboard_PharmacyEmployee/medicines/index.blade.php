@extends('Dashboard.layouts.master')

@section('title')
    {{ trans('Dashboard/main-sidebar_trans.medicines') }}
@stop

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Medicines</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')

    <!-- Filters Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form id="filterForm">
                <div class="row">
                    <!-- Section Filter -->
                    <div class="col-md-3">
                        <label for="section_id">Section</label>
                        <select class="form-control" id="medicine_section_id" name="medicine_section_id">
                            <option value="">All Sections</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">
                                    {{ $section->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Min Price -->
                    <div class="col-md-2">
                        <label for="min_price">Min Price </label>
                        <input type="number" class="form-control" id="min_price" name="min_price" step="0.01" placeholder="Min">
                    </div>

                    <!-- Max Price -->
                    <div class="col-md-2">
                        <label for="max_price">Max Price</label>
                        <input type="number" class="form-control" id="max_price" name="max_price" step="0.01" placeholder="Max">
                    </div>

                    <!-- Search by Name -->
                    <div class="col-md-3">
                        <label for="name">Search By Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Medicine">
                    </div>
                    <!-- Stock Filter -->
<div class="col-md-2">
    <label for="stock">Stock</label>
    <select class="form-control" id="stock" name="stock">
        <option value="">All</option>
        <option value="in_stock">In Stock</option>
        <option value="out_of_stock">Out of Stock</option>
    </select>
</div>



                    <!-- Filter Button -->
                    <div class="col-md-12 mt-3 align-center ">
                        <button type="button" id="filterButton" class="btn btn-primary w-100">
                          Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMedicine">
            Add Medicine
        </button>
    </div>


    <!-- Medicines Table -->
    <div id="medicinesTableContainer">
        @include('Dashboard.dashboard_PharmacyEmployee.medicines.table', ['medicines' => $medicines])
        @foreach ($medicines as $medicine)
        @include('Dashboard.dashboard_PharmacyEmployee.medicines.edit', ['medicine' => $medicine])
        @include('Dashboard.dashboard_PharmacyEmployee.medicines.delete', ['medicine' => $medicine])

    @endforeach
    <div class="mt-3 mb-5">
        {{ $medicines->links('pagination::bootstrap-5') }}
    </div>
    </div>

    <!-- Pagination -->


    <!-- Pagination Links -->


    {{-- <div class="d-flex justify-content-center mt-3" id="paginationContainer">
        {{ $medicines->links() }}
    </div> --}}
@endsection

@section('js')
    <!-- Internal Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Handle filtering
            $('#filterButton').click(function () {
                let formData = $('#filterForm').serialize();
                $.ajax({
                    url: "{{ route('medicines.index') }}",
                    method: 'GET',
                    data: formData,
                    success: function (response) {
                        // Replace medicines table and pagination
                        $('#medicinesTableContainer').html(response.table);
                        $('#paginationContainer').html(response.pagination);
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
            @include('Dashboard.dashboard_PharmacyEmployee.medicines.add')


@endsection
