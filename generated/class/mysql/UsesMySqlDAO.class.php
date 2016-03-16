<?php
/**
 * Class that operate on table 'uses'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class UsesMySqlDAO implements UsesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uses WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uses';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uses ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param use primary key
 	 */
	public function delete($USES_ID){
		$sql = 'DELETE FROM uses WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($USES_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsesMySql use
 	 */
	public function insert($use){
		$sql = 'INSERT INTO uses (INV_ID, EMP_ID, DATE_USED, WORK_DESC) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($use->iNVID);
		$sqlQuery->setNumber($use->eMPID);
		$sqlQuery->set($use->dATEUSED);
		$sqlQuery->set($use->wORKDESC);

		$id = $this->executeInsert($sqlQuery);	
		$use->uSESID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsesMySql use
 	 */
	public function update($use){
		$sql = 'UPDATE uses SET INV_ID = ?, EMP_ID = ?, DATE_USED = ?, WORK_DESC = ? WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($use->iNVID);
		$sqlQuery->setNumber($use->eMPID);
		$sqlQuery->set($use->dATEUSED);
		$sqlQuery->set($use->wORKDESC);

		$sqlQuery->setNumber($use->uSESID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uses';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByINVID($value){
		$sql = 'SELECT * FROM uses WHERE INV_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEMPID($value){
		$sql = 'SELECT * FROM uses WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDATEUSED($value){
		$sql = 'SELECT * FROM uses WHERE DATE_USED = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWORKDESC($value){
		$sql = 'SELECT * FROM uses WHERE WORK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByINVID($value){
		$sql = 'DELETE FROM uses WHERE INV_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEMPID($value){
		$sql = 'DELETE FROM uses WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDATEUSED($value){
		$sql = 'DELETE FROM uses WHERE DATE_USED = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWORKDESC($value){
		$sql = 'DELETE FROM uses WHERE WORK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsesMySql 
	 */
	protected function readRow($row){
		$use = new Use();
		
		$use->uSESID = $row['USES_ID'];
		$use->iNVID = $row['INV_ID'];
		$use->eMPID = $row['EMP_ID'];
		$use->dATEUSED = $row['DATE_USED'];
		$use->wORKDESC = $row['WORK_DESC'];

		return $use;
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
	 * @return UsesMySql 
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