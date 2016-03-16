<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface StkTankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return StkTank 
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
 	 * @param stkTank primary key
 	 */
	public function delete($STK_TANK_CODE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param StkTank stkTank
 	 */
	public function insert($stkTank);
	
	/**
 	 * Update record in table
 	 *
 	 * @param StkTank stkTank
 	 */
	public function update($stkTank);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySTKTANKDESC($value);

	public function queryByAMNT($value);


	public function deleteBySTKTANKDESC($value);

	public function deleteByAMNT($value);


}
?>