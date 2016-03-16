<?php
/**
 * Class that operate on table 'location'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class LocationMySqlDAO implements LocationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LocationMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM location WHERE LOCATION_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM location';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM location ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param location primary key
 	 */
	public function delete($LOCATION_ID){
		$sql = 'DELETE FROM location WHERE LOCATION_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($LOCATION_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LocationMySql location
 	 */
	public function insert($location){
		$sql = 'INSERT INTO location (ADDRESS_1, ADDRESS_2, CITY, STATE_CODE, ZIP) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($location->aDDRESS1);
		$sqlQuery->set($location->aDDRESS2);
		$sqlQuery->set($location->cITY);
		$sqlQuery->set($location->sTATECODE);
		$sqlQuery->set($location->zIP);

		$id = $this->executeInsert($sqlQuery);	
		$location->lOCATIONID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LocationMySql location
 	 */
	public function update($location){
		$sql = 'UPDATE location SET ADDRESS_1 = ?, ADDRESS_2 = ?, CITY = ?, STATE_CODE = ?, ZIP = ? WHERE LOCATION_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($location->aDDRESS1);
		$sqlQuery->set($location->aDDRESS2);
		$sqlQuery->set($location->cITY);
		$sqlQuery->set($location->sTATECODE);
		$sqlQuery->set($location->zIP);

		$sqlQuery->setNumber($location->lOCATIONID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM location';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByADDRESS1($value){
		$sql = 'SELECT * FROM location WHERE ADDRESS_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByADDRESS2($value){
		$sql = 'SELECT * FROM location WHERE ADDRESS_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCITY($value){
		$sql = 'SELECT * FROM location WHERE CITY = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySTATECODE($value){
		$sql = 'SELECT * FROM location WHERE STATE_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZIP($value){
		$sql = 'SELECT * FROM location WHERE ZIP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByADDRESS1($value){
		$sql = 'DELETE FROM location WHERE ADDRESS_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByADDRESS2($value){
		$sql = 'DELETE FROM location WHERE ADDRESS_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCITY($value){
		$sql = 'DELETE FROM location WHERE CITY = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySTATECODE($value){
		$sql = 'DELETE FROM location WHERE STATE_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZIP($value){
		$sql = 'DELETE FROM location WHERE ZIP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LocationMySql 
	 */
	protected function readRow($row){
		$location = new Location();
		
		$location->lOCATIONID = $row['LOCATION_ID'];
		$location->aDDRESS1 = $row['ADDRESS_1'];
		$location->aDDRESS2 = $row['ADDRESS_2'];
		$location->cITY = $row['CITY'];
		$location->sTATECODE = $row['STATE_CODE'];
		$location->zIP = $row['ZIP'];

		return $location;
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
	 * @return LocationMySql 
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