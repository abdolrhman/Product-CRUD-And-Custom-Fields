<?php

namespace App\Http\Controllers;

use App\CustomFields;
use App\Product;
use Illuminate\Http\Request;

class CustomFieldController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$custom_fields = CustomFields::with('product')->get();

        return view('customField.index', compact('custom_fields'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
        $products = Product::all();
		return view($view = 'customField.create', compact('products'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$customField = CustomFields::create($request->all());
        return redirect('/custom_fields')->with('success', 'Custom Field for Product is successfully saved');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
        $custom_field = CustomFields::findOrFail($id);
        $custom_field_product =  $custom_field->Product;
        $products = Product::all();
        return view($view = 'customField.edit', compact('custom_field', 'custom_field_product', 'products'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
        CustomFields::whereId($id)->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description
        ]);		
        return redirect('/custom_fields')->with('success', 'CustomField is successfully updated');	
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
