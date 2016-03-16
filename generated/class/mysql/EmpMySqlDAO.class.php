<?php
/**
 * Class that operate on table 'emp'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class EmpMySqlDAO implements EmpDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EmpMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM emp WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM emp';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM emp ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param emp primary key
 	 */
	public function delete($EMP_ID){
		$sql = 'DELETE FROM emp WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($EMP_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmpMySql emp
 	 */
	public function insert($emp){
		$sql = 'INSERT INTO emp (SHOP_CODE, F_NAME, L_NAME, DOB) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($emp->sHOPCODE);
		$sqlQuery->set($emp->fNAME);
		$sqlQuery->set($emp->lNAME);
		$sqlQuery->set($emp->dOB);

		$id = $this->executeInsert($sqlQuery);	
		$emp->eMPID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmpMySql emp
 	 */
	public function update($emp){
		$sql = 'UPDATE emp SET SHOP_CODE = ?, F_NAME = ?, L_NAME = ?, DOB = ? WHERE EMP_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($emp->sHOPCODE);
		$sqlQuery->set($emp->fNAME);
		$sqlQuery->set($emp->lNAME);
		$sqlQuery->set($emp->dOB);

		$sqlQuery->setNumber($emp->eMPID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM emp';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySHOPCODE($value){
		$sql = 'SELECT * FROM emp WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFNAME($value){
		$sql = 'SELECT * FROM emp WHERE F_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLNAME($value){
		$sql = 'SELECT * FROM emp WHERE L_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDOB($value){
		$sql = 'SELECT * FROM emp WHERE DOB = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySHOPCODE($value){
		$sql = 'DELETE FROM emp WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFNAME($value){
		$sql = 'DELETE FROM emp WHERE F_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLNAME($value){
		$sql = 'DELETE FROM emp WHERE L_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDOB($value){
		$sql = 'DELETE FROM emp WHERE DOB = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EmpMySql 
	 */
	protected function readRow($row){
		$emp = new Emp();
		
		$emp->eMPID = $row['EMP_ID'];
		$emp->sHOPCODE = $row['SHOP_CODE'];
		$emp->fNAME = $row['F_NAME'];
		$emp->lNAME = $row['L_NAME'];
		$emp->dOB = $row['DOB'];

		return $emp;
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
	 * @return EmpMySql 
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