<?php
/**
 * Class that operate on table 'inventory'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class InventoryMySqlDAO implements InventoryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return InventoryMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM inventory WHERE INV_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM inventory';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM inventory ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param inventory primary key
 	 */
	public function delete($INV_ID){
		$sql = 'DELETE FROM inventory WHERE INV_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($INV_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InventoryMySql inventory
 	 */
	public function insert($inventory){
		$sql = 'INSERT INTO inventory (ITEM_ID, SHOP_CODE) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($inventory->iTEMID);
		$sqlQuery->set($inventory->sHOPCODE);

		$id = $this->executeInsert($sqlQuery);	
		$inventory->iNVID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param InventoryMySql inventory
 	 */
	public function update($inventory){
		$sql = 'UPDATE inventory SET ITEM_ID = ?, SHOP_CODE = ? WHERE INV_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($inventory->iTEMID);
		$sqlQuery->set($inventory->sHOPCODE);

		$sqlQuery->setNumber($inventory->iNVID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM inventory';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByITEMID($value){
		$sql = 'SELECT * FROM inventory WHERE ITEM_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySHOPCODE($value){
		$sql = 'SELECT * FROM inventory WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByITEMID($value){
		$sql = 'DELETE FROM inventory WHERE ITEM_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySHOPCODE($value){
		$sql = 'DELETE FROM inventory WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return InventoryMySql 
	 */
	protected function readRow($row){
		$inventory = new Inventory();
		
		$inventory->iNVID = $row['INV_ID'];
		$inventory->iTEMID = $row['ITEM_ID'];
		$inventory->sHOPCODE = $row['SHOP_CODE'];

		return $inventory;
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
	 * @return InventoryMySql 
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