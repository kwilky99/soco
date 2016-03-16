<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface InventoryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Inventory 
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
 	 * @param inventory primary key
 	 */
	public function delete($INV_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Inventory inventory
 	 */
	public function insert($inventory);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Inventory inventory
 	 */
	public function update($inventory);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByITEMID($value);

	public function queryBySHOPCODE($value);


	public function deleteByITEMID($value);

	public function deleteBySHOPCODE($value);


}
?>