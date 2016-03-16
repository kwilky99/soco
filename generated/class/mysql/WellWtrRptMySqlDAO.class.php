<?php
/**
 * Class that operate on table 'well_wtr_rpt'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class WellWtrRptMySqlDAO implements WellWtrRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WellWtrRptMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM well_wtr_rpt WHERE WELL_WTR_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM well_wtr_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM well_wtr_rpt ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wellWtrRpt primary key
 	 */
	public function delete($WELL_WTR_RPT_ID){
		$sql = 'DELETE FROM well_wtr_rpt WHERE WELL_WTR_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($WELL_WTR_RPT_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WellWtrRptMySql wellWtrRpt
 	 */
	public function insert($wellWtrRpt){
		$sql = 'INSERT INTO well_wtr_rpt (WELL_ID, WW_RPT_DATE, MTR_READING, WH_PSIG, TIMESTAMP) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wellWtrRpt->wELLID);
		$sqlQuery->set($wellWtrRpt->wWRPTDATE);
		$sqlQuery->setNumber($wellWtrRpt->mTRREADING);
		$sqlQuery->setNumber($wellWtrRpt->wHPSIG);
		$sqlQuery->set($wellWtrRpt->tIMESTAMP);

		$id = $this->executeInsert($sqlQuery);	
		$wellWtrRpt->wELLWTRRPTID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WellWtrRptMySql wellWtrRpt
 	 */
	public function update($wellWtrRpt){
		$sql = 'UPDATE well_wtr_rpt SET WELL_ID = ?, WW_RPT_DATE = ?, MTR_READING = ?, WH_PSIG = ?, TIMESTAMP = ? WHERE WELL_WTR_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wellWtrRpt->wELLID);
		$sqlQuery->set($wellWtrRpt->wWRPTDATE);
		$sqlQuery->setNumber($wellWtrRpt->mTRREADING);
		$sqlQuery->setNumber($wellWtrRpt->wHPSIG);
		$sqlQuery->set($wellWtrRpt->tIMESTAMP);

		$sqlQuery->setNumber($wellWtrRpt->wELLWTRRPTID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM well_wtr_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByWELLID($value){
		$sql = 'SELECT * FROM well_wtr_rpt WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWWRPTDATE($value){
		$sql = 'SELECT * FROM well_wtr_rpt WHERE WW_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMTRREADING($value){
		$sql = 'SELECT * FROM well_wtr_rpt WHERE MTR_READING = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWHPSIG($value){
		$sql = 'SELECT * FROM well_wtr_rpt WHERE WH_PSIG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMESTAMP($value){
		$sql = 'SELECT * FROM well_wtr_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByWELLID($value){
		$sql = 'DELETE FROM well_wtr_rpt WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWWRPTDATE($value){
		$sql = 'DELETE FROM well_wtr_rpt WHERE WW_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMTRREADING($value){
		$sql = 'DELETE FROM well_wtr_rpt WHERE MTR_READING = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWHPSIG($value){
		$sql = 'DELETE FROM well_wtr_rpt WHERE WH_PSIG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMESTAMP($value){
		$sql = 'DELETE FROM well_wtr_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WellWtrRptMySql 
	 */
	protected function readRow($row){
		$wellWtrRpt = new WellWtrRpt();
		
		$wellWtrRpt->wELLWTRRPTID = $row['WELL_WTR_RPT_ID'];
		$wellWtrRpt->wELLID = $row['WELL_ID'];
		$wellWtrRpt->wWRPTDATE = $row['WW_RPT_DATE'];
		$wellWtrRpt->mTRREADING = $row['MTR_READING'];
		$wellWtrRpt->wHPSIG = $row['WH_PSIG'];
		$wellWtrRpt->tIMESTAMP = $row['TIMESTAMP'];

		return $wellWtrRpt;
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
	 * @return WellWtrRptMySql 
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