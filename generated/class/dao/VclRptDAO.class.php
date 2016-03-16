<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface VclRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return VclRpt 
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
 	 * @param vclRpt primary key
 	 */
	public function delete($VCL_RPT_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VclRpt vclRpt
 	 */
	public function insert($vclRpt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param VclRpt vclRpt
 	 */
	public function update($vclRpt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUSESID($value);

	public function queryByTRKRPTDATE($value);

	public function queryByMAINTDESC($value);

	public function queryByFUEL($value);

	public function queryByDLRCOST($value);

	public function queryByMILAGEEND($value);

	public function queryByMILAGEBEG($value);

	public function queryByTIMESTAMP($value);


	public function deleteByUSESID($value);

	public function deleteByTRKRPTDATE($value);

	public function deleteByMAINTDESC($value);

	public function deleteByFUEL($value);

	public function deleteByDLRCOST($value);

	public function deleteByMILAGEEND($value);

	public function deleteByMILAGEBEG($value);

	public function deleteByTIMESTAMP($value);


}
?>