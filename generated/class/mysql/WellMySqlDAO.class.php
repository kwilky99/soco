<?php
/**
 * Class that operate on table 'well'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class WellMySqlDAO implements WellDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WellMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM well WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM well';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM well ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param well primary key
 	 */
	public function delete($WELL_ID){
		$sql = 'DELETE FROM well WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($WELL_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WellMySql well
 	 */
	public function insert($well){
		$sql = 'INSERT INTO well (WELL_NAME, LEASE_ID, MAKE, PEAK_TRQ, BEAM_RTG, GEAR_BOX_SRL, GEAR_RTO, UNIT_SHV_SIZE, BEAM_WTS, CRNK_WTS, STRK, PIN_HOLE_DMG, BRKS_WRK, UNIT_LDR, STRK_LGTH, STRK_RATE, WELL_PND_FLD, OIL, WTR, ELTC_MTR, HP, VLTG, RPM, MTR_SHV_SIZE, PHASE, PHG_UNIT, MTR_FRM_STYL, NAT_GAS, PRPN, BLT_SIZE_STYL, CHEM_PUMP, CHEM_BRND_TYPE, BLT_GRD_PRES, FLTBASE_SUBST, HGHT_SUB, CMNT, WELL_SIGN, WELL_SIGN_LOC) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($well->wELLNAME);
		$sqlQuery->setNumber($well->lEASEID);
		$sqlQuery->set($well->mAKE);
		$sqlQuery->setNumber($well->pEAKTRQ);
		$sqlQuery->setNumber($well->bEAMRTG);
		$sqlQuery->set($well->gEARBOXSRL);
		$sqlQuery->set($well->gEARRTO);
		$sqlQuery->set($well->uNITSHVSIZE);
		$sqlQuery->setNumber($well->bEAMWTS);
		$sqlQuery->setNumber($well->cRNKWTS);
		$sqlQuery->set($well->sTRK);
		$sqlQuery->set($well->pINHOLEDMG);
		$sqlQuery->setNumber($well->bRKSWRK);
		$sqlQuery->setNumber($well->uNITLDR);
		$sqlQuery->set($well->sTRKLGTH);
		$sqlQuery->set($well->sTRKRATE);
		$sqlQuery->setNumber($well->wELLPNDFLD);
		$sqlQuery->set($well->oIL);
		$sqlQuery->set($well->wTR);
		$sqlQuery->set($well->eLTCMTR);
		$sqlQuery->set($well->hP);
		$sqlQuery->set($well->vLTG);
		$sqlQuery->setNumber($well->rPM);
		$sqlQuery->set($well->mTRSHVSIZE);
		$sqlQuery->setNumber($well->pHASE);
		$sqlQuery->setNumber($well->pHGUNIT);
		$sqlQuery->set($well->mTRFRMSTYL);
		$sqlQuery->setNumber($well->nATGAS);
		$sqlQuery->setNumber($well->pRPN);
		$sqlQuery->set($well->bLTSIZESTYL);
		$sqlQuery->setNumber($well->cHEMPUMP);
		$sqlQuery->set($well->cHEMBRNDTYPE);
		$sqlQuery->setNumber($well->bLTGRDPRES);
		$sqlQuery->set($well->fLTBASESUBST);
		$sqlQuery->set($well->hGHTSUB);
		$sqlQuery->set($well->cMNT);
		$sqlQuery->setNumber($well->wELLSIGN);
		$sqlQuery->set($well->wELLSIGNLOC);

		$id = $this->executeInsert($sqlQuery);	
		$well->wELLID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WellMySql well
 	 */
	public function update($well){
		$sql = 'UPDATE well SET WELL_NAME = ?, LEASE_ID = ?, MAKE = ?, PEAK_TRQ = ?, BEAM_RTG = ?, GEAR_BOX_SRL = ?, GEAR_RTO = ?, UNIT_SHV_SIZE = ?, BEAM_WTS = ?, CRNK_WTS = ?, STRK = ?, PIN_HOLE_DMG = ?, BRKS_WRK = ?, UNIT_LDR = ?, STRK_LGTH = ?, STRK_RATE = ?, WELL_PND_FLD = ?, OIL = ?, WTR = ?, ELTC_MTR = ?, HP = ?, VLTG = ?, RPM = ?, MTR_SHV_SIZE = ?, PHASE = ?, PHG_UNIT = ?, MTR_FRM_STYL = ?, NAT_GAS = ?, PRPN = ?, BLT_SIZE_STYL = ?, CHEM_PUMP = ?, CHEM_BRND_TYPE = ?, BLT_GRD_PRES = ?, FLTBASE_SUBST = ?, HGHT_SUB = ?, CMNT = ?, WELL_SIGN = ?, WELL_SIGN_LOC = ? WHERE WELL_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($well->wELLNAME);
		$sqlQuery->setNumber($well->lEASEID);
		$sqlQuery->set($well->mAKE);
		$sqlQuery->setNumber($well->pEAKTRQ);
		$sqlQuery->setNumber($well->bEAMRTG);
		$sqlQuery->set($well->gEARBOXSRL);
		$sqlQuery->set($well->gEARRTO);
		$sqlQuery->set($well->uNITSHVSIZE);
		$sqlQuery->setNumber($well->bEAMWTS);
		$sqlQuery->setNumber($well->cRNKWTS);
		$sqlQuery->set($well->sTRK);
		$sqlQuery->set($well->pINHOLEDMG);
		$sqlQuery->setNumber($well->bRKSWRK);
		$sqlQuery->setNumber($well->uNITLDR);
		$sqlQuery->set($well->sTRKLGTH);
		$sqlQuery->set($well->sTRKRATE);
		$sqlQuery->setNumber($well->wELLPNDFLD);
		$sqlQuery->set($well->oIL);
		$sqlQuery->set($well->wTR);
		$sqlQuery->set($well->eLTCMTR);
		$sqlQuery->set($well->hP);
		$sqlQuery->set($well->vLTG);
		$sqlQuery->setNumber($well->rPM);
		$sqlQuery->set($well->mTRSHVSIZE);
		$sqlQuery->setNumber($well->pHASE);
		$sqlQuery->setNumber($well->pHGUNIT);
		$sqlQuery->set($well->mTRFRMSTYL);
		$sqlQuery->setNumber($well->nATGAS);
		$sqlQuery->setNumber($well->pRPN);
		$sqlQuery->set($well->bLTSIZESTYL);
		$sqlQuery->setNumber($well->cHEMPUMP);
		$sqlQuery->set($well->cHEMBRNDTYPE);
		$sqlQuery->setNumber($well->bLTGRDPRES);
		$sqlQuery->set($well->fLTBASESUBST);
		$sqlQuery->set($well->hGHTSUB);
		$sqlQuery->set($well->cMNT);
		$sqlQuery->setNumber($well->wELLSIGN);
		$sqlQuery->set($well->wELLSIGNLOC);

		$sqlQuery->setNumber($well->wELLID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM well';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByWELLNAME($value){
		$sql = 'SELECT * FROM well WHERE WELL_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLEASEID($value){
		$sql = 'SELECT * FROM well WHERE LEASE_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMAKE($value){
		$sql = 'SELECT * FROM well WHERE MAKE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPEAKTRQ($value){
		$sql = 'SELECT * FROM well WHERE PEAK_TRQ = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBEAMRTG($value){
		$sql = 'SELECT * FROM well WHERE BEAM_RTG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGEARBOXSRL($value){
		$sql = 'SELECT * FROM well WHERE GEAR_BOX_SRL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGEARRTO($value){
		$sql = 'SELECT * FROM well WHERE GEAR_RTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUNITSHVSIZE($value){
		$sql = 'SELECT * FROM well WHERE UNIT_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBEAMWTS($value){
		$sql = 'SELECT * FROM well WHERE BEAM_WTS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCRNKWTS($value){
		$sql = 'SELECT * FROM well WHERE CRNK_WTS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySTRK($value){
		$sql = 'SELECT * FROM well WHERE STRK = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPINHOLEDMG($value){
		$sql = 'SELECT * FROM well WHERE PIN_HOLE_DMG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBRKSWRK($value){
		$sql = 'SELECT * FROM well WHERE BRKS_WRK = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUNITLDR($value){
		$sql = 'SELECT * FROM well WHERE UNIT_LDR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySTRKLGTH($value){
		$sql = 'SELECT * FROM well WHERE STRK_LGTH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySTRKRATE($value){
		$sql = 'SELECT * FROM well WHERE STRK_RATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWELLPNDFLD($value){
		$sql = 'SELECT * FROM well WHERE WELL_PND_FLD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOIL($value){
		$sql = 'SELECT * FROM well WHERE OIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWTR($value){
		$sql = 'SELECT * FROM well WHERE WTR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByELTCMTR($value){
		$sql = 'SELECT * FROM well WHERE ELTC_MTR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHP($value){
		$sql = 'SELECT * FROM well WHERE HP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVLTG($value){
		$sql = 'SELECT * FROM well WHERE VLTG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRPM($value){
		$sql = 'SELECT * FROM well WHERE RPM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMTRSHVSIZE($value){
		$sql = 'SELECT * FROM well WHERE MTR_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPHASE($value){
		$sql = 'SELECT * FROM well WHERE PHASE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPHGUNIT($value){
		$sql = 'SELECT * FROM well WHERE PHG_UNIT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMTRFRMSTYL($value){
		$sql = 'SELECT * FROM well WHERE MTR_FRM_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNATGAS($value){
		$sql = 'SELECT * FROM well WHERE NAT_GAS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPRPN($value){
		$sql = 'SELECT * FROM well WHERE PRPN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBLTSIZESTYL($value){
		$sql = 'SELECT * FROM well WHERE BLT_SIZE_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCHEMPUMP($value){
		$sql = 'SELECT * FROM well WHERE CHEM_PUMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCHEMBRNDTYPE($value){
		$sql = 'SELECT * FROM well WHERE CHEM_BRND_TYPE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBLTGRDPRES($value){
		$sql = 'SELECT * FROM well WHERE BLT_GRD_PRES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFLTBASESUBST($value){
		$sql = 'SELECT * FROM well WHERE FLTBASE_SUBST = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHGHTSUB($value){
		$sql = 'SELECT * FROM well WHERE HGHT_SUB = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCMNT($value){
		$sql = 'SELECT * FROM well WHERE CMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWELLSIGN($value){
		$sql = 'SELECT * FROM well WHERE WELL_SIGN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWELLSIGNLOC($value){
		$sql = 'SELECT * FROM well WHERE WELL_SIGN_LOC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByWELLNAME($value){
		$sql = 'DELETE FROM well WHERE WELL_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLEASEID($value){
		$sql = 'DELETE FROM well WHERE LEASE_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMAKE($value){
		$sql = 'DELETE FROM well WHERE MAKE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPEAKTRQ($value){
		$sql = 'DELETE FROM well WHERE PEAK_TRQ = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBEAMRTG($value){
		$sql = 'DELETE FROM well WHERE BEAM_RTG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGEARBOXSRL($value){
		$sql = 'DELETE FROM well WHERE GEAR_BOX_SRL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGEARRTO($value){
		$sql = 'DELETE FROM well WHERE GEAR_RTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUNITSHVSIZE($value){
		$sql = 'DELETE FROM well WHERE UNIT_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBEAMWTS($value){
		$sql = 'DELETE FROM well WHERE BEAM_WTS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCRNKWTS($value){
		$sql = 'DELETE FROM well WHERE CRNK_WTS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySTRK($value){
		$sql = 'DELETE FROM well WHERE STRK = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPINHOLEDMG($value){
		$sql = 'DELETE FROM well WHERE PIN_HOLE_DMG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBRKSWRK($value){
		$sql = 'DELETE FROM well WHERE BRKS_WRK = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUNITLDR($value){
		$sql = 'DELETE FROM well WHERE UNIT_LDR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySTRKLGTH($value){
		$sql = 'DELETE FROM well WHERE STRK_LGTH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySTRKRATE($value){
		$sql = 'DELETE FROM well WHERE STRK_RATE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWELLPNDFLD($value){
		$sql = 'DELETE FROM well WHERE WELL_PND_FLD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOIL($value){
		$sql = 'DELETE FROM well WHERE OIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWTR($value){
		$sql = 'DELETE FROM well WHERE WTR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByELTCMTR($value){
		$sql = 'DELETE FROM well WHERE ELTC_MTR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHP($value){
		$sql = 'DELETE FROM well WHERE HP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVLTG($value){
		$sql = 'DELETE FROM well WHERE VLTG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRPM($value){
		$sql = 'DELETE FROM well WHERE RPM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMTRSHVSIZE($value){
		$sql = 'DELETE FROM well WHERE MTR_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPHASE($value){
		$sql = 'DELETE FROM well WHERE PHASE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPHGUNIT($value){
		$sql = 'DELETE FROM well WHERE PHG_UNIT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMTRFRMSTYL($value){
		$sql = 'DELETE FROM well WHERE MTR_FRM_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNATGAS($value){
		$sql = 'DELETE FROM well WHERE NAT_GAS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPRPN($value){
		$sql = 'DELETE FROM well WHERE PRPN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBLTSIZESTYL($value){
		$sql = 'DELETE FROM well WHERE BLT_SIZE_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCHEMPUMP($value){
		$sql = 'DELETE FROM well WHERE CHEM_PUMP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCHEMBRNDTYPE($value){
		$sql = 'DELETE FROM well WHERE CHEM_BRND_TYPE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBLTGRDPRES($value){
		$sql = 'DELETE FROM well WHERE BLT_GRD_PRES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFLTBASESUBST($value){
		$sql = 'DELETE FROM well WHERE FLTBASE_SUBST = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHGHTSUB($value){
		$sql = 'DELETE FROM well WHERE HGHT_SUB = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCMNT($value){
		$sql = 'DELETE FROM well WHERE CMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWELLSIGN($value){
		$sql = 'DELETE FROM well WHERE WELL_SIGN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWELLSIGNLOC($value){
		$sql = 'DELETE FROM well WHERE WELL_SIGN_LOC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return WellMySql 
	 */
	protected function readRow($row){
		$well = new Well();
		
		$well->wELLID = $row['WELL_ID'];
		$well->wELLNAME = $row['WELL_NAME'];
		$well->lEASEID = $row['LEASE_ID'];
		$well->mAKE = $row['MAKE'];
		$well->pEAKTRQ = $row['PEAK_TRQ'];
		$well->bEAMRTG = $row['BEAM_RTG'];
		$well->gEARBOXSRL = $row['GEAR_BOX_SRL'];
		$well->gEARRTO = $row['GEAR_RTO'];
		$well->uNITSHVSIZE = $row['UNIT_SHV_SIZE'];
		$well->bEAMWTS = $row['BEAM_WTS'];
		$well->cRNKWTS = $row['CRNK_WTS'];
		$well->sTRK = $row['STRK'];
		$well->pINHOLEDMG = $row['PIN_HOLE_DMG'];
		$well->bRKSWRK = $row['BRKS_WRK'];
		$well->uNITLDR = $row['UNIT_LDR'];
		$well->sTRKLGTH = $row['STRK_LGTH'];
		$well->sTRKRATE = $row['STRK_RATE'];
		$well->wELLPNDFLD = $row['WELL_PND_FLD'];
		$well->oIL = $row['OIL'];
		$well->wTR = $row['WTR'];
		$well->eLTCMTR = $row['ELTC_MTR'];
		$well->hP = $row['HP'];
		$well->vLTG = $row['VLTG'];
		$well->rPM = $row['RPM'];
		$well->mTRSHVSIZE = $row['MTR_SHV_SIZE'];
		$well->pHASE = $row['PHASE'];
		$well->pHGUNIT = $row['PHG_UNIT'];
		$well->mTRFRMSTYL = $row['MTR_FRM_STYL'];
		$well->nATGAS = $row['NAT_GAS'];
		$well->pRPN = $row['PRPN'];
		$well->bLTSIZESTYL = $row['BLT_SIZE_STYL'];
		$well->cHEMPUMP = $row['CHEM_PUMP'];
		$well->cHEMBRNDTYPE = $row['CHEM_BRND_TYPE'];
		$well->bLTGRDPRES = $row['BLT_GRD_PRES'];
		$well->fLTBASESUBST = $row['FLTBASE_SUBST'];
		$well->hGHTSUB = $row['HGHT_SUB'];
		$well->cMNT = $row['CMNT'];
		$well->wELLSIGN = $row['WELL_SIGN'];
		$well->wELLSIGNLOC = $row['WELL_SIGN_LOC'];

		return $well;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return WellMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>