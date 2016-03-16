<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface TankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tank 
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
 	 * @param tank primary key
 	 */
	public function delete($TANK_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tank tank
 	 */
	public function insert($tank);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tank tank
 	 */
	public function update($tank);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLEASEID($value);

	public function queryBySTRAP($value);


	public function deleteByLEASEID($value);

	public function deleteBySTRAP($value);


}
?>