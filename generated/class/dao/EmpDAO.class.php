<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface EmpDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Emp 
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
 	 * @param emp primary key
 	 */
	public function delete($EMP_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Emp emp
 	 */
	public function insert($emp);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Emp emp
 	 */
	public function update($emp);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySHOPCODE($value);

	public function queryByFNAME($value);

	public function queryByLNAME($value);

	public function queryByDOB($value);


	public function deleteBySHOPCODE($value);

	public function deleteByFNAME($value);

	public function deleteByLNAME($value);

	public function deleteByDOB($value);


}
?>