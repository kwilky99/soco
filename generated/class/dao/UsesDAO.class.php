<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface UsesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Uses 
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
 	 * @param use primary key
 	 */
	public function delete($USES_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Uses use
 	 */
	public function insert($use);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Uses use
 	 */
	public function update($use);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByINVID($value);

	public function queryByEMPID($value);

	public function queryByDATEUSED($value);

	public function queryByWORKDESC($value);


	public function deleteByINVID($value);

	public function deleteByEMPID($value);

	public function deleteByDATEUSED($value);

	public function deleteByWORKDESC($value);


}
?>