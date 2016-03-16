<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AgoRptDAO
	 */
	public static function getAgoRptDAO(){
		return new AgoRptMySqlExtDAO();
	}

	/**
	 * @return AgoTypeDAO
	 */
	public static function getAgoTypeDAO(){
		return new AgoTypeMySqlExtDAO();
	}

	/**
	 * @return EmpDAO
	 */
	public static function getEmpDAO(){
		return new EmpMySqlExtDAO();
	}

	/**
	 * @return GunBblDAO
	 */
	public static function getGunBblDAO(){
		return new GunBblMySqlExtDAO();
	}

	/**
	 * @return InventoryDAO
	 */
	public static function getInventoryDAO(){
		return new InventoryMySqlExtDAO();
	}

	/**
	 * @return ItemDAO
	 */
	public static function getItemDAO(){
		return new ItemMySqlExtDAO();
	}

	/**
	 * @return LeaseDAO
	 */
	public static function getLeaseDAO(){
		return new LeaseMySqlExtDAO();
	}

	/**
	 * @return LocationDAO
	 */
	public static function getLocationDAO(){
		return new LocationMySqlExtDAO();
	}

	/**
	 * @return ShopDAO
	 */
	public static function getShopDAO(){
		return new ShopMySqlExtDAO();
	}

	/**
	 * @return StateDAO
	 */
	public static function getStateDAO(){
		return new StateMySqlExtDAO();
	}

	/**
	 * @return StkTankDAO
	 */
	public static function getStkTankDAO(){
		return new StkTankMySqlExtDAO();
	}

	/**
	 * @return TankDAO
	 */
	public static function getTankDAO(){
		return new TankMySqlExtDAO();
	}

	/**
	 * @return TankRptDAO
	 */
	public static function getTankRptDAO(){
		return new TankRptMySqlExtDAO();
	}

	/**
	 * @return TimesheetDAO
	 */
	public static function getTimesheetDAO(){
		return new TimesheetMySqlExtDAO();
	}

	/**
	 * @return UsesDAO
	 */
	public static function getUsesDAO(){
		return new UsesMySqlExtDAO();
	}

	/**
	 * @return VclGalRptDAO
	 */
	public static function getVclGalRptDAO(){
		return new VclGalRptMySqlExtDAO();
	}

	/**
	 * @return VclRptDAO
	 */
	public static function getVclRptDAO(){
		return new VclRptMySqlExtDAO();
	}

	/**
	 * @return WellDAO
	 */
	public static function getWellDAO(){
		return new WellMySqlExtDAO();
	}

	/**
	 * @return WellTestRptDAO
	 */
	public static function getWellTestRptDAO(){
		return new WellTestRptMySqlExtDAO();
	}

	/**
	 * @return WellWtrRptDAO
	 */
	public static function getWellWtrRptDAO(){
		return new WellWtrRptMySqlExtDAO();
	}

	/**
	 * @return WtrTankDAO
	 */
	public static function getWtrTankDAO(){
		return new WtrTankMySqlExtDAO();
	}


}
?>