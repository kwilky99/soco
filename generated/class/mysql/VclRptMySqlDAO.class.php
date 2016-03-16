<?php
/**
 * Class that operate on table 'vcl_rpt'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class VclRptMySqlDAO implements VclRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return VclRptMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM vcl_rpt WHERE VCL_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM vcl_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM vcl_rpt ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param vclRpt primary key
 	 */
	public function delete($VCL_RPT_ID){
		$sql = 'DELETE FROM vcl_rpt WHERE VCL_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($VCL_RPT_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VclRptMySql vclRpt
 	 */
	public function insert($vclRpt){
		$sql = 'INSERT INTO vcl_rpt (USES_ID, TRK_RPT_DATE, MAINT_DESC, FUEL, DLR_COST, MILAGE_END, MILAGE_BEG, TIMESTAMP) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($vclRpt->uSESID);
		$sqlQuery->set($vclRpt->tRKRPTDATE);
		$sqlQuery->set($vclRpt->mAINTDESC);
		$sqlQuery->set($vclRpt->fUEL);
		$sqlQuery->set($vclRpt->dLRCOST);
		$sqlQuery->setNumber($vclRpt->mILAGEEND);
		$sqlQuery->setNumber($vclRpt->mILAGEBEG);
		$sqlQuery->set($vclRpt->tIMESTAMP);

		$id = $this->executeInsert($sqlQuery);	
		$vclRpt->vCLRPTID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param VclRptMySql vclRpt
 	 */
	public function update($vclRpt){
		$sql = 'UPDATE vcl_rpt SET USES_ID = ?, TRK_RPT_DATE = ?, MAINT_DESC = ?, FUEL = ?, DLR_COST = ?, MILAGE_END = ?, MILAGE_BEG = ?, TIMESTAMP = ? WHERE VCL_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($vclRpt->uSESID);
		$sqlQuery->set($vclRpt->tRKRPTDATE);
		$sqlQuery->set($vclRpt->mAINTDESC);
		$sqlQuery->set($vclRpt->fUEL);
		$sqlQuery->set($vclRpt->dLRCOST);
		$sqlQuery->setNumber($vclRpt->mILAGEEND);
		$sqlQuery->setNumber($vclRpt->mILAGEBEG);
		$sqlQuery->set($vclRpt->tIMESTAMP);

		$sqlQuery->setNumber($vclRpt->vCLRPTID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM vcl_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUSESID($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTRKRPTDATE($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE TRK_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMAINTDESC($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE MAINT_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFUEL($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE FUEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDLRCOST($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE DLR_COST = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMILAGEEND($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE MILAGE_END = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMILAGEBEG($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE MILAGE_BEG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMESTAMP($value){
		$sql = 'SELECT * FROM vcl_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUSESID($value){
		$sql = 'DELETE FROM vcl_rpt WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTRKRPTDATE($value){
		$sql = 'DELETE FROM vcl_rpt WHERE TRK_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMAINTDESC($value){
		$sql = 'DELETE FROM vcl_rpt WHERE MAINT_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFUEL($value){
		$sql = 'DELETE FROM vcl_rpt WHERE FUEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDLRCOST($value){
		$sql = 'DELETE FROM vcl_rpt WHERE DLR_COST = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMILAGEEND($value){
		$sql = 'DELETE FROM vcl_rpt WHERE MILAGE_END = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMILAGEBEG($value){
		$sql = 'DELETE FROM vcl_rpt WHERE MILAGE_BEG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMESTAMP($value){
		$sql = 'DELETE FROM vcl_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return VclRptMySql 
	 */
	protected function readRow($row){
		$vclRpt = new VclRpt();
		
		$vclRpt->vCLRPTID = $row['VCL_RPT_ID'];
		$vclRpt->uSESID = $row['USES_ID'];
		$vclRpt->tRKRPTDATE = $row['TRK_RPT_DATE'];
		$vclRpt->mAINTDESC = $row['MAINT_DESC'];
		$vclRpt->fUEL = $row['FUEL'];
		$vclRpt->dLRCOST = $row['DLR_COST'];
		$vclRpt->mILAGEEND = $row['MILAGE_END'];
		$vclRpt->mILAGEBEG = $row['MILAGE_BEG'];
		$vclRpt->tIMESTAMP = $row['TIMESTAMP'];

		return $vclRpt;
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
	 * @return VclRptMySql 
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