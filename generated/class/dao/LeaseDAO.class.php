<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface LeaseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Lease 
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
 	 * @param lease primary key
 	 */
	public function delete($LEASE_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Lease lease
 	 */
	public function insert($lease);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Lease lease
 	 */
	public function update($lease);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLEASENAME($value);

	public function queryByLOCATIONID($value);

	public function queryBySHOPCODE($value);

	public function queryBySTKTANKCODE($value);

	public function queryByWTRTANKCODE($value);

	public function queryByGUNBBLCODE($value);

	public function queryByTNKCMNT($value);

	public function queryByLEASESIGN($value);

	public function queryByMAKE($value);

	public function queryByMODEL($value);

	public function queryByPLGRSIZE($value);

	public function queryByPUMPSHVSIZE($value);

	public function queryByMTRSHVSIZE($value);

	public function queryByHP($value);

	public function queryByVLTG($value);

	public function queryByMTRFRMSTYL($value);

	public function queryByRPM($value);

	public function queryByPHASE($value);

	public function queryByBLTSIZESTYL($value);

	public function queryByPHUNIT($value);

	public function queryByOPPRES($value);

	public function queryByINJRT($value);

	public function queryByVOLINJDLY($value);

	public function queryByBLDNG($value);

	public function queryByINJCMNT($value);


	public function deleteByLEASENAME($value);

	public function deleteByLOCATIONID($value);

	public function deleteBySHOPCODE($value);

	public function deleteBySTKTANKCODE($value);

	public function deleteByWTRTANKCODE($value);

	public function deleteByGUNBBLCODE($value);

	public function deleteByTNKCMNT($value);

	public function deleteByLEASESIGN($value);

	public function deleteByMAKE($value);

	public function deleteByMODEL($value);

	public function deleteByPLGRSIZE($value);

	public function deleteByPUMPSHVSIZE($value);

	public function deleteByMTRSHVSIZE($value);

	public function deleteByHP($value);

	public function deleteByVLTG($value);

	public function deleteByMTRFRMSTYL($value);

	public function deleteByRPM($value);

	public function deleteByPHASE($value);

	public function deleteByBLTSIZESTYL($value);

	public function deleteByPHUNIT($value);

	public function deleteByOPPRES($value);

	public function deleteByINJRT($value);

	public function deleteByVOLINJDLY($value);

	public function deleteByBLDNG($value);

	public function deleteByINJCMNT($value);


}
?>