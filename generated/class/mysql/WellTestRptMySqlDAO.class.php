<?php
/**
 * Class that operate on table 'well_test_rpt'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class WellTestRptMySqlDAO implements WellTestRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WellTestRptMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM well_test_rpt WHERE WELL_TEST_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM well_test_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM well_test_rpt ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param wellTestRpt primary key
 	 */
	public function delete($WELL_TEST_RPT_ID){
		$sql = 'DELETE FROM well_test_rpt WHERE WELL_TEST_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($WELL_TEST_RPT_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WellTestRptMySql wellTestRpt
 	 */
	public function insert($wellTestRpt){
		$sql = 'INSERT INTO well_test_rpt (WELL_ID, TIME_MIN, TIME_SEC, VOL, PCT_OIL, WT_RPT_DATE, TIMESTAMP) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wellTestRpt->wELLID);
		$sqlQuery->setNumber($wellTestRpt->tIMEMIN);
		$sqlQuery->setNumber($wellTestRpt->tIMESEC);
		$sqlQuery->set($wellTestRpt->vOL);
		$sqlQuery->set($wellTestRpt->pCTOIL);
		$sqlQuery->set($wellTestRpt->wTRPTDATE);
		$sqlQuery->set($wellTestRpt->tIMESTAMP);

		$id = $this->executeInsert($sqlQuery);	
		$wellTestRpt->wELLTESTRPTID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WellTestRptMySql wellTestRpt
 	 */
	public function update($wellTestRpt){
		$sql = 'UPDATE well_test_rpt SET WELL_ID = ?, TIME_MIN = ?, TIME_SEC = ?, VOL = ?, PCT_OIL = ?, WT_RPT_DATE = ?, TIMESTAMP = ? WHERE WELL_TEST_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($wellTestRpt->wELLID);
		$sqlQuery->setNumber($wellTestRpt->tIMEMIN);
		$sqlQuery->setNumber($wellTestRpt->tIMESEC);
		$sqlQuery->set($wellTestRpt->vOL);
		$sqlQuery->set($wellTestRpt->pCTOIL);
		$sqlQuery->set($wellTestRpt->wTRPTDATE);
		$sqlQuery->set($wellTestRpt->tIMESTAMP);

		$sqlQuery->setNumber($wellTestRpt->wELLTESTRPTID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM well_test_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByWELLID($value){
		$sql = 'SELECT * FROM well_test_rpt WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMEMIN($value){
		$sql = 'SELECT * FROM well_test_rpt WHERE TIME_MIN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMESEC($value){
		$sql = 'SELECT * FROM well_test_rpt WHERE TIME_SEC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVOL($value){
		$sql = 'SELECT * FROM well_test_rpt WHERE VOL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPCTOIL($value){
		$sql = 'SELECT * FROM well_test_rpt WHERE PCT_OIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWTRPTDATE($value){
		$sql = 'SELECT * FROM well_test_rpt WHERE WT_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMESTAMP($value){
		$sql = 'SELECT * FROM well_test_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByWELLID($value){
		$sql = 'DELETE FROM well_test_rpt WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMEMIN($value){
		$sql = 'DELETE FROM well_test_rpt WHERE TIME_MIN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMESEC($value){
		$sql = 'DELETE FROM well_test_rpt WHERE TIME_SEC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVOL($value){
		$sql = 'DELETE FROM well_test_rpt WHERE VOL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPCTOIL($value){
		$sql = 'DELETE FROM well_test_rpt WHERE PCT_OIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWTRPTDATE($value){
		$sql = 'DELETE FROM well_test_rpt WHERE WT_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMESTAMP($value){
		$sql = 'DELETE FROM well_test_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WellTestRptMySql 
	 */
	protected function readRow($row){
		$wellTestRpt = new WellTestRpt();
		
		$wellTestRpt->wELLTESTRPTID = $row['WELL_TEST_RPT_ID'];
		$wellTestRpt->wELLID = $row['WELL_ID'];
		$wellTestRpt->tIMEMIN = $row['TIME_MIN'];
		$wellTestRpt->tIMESEC = $row['TIME_SEC'];
		$wellTestRpt->vOL = $row['VOL'];
		$wellTestRpt->pCTOIL = $row['PCT_OIL'];
		$wellTestRpt->wTRPTDATE = $row['WT_RPT_DATE'];
		$wellTestRpt->tIMESTAMP = $row['TIMESTAMP'];

		return $wellTestRpt;
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
	 * @return WellTestRptMySql 
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