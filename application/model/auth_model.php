<?php
class Auth_model extends Kiel_Model{

	public function request_token()
	{
		echo "hehehe";
	}

	public function check_access($app_id)
	{
		return $this->data_handler->get_where('applications',null," WHERE id = '{$app_id}' ",null,null,null,'date_created');
	}
}

?>