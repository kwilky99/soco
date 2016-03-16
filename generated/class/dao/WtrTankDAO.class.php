<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface WtrTankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WtrTank 
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
 	 * @param wtrTank primary key
 	 */
	public function delete($WTR_TANK_CODE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WtrTank wtrTank
 	 */
	public function insert($wtrTank);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WtrTank wtrTank
 	 */
	public function update($wtrTank);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByWTRTANKDESC($value);

	public function queryByAMNT($value);


	public function deleteByWTRTANKDESC($value);

	public function deleteByAMNT($value);


}
?>