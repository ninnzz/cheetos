<?php
	class db_handler implements data_handler{
		private $host; 
		private $username; 
		private $password; 
		private $db_name;
		private $query; 
		
		function __construct($h,$uname,$pass,$db_name) {
       		$this->host = $h;
       		$this->username = $uname;
       		$this->password = $pass;
       		$this->db_name = $db_name;
   		}


   		private function extract_column($data)
   		{	
   			$str = "";
   			foreach ($data as $d) {
   				$str .= $d.' ,';
   			}
   			return rtrim($str,',');
   		}

   		private function get_wher_clause($data)
   		{
			// $str = ''; 
   // 			while ($val = current($data)) {
			    
   // 				$str .= key($array)
			//     if ($fval == 'apple') {
			//         echo key($array).'<br />';
			//     }
			//     next($array);
			// }

   		}
		public function query($query)
		{
			$row_count = 0;
			$res = array();

			$data = $data?$this->extract_column($data):' * ';

			$link = mysqli_connect($this->host,$this->username ,$this->password,$this->db_name) or die('Database Connection Error');

			if($link->connect_errno > 0){
				$err = $link->connect_error;
				$link->close() or die('no links to close');
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}
			$link->autocommit(FALSE);
	
			if(!$result = $link->query($query)){
				$err = $link->error;
				$link->close();
 				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}

			while($row = $result->fetch_assoc()){
  		 		array_push($res, $row);
			}
			$cnt = $result->num_rows;

			$result->free();
			$link->commit();
			$link->close() or die('no links to close');
			return(array('result' => $res, 'result_count'=>$cnt));

		}

		public function get($table=NULL,$data=NULL,$offset=0,$limit=10,$sort=NULL,$order=NULL,$where=NULL)
		{
			$row_count = 0;
			$res = array();

			if(!$table){
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Error :: Unknown table", 1);
			}
			$data = $data?$this->extract_column($data):' * ';


			$link = mysqli_connect($this->host,$this->username ,$this->password,$this->db_name) or die('Database Connection Error');

			if($link->connect_errno > 0){
				$err = $link->connect_error;
				$link->close() or die('no links to close');
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}
			$link->autocommit(FALSE);
	
			$query_message = "SELECT {$data} FROM {$table} ";
			if(!empty($where)){
				$query_message .= " WHERE {$where} ";
			}

			if($order != NULL){
				$query_message .= "ORDER BY {$order} desc ";
			}

			$query_message .= "LIMIT {$offset}, {$limit}";

			$query_message .= ';';

			if(!$result = $link->query($query_message)){
				$err = $link->error;
				$link->close();
 				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}

			while($row = $result->fetch_assoc()){
  		 		array_push($res, $row);
			}
			$cnt = $result->num_rows;

			$result->free();
			$link->commit();
			$link->close() or die('no links to close');
			return(array('result' => $res, 'result_count'=>$cnt, 'query'=>$query_message));
		}

		public function get_where($table=NULL,$data=NULL,$where=NULL,$offset=0,$limit=10,$sort=NULL,$order=NULL)
		{

			$row_count = 0;
			$res = array();

			if(!$table){
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Error :: Unknown table", 1);
			}
			$data = $data?$this->extract_column($data):' * ';
			// $where = ($where)?get_wher_clause($data):'';

			$link = mysqli_connect($this->host,$this->username ,$this->password,$this->db_name) or die('Database Connection Error');

			if($link->connect_errno > 0){
				$err = $link->connect_error;
				$link->close() or die('no links to close');
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}
			$link->autocommit(FALSE);
	
			$query_message = "SELECT {$data} FROM {$table} {$where}";


			if($order != NULL){
				$query_message .= "ORDER BY {$order} desc ";
			}

			//$query_message .= "LIMIT {$offset}, {$limit}";

			$query_message .= ';';

			if(!$result = $link->query($query_message)){
				$err = $link->error;
				$link->close();
 				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}

			while($row = $result->fetch_assoc()){
  		 		array_push($res, $row);
			}
			$cnt = $result->num_rows;

			$result->free();
			$link->commit();
			$link->close() or die('no links to close');
			return(array('result' => $res, 'result_count'=>$cnt));
		}

		public function insert($table=NULL,$data=NULL)
		{
			$query_message = '';
			$row_count = 0;
			$res = array();

			if(!$table){
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Error :: Unknown table", 1);
			}
			if(!$data){
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Error :: No data to insert", 1);	
			}

			// $link = mysqli_connect(DBConfig::DB_HOST, DBConfig::DB_USERNAME, DBConfig::DB_PASSWORD, DBConfig::DB_NAME) or die('Database Connection Error');
			$link = mysqli_connect($this->host,$this->username ,$this->password,$this->db_name) or die('Database Connection Error');
			if($link->connect_errno > 0){
    			$err = $link->connect_error;
				$link->close() or die('no links to close');
 				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}
			$link->autocommit(FALSE);

			$query_message = "INSERT into {$table} values({$data});";
			
			if(!$result = $link->query($query_message)){
				$err = $link->error;
				$errNo = $link->errno;
				$affected = $link->affected_rows;
				$link->close();
 				return array('errcode'=>$errNo ,'error'=>$err,'affected_rows'=>$affected);
			}
			$res['affected_rows'] = $link->affected_rows;
			
			$link->commit();
			$link->close() or die('no links to close');
			return($res);

		}

		public function delete($table,$where)
		{

		}

		public function update($table,$data)
		{

		}

		public function update_where($table=NULL,$data=NULL,$where=NULL)
		{
			$query_message = '';
			$row_count = 0;
			$res = array();

			if(!$table){
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Error :: Unknown table", 1);
			}
			if(!$data){
				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Error :: No data to insert", 1);	
			}

			// $link = mysqli_connect(DBConfig::DB_HOST, DBConfig::DB_USERNAME, DBConfig::DB_PASSWORD, DBConfig::DB_NAME) or die('Database Connection Error');
			$link = mysqli_connect($this->host,$this->username ,$this->password,$this->db_name) or die('Database Connection Error');
			if($link->connect_errno > 0){
    			$err = $link->connect_error;
				$link->close() or die('no links to close');
 				header("HTTP/1.0 500 Internal Server Error");
    			throw new Exception("Database Connection Error [" . $err . "]", 1);
			}
			$link->autocommit(FALSE);

			$query_message = "INSERT into {$table} values({$data});";
			
			if(!$result = $link->query($query_message)){
				$err = $link->error;
				$errNo = $link->errno;
				$affected = $link->affected_rows;
				$link->close();
 				return array('errcode'=>$errNo ,'error'=>$err,'affected_rows'=>$affected);
			}
			$res['affected_rows'] = $link->affected_rows;
			
			$link->commit();
			$link->close() or die('no links to close');
			return($res);
		}

		public function update_batch($table, $data=array(),$where=array())
		{

		}

		public function insert_batch($table, $data)
		{

		}







	
	}
?>