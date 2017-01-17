<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	// ********** Main Home Controller //

	public function home(){
		try{

			$settings = Setting::first();
			if($settings){				
				$search = Input::get('search');
				$aSlideshows = Media::where('active', '=', 1)
				->where('category_id', '=', 1)
				->orderBy('created_at', 'desc')->paginate(Config::get('site.num_results_per_page'));
				// sản phẩm mới 
				$aProductNew = Product::get_products(array('limit'=> 4, 'featured'=> 0));
				// sản phẩm nổi bật
				$aProductFeatured = Product::get_products(array('limit'=> 4, 'featured'=> 1));
				// sản phẩm hot
				$aProductHot = Product::get_products(array('limit'=> 4, 'hot'=> 1));
				
				$data = array(
					'page_title'=> 'Trang chủ',
					'aSlideshows' => $aSlideshows,
					'aProductNew' => $aProductNew,
					'aProductFeatured' => $aProductFeatured,
					'aProductHot' => $aProductHot,
					);

				return View::make('home', $data);

			} else {
				throw new Exception('settings not set, first install the script');
			}

		}catch(Exception $e){

			return Redirect::to('install');

		}
	}

}