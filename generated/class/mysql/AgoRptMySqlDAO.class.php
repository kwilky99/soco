<?php
/**
 * Class that operate on table 'ago_rpt'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class AgoRptMySqlDAO implements AgoRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AgoRptMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ago_rpt WHERE AGO_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ago_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ago_rpt ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param agoRpt primary key
 	 */
	public function delete($AGO_RPT_ID){
		$sql = 'DELETE FROM ago_rpt WHERE AGO_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($AGO_RPT_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AgoRptMySql agoRpt
 	 */
	public function insert($agoRpt){
		$sql = 'INSERT INTO ago_rpt (USES_ID, AGO_RPT_DATE, AGO_TYPE, TUBES_GAL, AMNT, TIMESTAMP) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($agoRpt->uSESID);
		$sqlQuery->set($agoRpt->aGORPTDATE);
		$sqlQuery->setNumber($agoRpt->aGOTYPE);
		$sqlQuery->set($agoRpt->tUBESGAL);
		$sqlQuery->set($agoRpt->aMNT);
		$sqlQuery->set($agoRpt->tIMESTAMP);

		$id = $this->executeInsert($sqlQuery);	
		$agoRpt->aGORPTID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AgoRptMySql agoRpt
 	 */
	public function update($agoRpt){
		$sql = 'UPDATE ago_rpt SET USES_ID = ?, AGO_RPT_DATE = ?, AGO_TYPE = ?, TUBES_GAL = ?, AMNT = ?, TIMESTAMP = ? WHERE AGO_RPT_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($agoRpt->uSESID);
		$sqlQuery->set($agoRpt->aGORPTDATE);
		$sqlQuery->setNumber($agoRpt->aGOTYPE);
		$sqlQuery->set($agoRpt->tUBESGAL);
		$sqlQuery->set($agoRpt->aMNT);
		$sqlQuery->set($agoRpt->tIMESTAMP);

		$sqlQuery->setNumber($agoRpt->aGORPTID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ago_rpt';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUSESID($value){
		$sql = 'SELECT * FROM ago_rpt WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAGORPTDATE($value){
		$sql = 'SELECT * FROM ago_rpt WHERE AGO_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAGOTYPE($value){
		$sql = 'SELECT * FROM ago_rpt WHERE AGO_TYPE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTUBESGAL($value){
		$sql = 'SELECT * FROM ago_rpt WHERE TUBES_GAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAMNT($value){
		$sql = 'SELECT * FROM ago_rpt WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIMESTAMP($value){
		$sql = 'SELECT * FROM ago_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUSESID($value){
		$sql = 'DELETE FROM ago_rpt WHERE USES_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAGORPTDATE($value){
		$sql = 'DELETE FROM ago_rpt WHERE AGO_RPT_DATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAGOTYPE($value){
		$sql = 'DELETE FROM ago_rpt WHERE AGO_TYPE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTUBESGAL($value){
		$sql = 'DELETE FROM ago_rpt WHERE TUBES_GAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAMNT($value){
		$sql = 'DELETE FROM ago_rpt WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIMESTAMP($value){
		$sql = 'DELETE FROM ago_rpt WHERE TIMESTAMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AgoRptMySql 
	 */
	protected function readRow($row){
		$agoRpt = new AgoRpt();
		
		$agoRpt->aGORPTID = $row['AGO_RPT_ID'];
		$agoRpt->uSESID = $row['USES_ID'];
		$agoRpt->aGORPTDATE = $row['AGO_RPT_DATE'];
		$agoRpt->aGOTYPE = $row['AGO_TYPE'];
		$agoRpt->tUBESGAL = $row['TUBES_GAL'];
		$agoRpt->aMNT = $row['AMNT'];
		$agoRpt->tIMESTAMP = $row['TIMESTAMP'];

		return $agoRpt;
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
	 * @return AgoRptMySql 
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