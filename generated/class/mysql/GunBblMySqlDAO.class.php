<?php
/**
 * Class that operate on table 'gun_bbl'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class GunBblMySqlDAO implements GunBblDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GunBblMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM gun_bbl WHERE GUN_BBL_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM gun_bbl';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM gun_bbl ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param gunBbl primary key
 	 */
	public function delete($GUN_BBL_CODE){
		$sql = 'DELETE FROM gun_bbl WHERE GUN_BBL_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($GUN_BBL_CODE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GunBblMySql gunBbl
 	 */
	public function insert($gunBbl){
		$sql = 'INSERT INTO gun_bbl (GUN_BBL_DESC, AMNT) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($gunBbl->gUNBBLDESC);
		$sqlQuery->setNumber($gunBbl->aMNT);

		$id = $this->executeInsert($sqlQuery);	
		$gunBbl->gUNBBLCODE = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GunBblMySql gunBbl
 	 */
	public function update($gunBbl){
		$sql = 'UPDATE gun_bbl SET GUN_BBL_DESC = ?, AMNT = ? WHERE GUN_BBL_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($gunBbl->gUNBBLDESC);
		$sqlQuery->setNumber($gunBbl->aMNT);

		$sqlQuery->setNumber($gunBbl->gUNBBLCODE);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM gun_bbl';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGUNBBLDESC($value){
		$sql = 'SELECT * FROM gun_bbl WHERE GUN_BBL_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAMNT($value){
		$sql = 'SELECT * FROM gun_bbl WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGUNBBLDESC($value){
		$sql = 'DELETE FROM gun_bbl WHERE GUN_BBL_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAMNT($value){
		$sql = 'DELETE FROM gun_bbl WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GunBblMySql 
	 */
	protected function readRow($row){
		$gunBbl = new GunBbl();
		
		$gunBbl->gUNBBLCODE = $row['GUN_BBL_CODE'];
		$gunBbl->gUNBBLDESC = $row['GUN_BBL_DESC'];
		$gunBbl->aMNT = $row['AMNT'];

		return $gunBbl;
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
	 * @return GunBblMySql 
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