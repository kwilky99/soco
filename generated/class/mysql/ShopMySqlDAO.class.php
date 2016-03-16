<?php
/**
 * Class that operate on table 'shop'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class ShopMySqlDAO implements ShopDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ShopMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM shop WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM shop';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM shop ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param shop primary key
 	 */
	public function delete($SHOP_CODE){
		$sql = 'DELETE FROM shop WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($SHOP_CODE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ShopMySql shop
 	 */
	public function insert($shop){
		$sql = 'INSERT INTO shop (MGR_ID, LOCATION_ID) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($shop->mGRID);
		$sqlQuery->setNumber($shop->lOCATIONID);

		$id = $this->executeInsert($sqlQuery);	
		$shop->sHOPCODE = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ShopMySql shop
 	 */
	public function update($shop){
		$sql = 'UPDATE shop SET MGR_ID = ?, LOCATION_ID = ? WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($shop->mGRID);
		$sqlQuery->setNumber($shop->lOCATIONID);

		$sqlQuery->set($shop->sHOPCODE);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM shop';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMGRID($value){
		$sql = 'SELECT * FROM shop WHERE MGR_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLOCATIONID($value){
		$sql = 'SELECT * FROM shop WHERE LOCATION_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMGRID($value){
		$sql = 'DELETE FROM shop WHERE MGR_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLOCATIONID($value){
		$sql = 'DELETE FROM shop WHERE LOCATION_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ShopMySql 
	 */
	protected function readRow($row){
		$shop = new Shop();
		
		$shop->sHOPCODE = $row['SHOP_CODE'];
		$shop->mGRID = $row['MGR_ID'];
		$shop->lOCATIONID = $row['LOCATION_ID'];

		return $shop;
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
	 * @return ShopMySql 
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