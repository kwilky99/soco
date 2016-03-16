<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface TankRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TankRpt 
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
 	 * @param tankRpt primary key
 	 */
	public function delete($TANK_RPT_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TankRpt tankRpt
 	 */
	public function insert($tankRpt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TankRpt tankRpt
 	 */
	public function update($tankRpt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTANKID($value);

	public function queryByEMPID($value);

	public function queryByTANKRPTDATE($value);

	public function queryByGAUGEFT($value);

	public function queryByGAUGEIN($value);


	public function deleteByTANKID($value);

	public function deleteByEMPID($value);

	public function deleteByTANKRPTDATE($value);

	public function deleteByGAUGEFT($value);

	public function deleteByGAUGEIN($value);


}
?>