<?php

class Product extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);

	public function category(){
		return $this->belongsTo('Category');
	}
	
	public function totalProduct(){
		return DB::table('products')->count();
	}
	
	public static function get_products($filters = array(),$counting = false, $getOne = false)
	{
		$result = DB::table('products');
		
		if (isset($filters['featured'])){
			$result->where('featured', $filters['featured']);
		}
		
		if (isset($filters['alias'])){
			$result->where('alias', $filters['alias']);
		}
		
		if (isset($filters['category_id'])){
			$result->where('category_id', $filters['category_id']);
		}
		
		if($getOne)
		{
			$result->skip(0)->take(1);
			return $result->first();
		}
		else{
			if (isset($filters['limit'])) {
				$offset = (isset($filters['page'])) ? $filters['page'] : 0;
				$result->skip($offset)->take($filters['limit']);
			}
		}
		
		if($counting !=false){
			$iTotal = $result->count();
			if ($iTotal == 0) {
				return false;
			}
			else
				return $iTotal;
		}
		
		$products = array();
		
		foreach ($result->get() as $row){
			
			$products[] = $row;
		}
		return $products;
	}
}
