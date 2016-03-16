<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface WellWtrRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WellWtrRpt 
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
 	 * @param wellWtrRpt primary key
 	 */
	public function delete($WELL_WTR_RPT_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WellWtrRpt wellWtrRpt
 	 */
	public function insert($wellWtrRpt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WellWtrRpt wellWtrRpt
 	 */
	public function update($wellWtrRpt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByWELLID($value);

	public function queryByWWRPTDATE($value);

	public function queryByMTRREADING($value);

	public function queryByWHPSIG($value);

	public function queryByTIMESTAMP($value);


	public function deleteByWELLID($value);

	public function deleteByWWRPTDATE($value);

	public function deleteByMTRREADING($value);

	public function deleteByWHPSIG($value);

	public function deleteByTIMESTAMP($value);


}
?>