<?php
namespace app\api\validate;
use think\Validate;
use think\Request;
use think\Exception;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate {
	public function goCheck() {
		$request = Request::instance();
		$params = $request->param();
		$result = $this->check($params);
		if (!$result) {
			$e = new ParameterException([
				'msg'	=> $this->error,
			]);
			throw $e;
		} else {
			return true;
		}
	}

}