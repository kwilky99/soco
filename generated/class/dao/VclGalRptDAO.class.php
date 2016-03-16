<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface VclGalRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return VclGalRpt 
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
 	 * @param vclGalRpt primary key
 	 */
	public function delete($VCL_GAL_RPT_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VclGalRpt vclGalRpt
 	 */
	public function insert($vclGalRpt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param VclGalRpt vclGalRpt
 	 */
	public function update($vclGalRpt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUSESID($value);

	public function queryByGALUSED($value);

	public function queryByTIMESTAMP($value);


	public function deleteByUSESID($value);

	public function deleteByGALUSED($value);

	public function deleteByTIMESTAMP($value);


}
?>