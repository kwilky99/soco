<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface StateDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return State 
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
 	 * @param state primary key
 	 */
	public function delete($STATE_CODE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param State state
 	 */
	public function insert($state);
	
	/**
 	 * Update record in table
 	 *
 	 * @param State state
 	 */
	public function update($state);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySTATEDESC($value);


	public function deleteBySTATEDESC($value);


}
?>