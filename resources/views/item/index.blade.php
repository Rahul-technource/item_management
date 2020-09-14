@extends('layouts.app')
@section('title','List')
@section('content')
<div class="content">
	<form role="form" method="post" id="add-item"  enctype="multipart/form-data">
		{{ @csrf_field() }}
		<div class="box-body">
		    <div class="row">
		    	<div class="col-md-12 text-center">
		    		<h1>Items Management Page</h1>
		    	</div>
	        	<div class="col-md-2"></div>
	            <div class="col-md-3">
	            	<div class="form-row" >
	            		<div class="col-10">
	            			<div class="form-group ">
			                    <label>Item name:
			                    <span class="asterisk red">*</span>
			                    </label>
			                    <input type="text" placeholder="Enter Item Name and Click Add" class="form-control item_name" name="item_name" id="item_name">
			                    <div id="item_name_validate"></div> 
			                </div>	             			
	            		</div>
	            		<div class="col-2">
	            			<div class="form-group ">
	            			<label></label>
	            			<button class="mt-2 btn btn-primary" type="submit">Add</button>
	            		</div>
	            		</div>
	            	</div>
	                                
	            </div>
	            <div class="col-md-2"></div>
	        </div>
	    </div>
	</form>
	<div class="box-body main-section">
		<div class="row equal_height">
	    	<div class="col-md-2"></div>
	        <div class="col-md-3 equal_height_container">
	        	<div class="select_box">
	        	<ul>
	        		@foreach($unselected as $key=>$val)
	        			<li class="selected" data-id="{{ $val->id }}">{{ $val->item_name }}</li>
	        		@endforeach
	        	</ul>
	        </div>
	        </div>
	        <div class="col-md-2 text-center">
	        	<button class="btn btn-primary mb-2 add-button" type="submit"><i class="fa fa-arrow-right "></i></button>
	        	<br>
	        	<button class="btn btn-primary remove-button" type="submit"><i class="fa fa-arrow-left "></i></button>
	        </div>
	        <div class="col-md-3 equal_height_container">
	        	<div class="select_box">
		        	<ul>
		        		@foreach($selected as $key=>$val)
		        			<li class="unselected" data-id="{{ $val->id }}">{{ $val->item_name }}</li>
		        		@endforeach
		        	</ul>
	        	</div>
	        </div>
	        <div class="col-md-2"></div>
	    </div>
	</div>
</div>
@endsection
@push('custom-styles')
<!-- Include this Page CSS -->

@endpush
@push('custom-scripts')
<!-- Include this Page JS -->
<script src="{{ url('public/js/item/index.js') }}"></script>
@endpush