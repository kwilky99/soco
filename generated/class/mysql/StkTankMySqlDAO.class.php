<?php
/**
 * Class that operate on table 'stk_tank'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class StkTankMySqlDAO implements StkTankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return StkTankMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM stk_tank WHERE STK_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM stk_tank';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM stk_tank ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param stkTank primary key
 	 */
	public function delete($STK_TANK_CODE){
		$sql = 'DELETE FROM stk_tank WHERE STK_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($STK_TANK_CODE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param StkTankMySql stkTank
 	 */
	public function insert($stkTank){
		$sql = 'INSERT INTO stk_tank (STK_TANK_DESC, AMNT) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($stkTank->sTKTANKDESC);
		$sqlQuery->setNumber($stkTank->aMNT);

		$id = $this->executeInsert($sqlQuery);	
		$stkTank->sTKTANKCODE = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param StkTankMySql stkTank
 	 */
	public function update($stkTank){
		$sql = 'UPDATE stk_tank SET STK_TANK_DESC = ?, AMNT = ? WHERE STK_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($stkTank->sTKTANKDESC);
		$sqlQuery->setNumber($stkTank->aMNT);

		$sqlQuery->setNumber($stkTank->sTKTANKCODE);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM stk_tank';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySTKTANKDESC($value){
		$sql = 'SELECT * FROM stk_tank WHERE STK_TANK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAMNT($value){
		$sql = 'SELECT * FROM stk_tank WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySTKTANKDESC($value){
		$sql = 'DELETE FROM stk_tank WHERE STK_TANK_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAMNT($value){
		$sql = 'DELETE FROM stk_tank WHERE AMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return StkTankMySql 
	 */
	protected function readRow($row){
		$stkTank = new StkTank();
		
		$stkTank->sTKTANKCODE = $row['STK_TANK_CODE'];
		$stkTank->sTKTANKDESC = $row['STK_TANK_DESC'];
		$stkTank->aMNT = $row['AMNT'];

		return $stkTank;
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
	 * @return StkTankMySql 
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