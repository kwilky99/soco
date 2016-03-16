<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface LocationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Location 
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
 	 * @param location primary key
 	 */
	public function delete($LOCATION_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Location location
 	 */
	public function insert($location);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Location location
 	 */
	public function update($location);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByADDRESS1($value);

	public function queryByADDRESS2($value);

	public function queryByCITY($value);

	public function queryBySTATECODE($value);

	public function queryByZIP($value);


	public function deleteByADDRESS1($value);

	public function deleteByADDRESS2($value);

	public function deleteByCITY($value);

	public function deleteBySTATECODE($value);

	public function deleteByZIP($value);


}
?>