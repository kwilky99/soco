<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface ShopDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Shop 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param shop primary key
 	 */
	public function delete($SHOP_CODE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Shop shop
 	 */
	public function insert($shop);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Shop shop
 	 */
	public function update($shop);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMGRID($value);

	public function queryByLOCATIONID($value);


	public function deleteByMGRID($value);

	public function deleteByLOCATIONID($value);


}
?>