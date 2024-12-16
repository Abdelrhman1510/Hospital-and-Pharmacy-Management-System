@extends('Dashboard.layouts.master')

@section('css')
    <!-- Internal Select2 CSS -->
    <link href="{{ URL::asset('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
    Create New Invoice
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Create Invoice</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create New Invoice</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')
    @if ($errors->any())
    <div class="alert alert-danger">

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

    </div>
@endif
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('medicineinvoices.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <!-- Medicines Search -->
                            <div class="form-group">
                                <label>Select Medicines</label>
                                <select id="medicines-select" name="medicines[]" class="form-control select2" multiple="multiple" required>
                                    @foreach($medicines as $medicine)
                                        <option value="{{ $medicine->id }}" data-price="{{ $medicine->price }}">
                                            {{ $medicine->name }} ({{ $medicine->price }} USD) - Stock: {{ $medicine->stock }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quantities Container -->
                            <div id="quantities-container" class="form-group">
                                <!-- Quantity inputs will be dynamically generated here -->
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">
                                Create Invoice
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Select2.min JS -->
    <script src="{{ URL::asset('dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Notify JS -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Initialize Select2 for Medicines
            $('#medicines-select').select2({
                placeholder: "Select Medicines",
                allowClear: true,
                width: '100%'
            });

            // Object to track quantities for selected medicines
            const medicineQuantities = {};

            // Handle changes in medicine selection
            $('#medicines-select').on('change', function () {
                const selectedMedicines = $(this).find('option:selected');
                const quantitiesContainer = $('#quantities-container');

                // Iterate through selected medicines and add/update inputs
                selectedMedicines.each(function () {
                    const medicineId = $(this).val();
                    const medicineName = $(this).text();

                    // If the input doesn't exist, create it
                    if (!medicineQuantities[medicineId]) {
                        medicineQuantities[medicineId] = 1; // Default quantity
                        const inputHTML = `
                            <div class="form-group" id="medicine-${medicineId}">
                                <label>Quantity for ${medicineName}</label>
                                <input type="number" name="quantities[${medicineId}]"
                                       class="form-control quantity-input"
                                       min="1" value="1" data-medicine-id="${medicineId}" required>
                            </div>
                        `;
                        quantitiesContainer.append(inputHTML);
                    }
                });

                // Remove quantity inputs for deselected medicines
                const selectedIds = selectedMedicines.map(function () {
                    return $(this).val();
                }).get();

                Object.keys(medicineQuantities).forEach(function (medicineId) {
                    if (!selectedIds.includes(medicineId)) {
                        $(`#medicine-${medicineId}`).remove();
                        delete medicineQuantities[medicineId];
                    }
                });
            });

            // Update quantity object when input values change
            $(document).on('input', '.quantity-input', function () {
                const medicineId = $(this).data('medicine-id');
                medicineQuantities[medicineId] = $(this).val();
            });
        });
    </script>
@endsection
