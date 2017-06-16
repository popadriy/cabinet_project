<?php
/**
 * ModelMapper file
 *
 * PHP version 5
 *
 * @category   tutorial
 * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
 * @since      File available since Release 1.0.1
 */

/**
 * ModelMapper class
 *
 * @category   tutorial
 * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
 * @since      File available since Release 1.0.1
 */
class Application_Model_ScrisoareMedicalaMapper
{
	/**
	 * Zend db table object
	 *
	 * @var Zend_Db_Table_Abstract
	 */
	
	protected $_dbTable;
	
	
	/**
	 * Set db table object
	 *
	 * @param string $dbTable
	 * @return this mapper class instance
	 */
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}
	
	
	/**
	 * Return instance of Zend_Db_Table_Abstract set for this mapper
	 *
	 * @return Application_Model_ScrisoareMedicala
	 */
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Application_Model_ScrisoareMedicala');
		}
		return $this->_dbTable;
	}
	
	
	/**
	 * Save data from model, when id is set, it will try and update
	 *
	 * @param Application_Model_ScrisoareMedicala instance
	 * @return void
	 */
	public function save(Application_Model_ScrisoareMedicala $scrisoareMedicala)
	{
		$data = array(
				'id_vizite'   => $scrisoareMedicala->getId_vizite(),
				'scrisoare_medicala' => $scrisoareMedicala->getScrisoareMedicala(),
				'id_user' => $scrisoareMedicala->getId_user(),
				'id_consult' => $scrisoareMedicala->getId_conslt(),
		);
		
		if (null === ($id_vizite = $scrisoareMedicala->getId_vizite())) {
			unset($data['id_vizite']);
			$this->getDbTable()->insert($data);
		} else {
			$this->getDbTable()->update($data, array('id_vizite = ?' => $id_vizite));
		}
	}
	
	
	/**
	 * Find a record of Model, when found model is set
	 *
	 * @param $id_vizite
	 * @return Application_Model_ScrisoareMedicala
	 */
	public function find($id_vizite, Application_Model_ScrisoareMedicala $scrisoareMedicala)
	{
		$result = $this->getDbTable()->find($id_vizite);
		if (0 == count($result)) {
			return;
		}
		$scrisoareMedicala->setId_vizite($row->id_vizite)
		->setScrisoareMedicala($row->scrisoare_medicala)
		->setId_user($row->id_user)
		->setId_consult ($row->id_consult);
	}
	
	
	/**
	 * Fetch all records from Model used
	 *
	 * @return array of Application_Model_ScrisoareMedicala
	 */
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_ScrisoareMedicala();
			$entry->setId_vizite($row->id_vizite)
				  ->setScrisoareMedicala($row->scrisoare_medicala)
				  ->setId_user($row->id_user)
				  ->setId_consult($row->id_consult);
			$entries[] = $entry;
		}
		return $entries;
	}
}
