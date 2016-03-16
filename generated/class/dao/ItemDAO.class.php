<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface ItemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Item 
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
 	 * @param item primary key
 	 */
	public function delete($ITEM_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Item item
 	 */
	public function insert($item);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Item item
 	 */
	public function update($item);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByITEMDESC($value);


	public function deleteByITEMDESC($value);


}
?>