@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">اضافة طفل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ادأرة التطعيمات</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
				<div class="row row-sm">
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                        <div class="card  box-shadow-0">
                            <form class="form-horizontal" action="{{ url('Childrens') }}" method="POST">
                                @csrf
							<div class="card-header">
								<h4 class="card-title mb-1">بيانات الاب</h4>
								<p class="mb-2"></p>
							</div>
							<div class="card-body pt-0">
								<form class="form-horizontal" >
									<div class="form-group">
										<input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="الاسم بالكامل" name="name" >
									</div>
									<div class="form-group">
										<input type="text" class="form-control @error('national_id') is-invalid @enderror" id="inputName" placeholder="الرقم القومي" name="national_id">
                                    </div>
									<div class="form-group">
										<input type="tel" class="form-control" id="inputEmail3" placeholder="التليفون" name="phone_number" autocomplete="off" 
                                        required>
                                        @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
									<div class="form-group">
										<input type="text" class="form-control" id="inputPassword3" placeholder="العنوان" name="address">
									</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">بيانات الطفل</h4>
								<p class="mb-2"></p>
							</div>
							<div class="card-body pt-0">
									<div class="form-group">
                                        <label for=""></label>
										<input type="text" class="form-control @error('child_name') is-invalid @enderror" id="inputName" placeholder="الاسم بالكامل" name="child_name">
									</div>
									<div class="form-group">
										<input type="number" class="form-control @error('length') is-invalid @enderror" id="inputEmail3" placeholder="الطول (سم)" name="length">
									</div>
									<div class="form-group">
										<input type="number" class="form-control @error('weight') is-invalid @enderror" id="inputEmail3" placeholder="الوزن (كم)" name="weight">
									</div>

									<div class="row row-sm mg-b-20">
                                        <div class="col-lg-4">
                                            <p class="mg-b-10">النوع</p>
                                            <select class="form-control select2-no-search @error('gender') is-invalid @enderror" name="gender">
                                                <option label="اختر نوع"></option>
                                                <option value="1">ذكر</option>
                                                <option value="2">انثي</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row row-sm mg-b-20">
										<div class="input-group col-md-4">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div>

											<input class="form-control fc-datepicker @error('dateOfbirth') is-invalid @enderror" placeholder="MM/DD/YYYY" type="text" name="dateOfbirth" autocomplete="off">
                                        </div>
                                    </div>
                                    
									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>
											<button type="submit" class="btn btn-primary">حفظ</button>
										</div>
									</div>
                                </form>
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