<?php
namespace db;	
class myModel{
	
	var $db,$TABLE;
	
	function __construct($TABLENAME){
		$this->db=new \db\Mysql;
		$this->TABLE=$TABLENAME;
	}
	
	function _insert($PERMISSION,$ARRAY){
	
		$COLUMNS=array();
		$VALUES=array();
		foreach( $PERMISSION as $KEY ){
			if( !empty($ARRAY[$KEY]) || !($ARRAY[$KEY]) ){
				$COLUMNS[]="`$KEY`";
				$VALUES[]="'".$this->db->my_escape_string($ARRAY[$KEY])."'";
				
			}
		}
		$COLUMNS=implode(",",$COLUMNS);
		$VALUES=implode(",",$VALUES);
		$QUERY="insert into $this->TABLE ($COLUMNS) values($VALUES)";
		$this->db->query($QUERY);
	
		return $this->db->insert_id();
	}
	
	function _update($PERMISSION,$ARRAY,$WHERE){
		$VALUES=array();
		foreach( $PERMISSION as $KEY ){
			if( !($ARRAY[$KEY]) || !empty($ARRAY[$KEY]) ){
				//echo $ARRAY[$KEY];
				$VALUES[]="`$KEY`='".$this->db->my_escape_string( $ARRAY[$KEY] )."'";
			}
		}
		$VALUES=implode(",",$VALUES);
		$QUERY="update $this->TABLE SET $VALUES WHERE $WHERE";
		return $this->db->query($QUERY);
	}
	
	function get_count( $and, $table ){
		$query = "select count(*) as count from $table where 1=1 $and";
		$this->db->query($query);
		$result = $this->db->nfo();
		return $result;
	}
	
	function get_list( $select, $and, $table ){
		$query = "select $select from $table where 1=1 $and";
		$this->db->query($query);
		$result = $this->db->fetch_all_arrays();
		return $result;
	}
	
	function get_list_by_join( $select, $table, $join_table, $on, $and ){
		$query = "select $select from $table
		inner join $join_table on $on
		where 1=1 $and";
		$this->db->query($query);
		//echo $query;
		$result = $this->db->fetch_all_arrays();
		return $result;
	}
	
	function get_list_by_join2( $select, $table, $join_table1, $on1, $join_table2, $on2, $and ){
		$query = "select ".$select." from $table
		inner join $join_table1 on $on1
		inner join $join_table2 on $on2
		where 1=1 $and";
		$this->db->query($query);
		$result = $this->db->fetch_all_arrays();
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
		return $this->db->affected_rows();
	}
	
	function userDelete( $table, $where ){
		$query = "delete from $table where $where";
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	
}

?>