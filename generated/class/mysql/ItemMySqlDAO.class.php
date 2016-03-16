<?php
/**
 * Class that operate on table 'item'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class ItemMySqlDAO implements ItemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ItemMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM item WHERE ITEM_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM item';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM item ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param item primary key
 	 */
	public function delete($ITEM_ID){
		$sql = 'DELETE FROM item WHERE ITEM_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ITEM_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ItemMySql item
 	 */
	public function insert($item){
		$sql = 'INSERT INTO item (ITEM_DESC) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($item->iTEMDESC);

		$id = $this->executeInsert($sqlQuery);	
		$item->iTEMID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ItemMySql item
 	 */
	public function update($item){
		$sql = 'UPDATE item SET ITEM_DESC = ? WHERE ITEM_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($item->iTEMDESC);

		$sqlQuery->setNumber($item->iTEMID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM item';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByITEMDESC($value){
		$sql = 'SELECT * FROM item WHERE ITEM_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByITEMDESC($value){
		$sql = 'DELETE FROM item WHERE ITEM_DESC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ItemMySql 
	 */
	protected function readRow($row){
		$item = new Item();
		
		$item->iTEMID = $row['ITEM_ID'];
		$item->iTEMDESC = $row['ITEM_DESC'];

		return $item;
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
	 * @return ItemMySql 
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