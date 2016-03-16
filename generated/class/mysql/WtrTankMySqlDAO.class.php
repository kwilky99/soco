<?php
/**
 * Class that operate on table 'wtr_tank'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class WtrTankMySqlDAO implements WtrTankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WtrTankMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM wtr_tank WHERE WTR_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM wtr_tank';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM wtr_tank ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wtrTank primary key
 	 */
	public function delete($WTR_TANK_CODE){
		$sql = 'DELETE FROM wtr_tank WHERE WTR_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($WTR_TANK_CODE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WtrTankMySql wtrTank
 	 */
	public function insert($wtrTank){
		$sql = 'INSERT INTO wtr_tank (WTR_TANK_DESC, AMNT) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wtrTank->wTRTANKDESC);
		$sqlQuery->setNumber($wtrTank->aMNT);

		$id = $this->executeInsert($sqlQuery);	
		$wtrTank->wTRTANKCODE = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WtrTankMySql wtrTank
 	 */
	public function update($wtrTank){
		$sql = 'UPDATE wtr_tank SET WTR_TANK_DESC = ?, AMNT = ? WHERE WTR_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($wtrTank->wTRTANKDESC);
		$sqlQuery->setNumber($wtrTank->aMNT);

		$sqlQuery->setNumber($wtrTank->wTRTANKCODE);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM wtr_tank';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByWTRTANKDESC($value){
		$sql = 'SELECT * FROM wtr_tank WHERE WTR_TANK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAMNT($value){
		$sql = 'SELECT * FROM wtr_tank WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByWTRTANKDESC($value){
		$sql = 'DELETE FROM wtr_tank WHERE WTR_TANK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAMNT($value){
		$sql = 'DELETE FROM wtr_tank WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WtrTankMySql 
	 */
	protected function readRow($row){
		$wtrTank = new WtrTank();
		
		$wtrTank->wTRTANKCODE = $row['WTR_TANK_CODE'];
		$wtrTank->wTRTANKDESC = $row['WTR_TANK_DESC'];
		$wtrTank->aMNT = $row['AMNT'];

		return $wtrTank;
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
	 * @return WtrTankMySql 
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