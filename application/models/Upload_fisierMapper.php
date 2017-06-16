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
class Application_Model_Upload_fisierMapper
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
	 * @return Application_Model_DbTable_Upload_Fisier
	 */
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Application_Model_DbTable_Upload_Fisier');
		}
		return $this->_dbTable;
	}
	
	
	/**
	 * Save data from model, when id is set, it will try and update
	 *
	 * @param Application_Model_Upload_Fisier instance
	 * @return void
	 */
	public function save(Application_Model_Upload_Fisier $upload_fisier)
	{
		$data = array(
				'id_upload'   => $upload_fisier->getId_upload(),
				'id_pacient' => $upload_fisier->getId_pacient(),
				'fisier' => $upload_fisier->getFisier(),
		);
		
		if (null === ($id_upload = $upload_fisier->getId_upload())) {
			unset($data['id_upload']);
			$this->getDbTable()->insert($data);
		} else {
			$this->getDbTable()->update($data, array('id_upload = ?' => $id_upload));
		}
	}
	
	
	/**
	 * Find a record of Model, when found model is set
	 *
	 * @param $id_upload
	 * @return Application_Model_Upload_Fisier
	 */
	public function find($id_upload, Application_Model_Upload_Fisier $upload_fisier)
	{
		$result = $this->getDbTable()->find($id_upload);
		if (0 == count($result)) {
			return;
		}
		$upload_fisier->setId_upload($row->id_upload)
		->setId_pacient($row->id_pacient)
		->setFisier($row->fisier);
	}
	
	
	/**
	 * Fetch all records from Model used
	 *
	 * @return array of Application_Model_Upload_Fisier
	 */
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_Upload_Fisier();
			$entry->setId_upload($row->id_upload)
				  ->setId_pacient($row->id_pacient)
			 	  ->setFisier($row->fisier);
			$entries[] = $entry;
		}
		return $entries;
	}
}
