<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface AgoRptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AgoRpt 
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
 	 * @param agoRpt primary key
 	 */
	public function delete($AGO_RPT_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AgoRpt agoRpt
 	 */
	public function insert($agoRpt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AgoRpt agoRpt
 	 */
	public function update($agoRpt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUSESID($value);

	public function queryByAGORPTDATE($value);

	public function queryByAGOTYPE($value);

	public function queryByTUBESGAL($value);

	public function queryByAMNT($value);

	public function queryByTIMESTAMP($value);


	public function deleteByUSESID($value);

	public function deleteByAGORPTDATE($value);

	public function deleteByAGOTYPE($value);

	public function deleteByTUBESGAL($value);

	public function deleteByAMNT($value);

	public function deleteByTIMESTAMP($value);


}
?>