<?php
/**
 * Class that operate on table 'timesheet'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class TimesheetMySqlDAO implements TimesheetDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TimesheetMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM timesheet WHERE SHEET_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM timesheet';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM timesheet ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param timesheet primary key
 	 */
	public function delete($SHEET_ID){
		$sql = 'DELETE FROM timesheet WHERE SHEET_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($SHEET_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TimesheetMySql timesheet
 	 */
	public function insert($timesheet){
		$sql = 'INSERT INTO timesheet (EMP_ID, TS_RPT_DATE, WELL_ID, WRK_DESC, TIME_INT, TIMESTAMP) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($timesheet->eMPID);
		$sqlQuery->set($timesheet->tSRPTDATE);
		$sqlQuery->setNumber($timesheet->wELLID);
		$sqlQuery->set($timesheet->wRKDESC);
		$sqlQuery->set($timesheet->tIMEINT);
		$sqlQuery->set($timesheet->tIMESTAMP);

		$id = $this->executeInsert($sqlQuery);	
		$timesheet->sHEETID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TimesheetMySql timesheet
 	 */
	public function update($timesheet){
		$sql = 'UPDATE timesheet SET EMP_ID = ?, TS_RPT_DATE = ?, WELL_ID = ?, WRK_DESC = ?, TIME_INT = ?, TIMESTAMP = ? WHERE SHEET_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($timesheet->eMPID);
		$sqlQuery->set($timesheet->tSRPTDATE);
		$sqlQuery->setNumber($timesheet->wELLID);
		$sqlQuery->set($timesheet->wRKDESC);
		$sqlQuery->set($timesheet->tIMEINT);
		$sqlQuery->set($timesheet->tIMESTAMP);

		$sqlQuery->setNumber($timesheet->sHEETID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM timesheet';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEMPID($value){
		$sql = 'SELECT * FROM timesheet WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTSRPTDATE($value){
		$sql = 'SELECT * FROM timesheet WHERE TS_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWELLID($value){
		$sql = 'SELECT * FROM timesheet WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWRKDESC($value){
		$sql = 'SELECT * FROM timesheet WHERE WRK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMEINT($value){
		$sql = 'SELECT * FROM timesheet WHERE TIME_INT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMESTAMP($value){
		$sql = 'SELECT * FROM timesheet WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEMPID($value){
		$sql = 'DELETE FROM timesheet WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTSRPTDATE($value){
		$sql = 'DELETE FROM timesheet WHERE TS_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWELLID($value){
		$sql = 'DELETE FROM timesheet WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWRKDESC($value){
		$sql = 'DELETE FROM timesheet WHERE WRK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMEINT($value){
		$sql = 'DELETE FROM timesheet WHERE TIME_INT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMESTAMP($value){
		$sql = 'DELETE FROM timesheet WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TimesheetMySql 
	 */
	protected function readRow($row){
		$timesheet = new Timesheet();
		
		$timesheet->sHEETID = $row['SHEET_ID'];
		$timesheet->eMPID = $row['EMP_ID'];
		$timesheet->tSRPTDATE = $row['TS_RPT_DATE'];
		$timesheet->wELLID = $row['WELL_ID'];
		$timesheet->wRKDESC = $row['WRK_DESC'];
		$timesheet->tIMEINT = $row['TIME_INT'];
		$timesheet->tIMESTAMP = $row['TIMESTAMP'];

		return $timesheet;
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
	 * @return TimesheetMySql 
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