<?php
/**
 * Class that operate on table 'state'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class StateMySqlDAO implements StateDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return StateMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM state WHERE STATE_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM state';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM state ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param state primary key
 	 */
	public function delete($STATE_CODE){
		$sql = 'DELETE FROM state WHERE STATE_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($STATE_CODE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param StateMySql state
 	 */
	public function insert($state){
		$sql = 'INSERT INTO state (STATE_DESC) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($state->sTATEDESC);

		$id = $this->executeInsert($sqlQuery);	
		$state->sTATECODE = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param StateMySql state
 	 */
	public function update($state){
		$sql = 'UPDATE state SET STATE_DESC = ? WHERE STATE_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($state->sTATEDESC);

		$sqlQuery->set($state->sTATECODE);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM state';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySTATEDESC($value){
		$sql = 'SELECT * FROM state WHERE STATE_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySTATEDESC($value){
		$sql = 'DELETE FROM state WHERE STATE_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return StateMySql 
	 */
	protected function readRow($row){
		$state = new State();
		
		$state->sTATECODE = $row['STATE_CODE'];
		$state->sTATEDESC = $row['STATE_DESC'];

		return $state;
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
	 * @return StateMySql 
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