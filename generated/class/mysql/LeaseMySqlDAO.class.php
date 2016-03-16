<?php
/**
 * Class that operate on table 'lease'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-28 19:26
 */
class LeaseMySqlDAO implements LeaseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LeaseMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM lease WHERE LEASE_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM lease';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM lease ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param lease primary key
 	 */
	public function delete($LEASE_ID){
		$sql = 'DELETE FROM lease WHERE LEASE_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($LEASE_ID);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LeaseMySql lease
 	 */
	public function insert($lease){
		$sql = 'INSERT INTO lease (LEASE_NAME, LOCATION_ID, SHOP_CODE, STK_TANK_CODE, WTR_TANK_CODE, GUN_BBL_CODE, TNK_CMNT, LEASE_SIGN, MAKE, MODEL, PLGR_SIZE, PUMP_SHV_SIZE, MTR_SHV_SIZE, HP, VLTG, MTR_FRM_STYL, RPM, PHASE, BLT_SIZE_STYL, PH_UNIT, OP_PRES, INJ_RT, VOL_INJ_DLY, BLDNG, INJ_CMNT) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($lease->lEASENAME);
		$sqlQuery->setNumber($lease->lOCATIONID);
		$sqlQuery->set($lease->sHOPCODE);
		$sqlQuery->setNumber($lease->sTKTANKCODE);
		$sqlQuery->setNumber($lease->wTRTANKCODE);
		$sqlQuery->setNumber($lease->gUNBBLCODE);
		$sqlQuery->set($lease->tNKCMNT);
		$sqlQuery->setNumber($lease->lEASESIGN);
		$sqlQuery->set($lease->mAKE);
		$sqlQuery->set($lease->mODEL);
		$sqlQuery->set($lease->pLGRSIZE);
		$sqlQuery->set($lease->pUMPSHVSIZE);
		$sqlQuery->set($lease->mTRSHVSIZE);
		$sqlQuery->set($lease->hP);
		$sqlQuery->set($lease->vLTG);
		$sqlQuery->set($lease->mTRFRMSTYL);
		$sqlQuery->setNumber($lease->rPM);
		$sqlQuery->setNumber($lease->pHASE);
		$sqlQuery->set($lease->bLTSIZESTYL);
		$sqlQuery->setNumber($lease->pHUNIT);
		$sqlQuery->set($lease->oPPRES);
		$sqlQuery->set($lease->iNJRT);
		$sqlQuery->set($lease->vOLINJDLY);
		$sqlQuery->set($lease->bLDNG);
		$sqlQuery->set($lease->iNJCMNT);

		$id = $this->executeInsert($sqlQuery);	
		$lease->lEASEID = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LeaseMySql lease
 	 */
	public function update($lease){
		$sql = 'UPDATE lease SET LEASE_NAME = ?, LOCATION_ID = ?, SHOP_CODE = ?, STK_TANK_CODE = ?, WTR_TANK_CODE = ?, GUN_BBL_CODE = ?, TNK_CMNT = ?, LEASE_SIGN = ?, MAKE = ?, MODEL = ?, PLGR_SIZE = ?, PUMP_SHV_SIZE = ?, MTR_SHV_SIZE = ?, HP = ?, VLTG = ?, MTR_FRM_STYL = ?, RPM = ?, PHASE = ?, BLT_SIZE_STYL = ?, PH_UNIT = ?, OP_PRES = ?, INJ_RT = ?, VOL_INJ_DLY = ?, BLDNG = ?, INJ_CMNT = ? WHERE LEASE_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($lease->lEASENAME);
		$sqlQuery->setNumber($lease->lOCATIONID);
		$sqlQuery->set($lease->sHOPCODE);
		$sqlQuery->setNumber($lease->sTKTANKCODE);
		$sqlQuery->setNumber($lease->wTRTANKCODE);
		$sqlQuery->setNumber($lease->gUNBBLCODE);
		$sqlQuery->set($lease->tNKCMNT);
		$sqlQuery->setNumber($lease->lEASESIGN);
		$sqlQuery->set($lease->mAKE);
		$sqlQuery->set($lease->mODEL);
		$sqlQuery->set($lease->pLGRSIZE);
		$sqlQuery->set($lease->pUMPSHVSIZE);
		$sqlQuery->set($lease->mTRSHVSIZE);
		$sqlQuery->set($lease->hP);
		$sqlQuery->set($lease->vLTG);
		$sqlQuery->set($lease->mTRFRMSTYL);
		$sqlQuery->setNumber($lease->rPM);
		$sqlQuery->setNumber($lease->pHASE);
		$sqlQuery->set($lease->bLTSIZESTYL);
		$sqlQuery->setNumber($lease->pHUNIT);
		$sqlQuery->set($lease->oPPRES);
		$sqlQuery->set($lease->iNJRT);
		$sqlQuery->set($lease->vOLINJDLY);
		$sqlQuery->set($lease->bLDNG);
		$sqlQuery->set($lease->iNJCMNT);

		$sqlQuery->setNumber($lease->lEASEID);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM lease';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLEASENAME($value){
		$sql = 'SELECT * FROM lease WHERE LEASE_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLOCATIONID($value){
		$sql = 'SELECT * FROM lease WHERE LOCATION_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySHOPCODE($value){
		$sql = 'SELECT * FROM lease WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySTKTANKCODE($value){
		$sql = 'SELECT * FROM lease WHERE STK_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWTRTANKCODE($value){
		$sql = 'SELECT * FROM lease WHERE WTR_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGUNBBLCODE($value){
		$sql = 'SELECT * FROM lease WHERE GUN_BBL_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTNKCMNT($value){
		$sql = 'SELECT * FROM lease WHERE TNK_CMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLEASESIGN($value){
		$sql = 'SELECT * FROM lease WHERE LEASE_SIGN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMAKE($value){
		$sql = 'SELECT * FROM lease WHERE MAKE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMODEL($value){
		$sql = 'SELECT * FROM lease WHERE MODEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPLGRSIZE($value){
		$sql = 'SELECT * FROM lease WHERE PLGR_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPUMPSHVSIZE($value){
		$sql = 'SELECT * FROM lease WHERE PUMP_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMTRSHVSIZE($value){
		$sql = 'SELECT * FROM lease WHERE MTR_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHP($value){
		$sql = 'SELECT * FROM lease WHERE HP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVLTG($value){
		$sql = 'SELECT * FROM lease WHERE VLTG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMTRFRMSTYL($value){
		$sql = 'SELECT * FROM lease WHERE MTR_FRM_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRPM($value){
		$sql = 'SELECT * FROM lease WHERE RPM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPHASE($value){
		$sql = 'SELECT * FROM lease WHERE PHASE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBLTSIZESTYL($value){
		$sql = 'SELECT * FROM lease WHERE BLT_SIZE_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPHUNIT($value){
		$sql = 'SELECT * FROM lease WHERE PH_UNIT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOPPRES($value){
		$sql = 'SELECT * FROM lease WHERE OP_PRES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByINJRT($value){
		$sql = 'SELECT * FROM lease WHERE INJ_RT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVOLINJDLY($value){
		$sql = 'SELECT * FROM lease WHERE VOL_INJ_DLY = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBLDNG($value){
		$sql = 'SELECT * FROM lease WHERE BLDNG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByINJCMNT($value){
		$sql = 'SELECT * FROM lease WHERE INJ_CMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLEASENAME($value){
		$sql = 'DELETE FROM lease WHERE LEASE_NAME = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLOCATIONID($value){
		$sql = 'DELETE FROM lease WHERE LOCATION_ID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySHOPCODE($value){
		$sql = 'DELETE FROM lease WHERE SHOP_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySTKTANKCODE($value){
		$sql = 'DELETE FROM lease WHERE STK_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWTRTANKCODE($value){
		$sql = 'DELETE FROM lease WHERE WTR_TANK_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGUNBBLCODE($value){
		$sql = 'DELETE FROM lease WHERE GUN_BBL_CODE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTNKCMNT($value){
		$sql = 'DELETE FROM lease WHERE TNK_CMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLEASESIGN($value){
		$sql = 'DELETE FROM lease WHERE LEASE_SIGN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMAKE($value){
		$sql = 'DELETE FROM lease WHERE MAKE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMODEL($value){
		$sql = 'DELETE FROM lease WHERE MODEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPLGRSIZE($value){
		$sql = 'DELETE FROM lease WHERE PLGR_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPUMPSHVSIZE($value){
		$sql = 'DELETE FROM lease WHERE PUMP_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMTRSHVSIZE($value){
		$sql = 'DELETE FROM lease WHERE MTR_SHV_SIZE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHP($value){
		$sql = 'DELETE FROM lease WHERE HP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVLTG($value){
		$sql = 'DELETE FROM lease WHERE VLTG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMTRFRMSTYL($value){
		$sql = 'DELETE FROM lease WHERE MTR_FRM_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRPM($value){
		$sql = 'DELETE FROM lease WHERE RPM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPHASE($value){
		$sql = 'DELETE FROM lease WHERE PHASE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBLTSIZESTYL($value){
		$sql = 'DELETE FROM lease WHERE BLT_SIZE_STYL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPHUNIT($value){
		$sql = 'DELETE FROM lease WHERE PH_UNIT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOPPRES($value){
		$sql = 'DELETE FROM lease WHERE OP_PRES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByINJRT($value){
		$sql = 'DELETE FROM lease WHERE INJ_RT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVOLINJDLY($value){
		$sql = 'DELETE FROM lease WHERE VOL_INJ_DLY = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBLDNG($value){
		$sql = 'DELETE FROM lease WHERE BLDNG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByINJCMNT($value){
		$sql = 'DELETE FROM lease WHERE INJ_CMNT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LeaseMySql 
	 */
	protected function readRow($row){
		$lease = new Lease();
		
		$lease->lEASEID = $row['LEASE_ID'];
		$lease->lEASENAME = $row['LEASE_NAME'];
		$lease->lOCATIONID = $row['LOCATION_ID'];
		$lease->sHOPCODE = $row['SHOP_CODE'];
		$lease->sTKTANKCODE = $row['STK_TANK_CODE'];
		$lease->wTRTANKCODE = $row['WTR_TANK_CODE'];
		$lease->gUNBBLCODE = $row['GUN_BBL_CODE'];
		$lease->tNKCMNT = $row['TNK_CMNT'];
		$lease->lEASESIGN = $row['LEASE_SIGN'];
		$lease->mAKE = $row['MAKE'];
		$lease->mODEL = $row['MODEL'];
		$lease->pLGRSIZE = $row['PLGR_SIZE'];
		$lease->pUMPSHVSIZE = $row['PUMP_SHV_SIZE'];
		$lease->mTRSHVSIZE = $row['MTR_SHV_SIZE'];
		$lease->hP = $row['HP'];
		$lease->vLTG = $row['VLTG'];
		$lease->mTRFRMSTYL = $row['MTR_FRM_STYL'];
		$lease->rPM = $row['RPM'];
		$lease->pHASE = $row['PHASE'];
		$lease->bLTSIZESTYL = $row['BLT_SIZE_STYL'];
		$lease->pHUNIT = $row['PH_UNIT'];
		$lease->oPPRES = $row['OP_PRES'];
		$lease->iNJRT = $row['INJ_RT'];
		$lease->vOLINJDLY = $row['VOL_INJ_DLY'];
		$lease->bLDNG = $row['BLDNG'];
		$lease->iNJCMNT = $row['INJ_CMNT'];

		return $lease;
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
	 * @return LeaseMySql 
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