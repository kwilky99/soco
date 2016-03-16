<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
interface WellDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Well 
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
 	 * @param well primary key
 	 */
	public function delete($WELL_ID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Well well
 	 */
	public function insert($well);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Well well
 	 */
	public function update($well);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByWELLNAME($value);

	public function queryByLEASEID($value);

	public function queryByMAKE($value);

	public function queryByPEAKTRQ($value);

	public function queryByBEAMRTG($value);

	public function queryByGEARBOXSRL($value);

	public function queryByGEARRTO($value);

	public function queryByUNITSHVSIZE($value);

	public function queryByBEAMWTS($value);

	public function queryByCRNKWTS($value);

	public function queryBySTRK($value);

	public function queryByPINHOLEDMG($value);

	public function queryByBRKSWRK($value);

	public function queryByUNITLDR($value);

	public function queryBySTRKLGTH($value);

	public function queryBySTRKRATE($value);

	public function queryByWELLPNDFLD($value);

	public function queryByOIL($value);

	public function queryByWTR($value);

	public function queryByELTCMTR($value);

	public function queryByHP($value);

	public function queryByVLTG($value);

	public function queryByRPM($value);

	public function queryByMTRSHVSIZE($value);

	public function queryByPHASE($value);

	public function queryByPHGUNIT($value);

	public function queryByMTRFRMSTYL($value);

	public function queryByNATGAS($value);

	public function queryByPRPN($value);

	public function queryByBLTSIZESTYL($value);

	public function queryByCHEMPUMP($value);

	public function queryByCHEMBRNDTYPE($value);

	public function queryByBLTGRDPRES($value);

	public function queryByFLTBASESUBST($value);

	public function queryByHGHTSUB($value);

	public function queryByCMNT($value);

	public function queryByWELLSIGN($value);

	public function queryByWELLSIGNLOC($value);


	public function deleteByWELLNAME($value);

	public function deleteByLEASEID($value);

	public function deleteByMAKE($value);

	public function deleteByPEAKTRQ($value);

	public function deleteByBEAMRTG($value);

	public function deleteByGEARBOXSRL($value);

	public function deleteByGEARRTO($value);

	public function deleteByUNITSHVSIZE($value);

	public function deleteByBEAMWTS($value);

	public function deleteByCRNKWTS($value);

	public function deleteBySTRK($value);

	public function deleteByPINHOLEDMG($value);

	public function deleteByBRKSWRK($value);

	public function deleteByUNITLDR($value);

	public function deleteBySTRKLGTH($value);

	public function deleteBySTRKRATE($value);

	public function deleteByWELLPNDFLD($value);

	public function deleteByOIL($value);

	public function deleteByWTR($value);

	public function deleteByELTCMTR($value);

	public function deleteByHP($value);

	public function deleteByVLTG($value);

	public function deleteByRPM($value);

	public function deleteByMTRSHVSIZE($value);

	public function deleteByPHASE($value);

	public function deleteByPHGUNIT($value);

	public function deleteByMTRFRMSTYL($value);

	public function deleteByNATGAS($value);

	public function deleteByPRPN($value);

	public function deleteByBLTSIZESTYL($value);

	public function deleteByCHEMPUMP($value);

	public function deleteByCHEMBRNDTYPE($value);

	public function deleteByBLTGRDPRES($value);

	public function deleteByFLTBASESUBST($value);

	public function deleteByHGHTSUB($value);

	public function deleteByCMNT($value);

	public function deleteByWELLSIGN($value);

	public function deleteByWELLSIGNLOC($value);


}
?>