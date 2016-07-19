<?php
//namespace db;	
class Mymodel extends CI_Model {
	
	var $db,$TABLE;
	
	function __construct(){
		$this->load->model('Mysql');
	//	$this->db=new \db\Mysql;

	//	$this->TABLE= $this->initiate($TABLENAME);
	}

	function initiate($TABLENAME)
	{		
		$this->TABLE = $TABLENAME;
		return $TABLENAME;
	}
	
	function _insert($PERMISSION,$ARRAY){
	
		$COLUMNS=array();
		$VALUES=array();
		foreach( $PERMISSION as $KEY ){
			if( !empty($ARRAY[$KEY]) || !($ARRAY[$KEY]) ){
				$COLUMNS[]="`$KEY`";
				$VALUES[]="'".$this->Mysql->my_escape_string($ARRAY[$KEY])."'";
				
			}
		}
		$COLUMNS=implode(",",$COLUMNS);
		$VALUES=implode(",",$VALUES);
		$QUERY="insert into $this->TABLE ($COLUMNS) values($VALUES)";
		$this->Mysql->query($QUERY);
	
		return $this->Mysql->insert_id();
	}
	
	function _update($PERMISSION,$ARRAY,$WHERE){
		$VALUES=array();
		foreach( $PERMISSION as $KEY ){
			if( !($ARRAY[$KEY]) || !empty($ARRAY[$KEY]) ){
				//echo $ARRAY[$KEY];
				$VALUES[]="`$KEY`='".$this->Mysql->my_escape_string( $ARRAY[$KEY] )."'";
			}
		}
		$VALUES=implode(",",$VALUES);
		$QUERY="update $this->TABLE SET $VALUES WHERE $WHERE";
		return $this->Mysql->query($QUERY);
	}
	
	function get_count( $and, $table ){
		$query = "select count(*) as count from $table where 1=1 $and";
		$this->Mysql->query($query);
		$result = $this->Mysql->nfo();
		return $result;
	}
	
	function get_list( $select, $and, $table ){
		$query = "select $select from $table where 1=1 $and";
		$this->Mysql->query($query);
		$result = $this->Mysql->fetch_all_arrays();
		return $result;
	}
	
	function get_list_by_join( $select, $table, $join_table, $on, $and ){
		$query = "select $select from $table
		inner join $join_table on $on
		where 1=1 $and";
		$this->Mysql->query($query);
		//echo $query;
		$result = $this->Mysql->fetch_all_arrays();
		return $result;
	}
	
	function get_list_by_join2( $select, $table, $join_table1, $on1, $join_table2, $on2, $and ){
		$query = "select ".$select." from $table
		inner join $join_table1 on $on1
		inner join $join_table2 on $on2
		where 1=1 $and";
		$this->Mysql->query($query);
		$result = $this->Mysql->fetch_all_arrays();
		return $result;
	}
	
	function userInsert( $table, $perm, $array ){
		
		$this->TABLE = $table;
		if ( $this->_insert($perm,$array) == 0 )
			return false;
		
		return true;
	}
	
	function userUpdate( $table, $perm, $array ){
		$this->TABLE = $table;
		$where = "idx = '".$array['idx']."'";
		$this->_update($perm,$array,$where);
		return $this->Mysql->affected_rows();
	}
	
	function userDelete( $table, $where ){
		$query = "delete from $table where $where";
		$this->Mysql->query($query);
		return $this->Mysql->affected_rows();
	}
	
}

?>