<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface WellTestRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return WellTestRpt 
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
 	 * @param wellTestRpt primary key
 	 */
	public function delete($WELL_TEST_RPT_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WellTestRpt wellTestRpt
 	 */
	public function insert($wellTestRpt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param WellTestRpt wellTestRpt
 	 */
	public function update($wellTestRpt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByWELLID($value);

	public function queryByTIMEMIN($value);

	public function queryByTIMESEC($value);

	public function queryByVOL($value);

	public function queryByPCTOIL($value);

	public function queryByWTRPTDATE($value);

	public function queryByTIMESTAMP($value);


	public function deleteByWELLID($value);

	public function deleteByTIMEMIN($value);

	public function deleteByTIMESEC($value);

	public function deleteByVOL($value);

	public function deleteByPCTOIL($value);

	public function deleteByWTRPTDATE($value);

	public function deleteByTIMESTAMP($value);


}
?>