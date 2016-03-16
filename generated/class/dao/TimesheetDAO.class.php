<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface TimesheetDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Timesheet 
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
 	 * @param timesheet primary key
 	 */
	public function delete($SHEET_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Timesheet timesheet
 	 */
	public function insert($timesheet);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Timesheet timesheet
 	 */
	public function update($timesheet);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEMPID($value);

	public function queryByTSRPTDATE($value);

	public function queryByWELLID($value);

	public function queryByWRKDESC($value);

	public function queryByTIMEINT($value);

	public function queryByTIMESTAMP($value);


	public function deleteByEMPID($value);

	public function deleteByTSRPTDATE($value);

	public function deleteByWELLID($value);

	public function deleteByWRKDESC($value);

	public function deleteByTIMEINT($value);

	public function deleteByTIMESTAMP($value);


}
?>