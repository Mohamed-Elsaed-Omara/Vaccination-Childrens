@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الجرعات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاطفال </span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
					<div class="row row-sm">
						<div class="col-xl-12">
							<div class="card">
								@if (session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif
								<div class="card-body">
									<div class="table-responsive">
										<table class="table mg-b-0 text-md-nowrap">
											<thead>
												<tr>
													<th>#</th>
													<th>اسم الجرعة</th>
													<th>التاريخ</th>
													<th>الحالة</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$i=1;	
													?>
												@foreach ($doses as $dose)
													
												<tr>
													<th>{{ $i++ }}</th>
													<td>{{ $dose->vaccine->name }}</td>
													<td>{{ $dose->doses_date }}</td>
													<td>
														<i class="fas fa-{{ $dose->status ? 'check' : 'times' }}-circle {{ $dose->status ? 'text-success' : 'text-danger' }}"></i>
													</td>
													<td>
														<form action="{{ url('/check-dose') }}" method="GET">
															<input  type="checkbox" {{ $dose->status ? 'checked' : '' }} {{ $dose->status ? 'disabled' : '' }} name="doses_id[]" value="{{ $dose->id }}">
													</td>
												</tr>
												@endforeach
												<tr>
													<td>

														<button type="submit"  class="btn btn-primary text-center"> حفظ</button>
													</td>
												</tr>
											</form>
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection