<?php

class Category extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'order' => 'required'
	);

	public function totalMedia(){
		return DB::table('products')->where('category_id', '=', $this->id)->count();
	}
}
