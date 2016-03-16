<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface GunBblDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GunBbl 
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
 	 * @param gunBbl primary key
 	 */
	public function delete($GUN_BBL_CODE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GunBbl gunBbl
 	 */
	public function insert($gunBbl);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GunBbl gunBbl
 	 */
	public function update($gunBbl);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGUNBBLDESC($value);

	public function queryByAMNT($value);


	public function deleteByGUNBBLDESC($value);

	public function deleteByAMNT($value);


}
?>