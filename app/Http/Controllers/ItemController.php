<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;
use Validator;
use Carbon\Carbon;

class ItemController extends Controller
{
	// This function is for the view Index page
    public function index()
    {
    	try {
    		$unselected = ItemModel::where('is_selected','=','0')->get();
    		$selected = ItemModel::where('is_selected','=','1')->get();
    		return view('item.index',compact('unselected','selected'));
    	} catch (Exception $e) {
    		dd($e->getMessage());
    	}
    }

    // This function is for the Add new Item
    public function add(Request $request)
    {
    	try {
	    	$input = $request->all();    	
	    	$validator = Validator::make($request->all(), [
		          'item_name' => 'required|unique:items',
		    ]);
			if ($validator->fails()) {
			      return response()->json(['code' => 201,'message'=>$validator->messages()->first()]);
			}

			$item = new ItemModel;
			$item->item_name = $input['item_name'];
			$item->is_selected = '0';
			$item->created_date = Carbon::now();
			$item->created_by = '1';
			$item->updated_date = Carbon::now();
			$item->updated_by = '1';
			if($item->save()){
				$unselected = ItemModel::where('is_selected','=','0')->get();
    			$selected = ItemModel::where('is_selected','=','1')->get();
		    	$view = view('item.ajax_view',compact('unselected','selected'))->render();
				return response()->json(['code' => 200,'message'=>"List Added Successfully",'view'=>$view]);
			}else{
				return response()->json(['code' => 201,'message'=>"Something Wrong"]);
			}
		} catch (Exception $e) {
    		return response()->json(['code' => 201,'message'=>$e->getMessage()]);
    	}	
    }

    // This function is for Add Selected View
    public function addselected(Request $request)
    {
    	try {
		    	$input = $request->all();

		    	$update = ItemModel::whereIn('id',$input['selected'])->update(['is_selected'=>'1']);
		    	$unselected = ItemModel::where('is_selected','=','0')->get();
    			$selected = ItemModel::where('is_selected','=','1')->get();
		    	$view = view('item.ajax_view',compact('unselected','selected'))->render();
		    	return response()->json(['code' => 200,'message'=>"Update Successfully",'view'=>$view]);
			} catch (Exception $e) {
    		return response()->json(['code' => 201,'message'=>$e->getMessage()]);
    	}	
    }

    // This function is for Remove Selected View
    public function removeselected(Request $request)
    {
    	try {
		    	$input = $request->all();

		    	$update = ItemModel::whereIn('id',$input['selected'])->update(['is_selected'=>'0']);
		    	$unselected = ItemModel::where('is_selected','=','0')->get();
    			$selected = ItemModel::where('is_selected','=','1')->get();
		    	$view = view('item.ajax_view',compact('unselected','selected'))->render();
		    	return response()->json(['code' => 200,'message'=>"Update Successfully",'view'=>$view]);
			} catch (Exception $e) {
    		return response()->json(['code' => 201,'message'=>$e->getMessage()]);
    	}	
    }

    
}
