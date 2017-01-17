<?php

class ProductsController extends BaseController {

	/**
	 * Product Repository
	 *
	 * @var Product
	 */
	protected $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($category_slug)
	{
		$Products = Product::all();
		$cat_id = 0;

		foreach($Products as $product){
			if($product->name == $category_slug || strtolower($product->name) == $category_slug){
				$cat_id = $product->id;
				break;
			}
		}
		$data = array(
			
			);

		return View::make('home', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return View::make('Products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Product::$rules);
		$valid_pic = false;
		if(isset($input['image']) && !empty($input['image'])){
			$valid_pic = true;
		}

		if ($validation->passes() && $valid_pic)
		{
			if(isset($input['featured']))
			{
				$input['featured'] = 1;
			}
			else
				$input['featured'] = 0;
			
			if(isset($input['hot']))
			{
				$input['hot'] = 1;
			}
			else
				$input['hot'] = 0;
			$input['image'] = ImageHandler::uploadImage(Input::file('image'), 'images');
			$this->product->create($input);

			return Redirect::to('admin?section=products')->with(array('note' => 'Cập nhật thành công!', 'note_type' => 'success'));
		}

		return Redirect::to('admin?section=products')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}
	
	public function listcat($category_slug)
	{
		$categories = Category::all();
		$cat_id = 0;

		foreach($categories as $category){
			if($category->name == $category_slug || strtolower($category->name) == $category_slug){
				$cat_id = $category->id;
				$cat_name = $category->name;
				break;
			}
		}
		$aProducts = Product::get_products(array('category_id'=> $cat_id));

		$data = array(
			'aProducts' => $aProducts,
			'cat_name' => $cat_name,
			);

		return View::make('products.show', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($alias)
	{
		$aProduct = Product::get_products(array('alias'=> $alias),'',true);
		$aProductsRelates = Product::get_products(array('category_id'=> $aProduct->category_id));

		return View::make('products.detail', array('product'=> $aProduct, 'aProductsRelates'=> $aProductsRelates));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = $this->product->find($id);

		if (is_null($product))
		{
			return Redirect::route('Products.index');
		}

		return View::make('Products.edit', compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Product::$rules);
		if ($validation->passes())
		{
			$product = $this->product->find($id);
			if(isset($input['image'])){
				$input['image'] = ImageHandler::uploadImage(Input::file('image'), 'images');
			}else
				$input['image'] = $product->image;
			if(isset($input['featured'. $id]))
			{
				$input['featured'] = 1;
				unset($input['featured'. $id]);
			}
			else
				$input['featured'] = 0;
			
			if(isset($input['hot'. $id]))
			{
				$input['hot'] = 1;
				unset($input['hot'. $id]);
			}
			else
				$input['hot'] = 0;
			
			$product->update($input);

			return Redirect::to('admin?section=products')->with(array('note' => 'Cập nhật thành công!', 'note_type' => 'success'));;
		}

		return Redirect::to('admin?section=products', $id)
			->withInput()
			->withErrors($validation)
			->with('message', Lang::get('lang.validation_errors'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$product = Product::find()->where('id', '=', $id)->get();
		foreach($product as $single_media){
			$single_media->product_id = 1;
			$single_media->save();
		}
		$product->delete();

		return Redirect::to('admin?section=products')->with(array('note' => 'Cập nhật thành công', 'note_type' => 'success'));
	}

}
