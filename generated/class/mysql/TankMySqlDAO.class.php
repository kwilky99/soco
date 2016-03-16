<?php
/**
 * Class that operate on table 'tank'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class TankMySqlDAO implements TankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TankMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tank WHERE TANK_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tank';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tank ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tank primary key
 	 */
	public function delete($TANK_ID){
		$sql = 'DELETE FROM tank WHERE TANK_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($TANK_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TankMySql tank
 	 */
	public function insert($tank){
		$sql = 'INSERT INTO tank (LEASE_ID, STRAP) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tank->lEASEID);
		$sqlQuery->set($tank->sTRAP);

		$id = $this->executeInsert($sqlQuery);	
		$tank->tANKID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TankMySql tank
 	 */
	public function update($tank){
		$sql = 'UPDATE tank SET LEASE_ID = ?, STRAP = ? WHERE TANK_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tank->lEASEID);
		$sqlQuery->set($tank->sTRAP);

		$sqlQuery->setNumber($tank->tANKID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tank';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLEASEID($value){
		$sql = 'SELECT * FROM tank WHERE LEASE_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySTRAP($value){
		$sql = 'SELECT * FROM tank WHERE STRAP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLEASEID($value){
		$sql = 'DELETE FROM tank WHERE LEASE_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySTRAP($value){
		$sql = 'DELETE FROM tank WHERE STRAP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TankMySql 
	 */
	protected function readRow($row){
		$tank = new Tank();
		
		$tank->tANKID = $row['TANK_ID'];
		$tank->lEASEID = $row['LEASE_ID'];
		$tank->sTRAP = $row['STRAP'];

		return $tank;
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
	 * @return TankMySql 
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