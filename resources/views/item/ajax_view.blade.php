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