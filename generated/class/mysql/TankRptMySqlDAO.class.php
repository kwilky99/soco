<?php
/**
 * Class that operate on table 'tank_rpt'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class TankRptMySqlDAO implements TankRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TankRptMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tank_rpt WHERE TANK_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tank_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tank_rpt ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tankRpt primary key
 	 */
	public function delete($TANK_RPT_ID){
		$sql = 'DELETE FROM tank_rpt WHERE TANK_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($TANK_RPT_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TankRptMySql tankRpt
 	 */
	public function insert($tankRpt){
		$sql = 'INSERT INTO tank_rpt (TANK_ID, EMP_ID, TANK_RPT_DATE, GAUGE_FT, GAUGE_IN) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tankRpt->tANKID);
		$sqlQuery->setNumber($tankRpt->eMPID);
		$sqlQuery->set($tankRpt->tANKRPTDATE);
		$sqlQuery->setNumber($tankRpt->gAUGEFT);
		$sqlQuery->set($tankRpt->gAUGEIN);

		$id = $this->executeInsert($sqlQuery);	
		$tankRpt->tANKRPTID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TankRptMySql tankRpt
 	 */
	public function update($tankRpt){
		$sql = 'UPDATE tank_rpt SET TANK_ID = ?, EMP_ID = ?, TANK_RPT_DATE = ?, GAUGE_FT = ?, GAUGE_IN = ? WHERE TANK_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tankRpt->tANKID);
		$sqlQuery->setNumber($tankRpt->eMPID);
		$sqlQuery->set($tankRpt->tANKRPTDATE);
		$sqlQuery->setNumber($tankRpt->gAUGEFT);
		$sqlQuery->set($tankRpt->gAUGEIN);

		$sqlQuery->setNumber($tankRpt->tANKRPTID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tank_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTANKID($value){
		$sql = 'SELECT * FROM tank_rpt WHERE TANK_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEMPID($value){
		$sql = 'SELECT * FROM tank_rpt WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTANKRPTDATE($value){
		$sql = 'SELECT * FROM tank_rpt WHERE TANK_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGAUGEFT($value){
		$sql = 'SELECT * FROM tank_rpt WHERE GAUGE_FT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGAUGEIN($value){
		$sql = 'SELECT * FROM tank_rpt WHERE GAUGE_IN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTANKID($value){
		$sql = 'DELETE FROM tank_rpt WHERE TANK_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEMPID($value){
		$sql = 'DELETE FROM tank_rpt WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTANKRPTDATE($value){
		$sql = 'DELETE FROM tank_rpt WHERE TANK_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGAUGEFT($value){
		$sql = 'DELETE FROM tank_rpt WHERE GAUGE_FT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGAUGEIN($value){
		$sql = 'DELETE FROM tank_rpt WHERE GAUGE_IN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TankRptMySql 
	 */
	protected function readRow($row){
		$tankRpt = new TankRpt();
		
		$tankRpt->tANKRPTID = $row['TANK_RPT_ID'];
		$tankRpt->tANKID = $row['TANK_ID'];
		$tankRpt->eMPID = $row['EMP_ID'];
		$tankRpt->tANKRPTDATE = $row['TANK_RPT_DATE'];
		$tankRpt->gAUGEFT = $row['GAUGE_FT'];
		$tankRpt->gAUGEIN = $row['GAUGE_IN'];

		return $tankRpt;
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
	 * @return TankRptMySql 
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