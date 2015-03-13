<?php
/*
 *
 *
 * */
require_once 'config.php';
class mysql_fun{
	private $conn;
	private $result;

	public function __construct(){
		if (!$this->conn=mysql_connect(DB_HOST,DB_USER,DB_PWD)){
			echo '数据库连接失败，可能用户名/密码错误';
		}
		@mysql_query("set names utf-8");//设置字符集
		if (!mysql_select_db("xablog",$this->conn)){
			echo '未找到指定数据库';
		}
	}

	public function query($sql){
		if(!$this->result=mysql_query($sql,$this->conn)){
			echo '查询语句执行错误'.$sql;
			return false;
		}
		else{
			return $this->result;
		}
	}

	public function fetch_array($query){
		return mysql_fetch_array($query);
	}

	public function fetch_row($query){
		return mysql_fetch_row($query);
	}

	function once_fetch_array($sql) {
		$this->result = $this->query($sql);
		return $this->fetch_array($this->result);
	}

	public function close(){
		return @mysql_close($this->conn);
	}
}

?>