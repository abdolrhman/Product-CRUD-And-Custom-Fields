<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$products = Product::all();
		return view('product.index', compact("products"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view($view = 'product.create', $data = [], $mergeData = []);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductStoreRequest $request) {
		$validated = $request->validated();
		if ($request->hasFile('image')) {
			try {
				$image = $request->file('image');
				$imageName = $image->getClientOriginalName();
				$fileName = $request->name . "_profile_" . $request->code . "_" . $imageName;

				$directory = public_path('images');
				$imageUrl = $directory . $fileName;
				if (!file_exists($directory)) {
					mkdir($directory, 666, true);
				}
				Image::make($image)->resize(200, 200)->save($imageUrl);
				$validated['image'] = $fileName;
			} catch (Exception $e) {
				dd($e);
			}
		}

		$product = Product::create($validated);
		return redirect('/products')->with('success', 'Product is successfully saved');
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
		$product = Product::findOrFail($id);

		return view('product.edit', compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProductUpdateRequest $request, $id) {
		$product = Product::whereId($id)->first();
		if ($request->hasFile('image')) {
			try {
				Storage::delete($product->image);
				$image = $request->file('image');
				$imageName = $image->getClientOriginalName();
				$fileName = $product->name . "_profile_" . $product->code . "_" . $imageName;

				$directory = public_path('image');
				$imageUrl = $directory . $fileName;
				Image::make($image)->resize(200, 200)->save($imageUrl);
				$request->image = $fileName;
			} catch (Exception $e) {
				dd($e);
			}
		}
		$img = empty($request->image) ? $product->image : $request->image;
		$product->update([
			'name' => $request->name,
			'code' => $request->code,
			'price' => $request->price,
			'description' => $request->description,
			'image' => $img,
		]);
		return redirect('/products')->with('success', 'Product is successfully updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$product = Product::findOrFail($id);
		$product->delete();

		return redirect('/products')->with('success', 'Product is successfully deleted');
	}
}
