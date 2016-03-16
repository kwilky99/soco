<?php
/**
 * Class that operate on table 'ago_type'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class AgoTypeMySqlDAO implements AgoTypeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AgoTypeMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ago_type WHERE AGO_TYPE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ago_type';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ago_type ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param agoType primary key
 	 */
	public function delete($AGO_TYPE){
		$sql = 'DELETE FROM ago_type WHERE AGO_TYPE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($AGO_TYPE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AgoTypeMySql agoType
 	 */
	public function insert($agoType){
		$sql = 'INSERT INTO ago_type (TYPE_DESC) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($agoType->tYPEDESC);

		$id = $this->executeInsert($sqlQuery);	
		$agoType->aGOTYPE = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AgoTypeMySql agoType
 	 */
	public function update($agoType){
		$sql = 'UPDATE ago_type SET TYPE_DESC = ? WHERE AGO_TYPE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($agoType->tYPEDESC);

		$sqlQuery->setNumber($agoType->aGOTYPE);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ago_type';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTYPEDESC($value){
		$sql = 'SELECT * FROM ago_type WHERE TYPE_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTYPEDESC($value){
		$sql = 'DELETE FROM ago_type WHERE TYPE_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AgoTypeMySql 
	 */
	protected function readRow($row){
		$agoType = new AgoType();
		
		$agoType->aGOTYPE = $row['AGO_TYPE'];
		$agoType->tYPEDESC = $row['TYPE_DESC'];

		return $agoType;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return AgoTypeMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>