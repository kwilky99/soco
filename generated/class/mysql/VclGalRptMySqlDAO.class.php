<?php
/**
 * Class that operate on table 'vcl_gal_rpt'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class VclGalRptMySqlDAO implements VclGalRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return VclGalRptMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM vcl_gal_rpt WHERE VCL_GAL_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM vcl_gal_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM vcl_gal_rpt ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param vclGalRpt primary key
 	 */
	public function delete($VCL_GAL_RPT_ID){
		$sql = 'DELETE FROM vcl_gal_rpt WHERE VCL_GAL_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($VCL_GAL_RPT_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VclGalRptMySql vclGalRpt
 	 */
	public function insert($vclGalRpt){
		$sql = 'INSERT INTO vcl_gal_rpt (USES_ID, GAL_USED, TIMESTAMP) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($vclGalRpt->uSESID);
		$sqlQuery->set($vclGalRpt->gALUSED);
		$sqlQuery->set($vclGalRpt->tIMESTAMP);

		$id = $this->executeInsert($sqlQuery);	
		$vclGalRpt->vCLGALRPTID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param VclGalRptMySql vclGalRpt
 	 */
	public function update($vclGalRpt){
		$sql = 'UPDATE vcl_gal_rpt SET USES_ID = ?, GAL_USED = ?, TIMESTAMP = ? WHERE VCL_GAL_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($vclGalRpt->uSESID);
		$sqlQuery->set($vclGalRpt->gALUSED);
		$sqlQuery->set($vclGalRpt->tIMESTAMP);

		$sqlQuery->setNumber($vclGalRpt->vCLGALRPTID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM vcl_gal_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUSESID($value){
		$sql = 'SELECT * FROM vcl_gal_rpt WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGALUSED($value){
		$sql = 'SELECT * FROM vcl_gal_rpt WHERE GAL_USED = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMESTAMP($value){
		$sql = 'SELECT * FROM vcl_gal_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUSESID($value){
		$sql = 'DELETE FROM vcl_gal_rpt WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGALUSED($value){
		$sql = 'DELETE FROM vcl_gal_rpt WHERE GAL_USED = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMESTAMP($value){
		$sql = 'DELETE FROM vcl_gal_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return VclGalRptMySql 
	 */
	protected function readRow($row){
		$vclGalRpt = new VclGalRpt();
		
		$vclGalRpt->vCLGALRPTID = $row['VCL_GAL_RPT_ID'];
		$vclGalRpt->uSESID = $row['USES_ID'];
		$vclGalRpt->gALUSED = $row['GAL_USED'];
		$vclGalRpt->tIMESTAMP = $row['TIMESTAMP'];

		return $vclGalRpt;
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
	 * @return VclGalRptMySql 
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