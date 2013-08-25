<?php

class User extends Eloquent {

	public function vote()
	{
		return $this->has_one('Vote');
	}

  public static $rules = array(
    'name' => 'required',
    'mobile' => 'required',
    'email' => 'required|email',
    'nric' => 'required'
  );

  public static function validate($data)
  {
      return Validator::make($data, static::$rules);
  }

}
