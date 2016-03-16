<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface AgoTypeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AgoType 
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
 	 * @param agoType primary key
 	 */
	public function delete($AGO_TYPE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AgoType agoType
 	 */
	public function insert($agoType);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AgoType agoType
 	 */
	public function update($agoType);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTYPEDESC($value);


	public function deleteByTYPEDESC($value);


}
?>