@extends('Dashboard.layouts.master')

@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
                            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Controll Room</h2>

						</div>
					</div>
					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Single Services Count</label>
							<h5>{{\App\Models\Service::count()}}</h5>
						</div>
						<div>
							<label class="tx-13">Group Services Count</label>
							<h5>{{\App\Models\Group::count()}}</h5>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3  pr-3 pb-2 pt-3">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Doctor Count</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
                                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Doctor::count()}}</h4>

										</div>

									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3  pr-3 pb-2 pt-3">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Patient Count</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
                                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Patient::count()}}</h4>

										</div>

									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3  pr-3 pb-2 pt-3">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Section Count</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
                                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Section::count()}}</h4>

										</div>

										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>

                    </div>

				</div>
                <div class="row ">
                    <div class="col-xl-12 col-lg-6 col-md-6 col-xm-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Doctors by Section</h6>
                                <canvas id="doctorChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>



				<!-- row closed -->



				</div>

				<!-- row close -->

				<!-- row opened -->

				<!-- /row -->
			</div>

		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('Dashboard/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('Dashboard/js/index.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/jquery.vmap.sampledata.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch the doctor data
    const doctorData = @json(\App\Models\Section::withCount('doctors')->get(['name', 'doctors_count']));

    // Map section names and doctor counts
    const labels = doctorData.map(section => section.name);
    const data = doctorData.map(section => section.doctors_count);

    // Get the chart context
    const ctx = document.getElementById('doctorChart').getContext('2d');

    // Create the bar chart
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doctors Count',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                x: {
                    ticks: {
                        maxRotation: 45, // Adjust rotation for readability
                        minRotation: 0
                    }
                },
                y: {

                    ticks: {
                        beginAtZero: true,

                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    }
                }
            }
        }
    });
});

</script>





@endsection
