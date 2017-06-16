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
class Application_Model_CabinetMedicalMapper
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
     * @return Application_Model_DbTable_CabinetMedical
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_CabinetMedical');
        }
        return $this->_dbTable;
    }


    /**
     * Save data from model, when id is set, it will try and update
     *
     * @param Application_Model_CabinetMedical instance
     * @return void
     */
    public function save(Application_Model_CabinetMedical $cabinet_medical)
    {
        $data = array(
            'nume_cabinet'   => $cabinet_medical->getNume_cabinet(),
            'logo_cabinet' => $cabinet_medical->getLogo_cabinet(),
        	'nr_inregistrare' => $cabinet_medical->getNr_inregistrare(),
        	'cui' => $cabinet_medical->getCui(),
        	'cod_iban' => $cabinet_medical->getCod_iban(),
        	'banca' => $cabinet_medical->getBanca(),
            
        );

        if (null === ($id_cabinet = $id_cabinet->getId_cabinet())) {
            unset($data['id_cabinet']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id_cabinet = ?' => $id_cabinet));
        }
    }


    /**
     * Find a record of Model, when found model is set
     *
     * @param $id
     * @return Application_Model_CabinetMedical
     */
    public function find($id_cabinet, Application_Model_CabinetMedical $cabinet_medical)
    {
        $result = $this->getDbTable()->find($id_cabinet);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $cabinet_medical->setId_cabinet($row->id_cabinet)
        		  ->setNume_cabinet($row->nume_cabinet)
        		  ->setLogo_cabinet($row->logo_cabinet)
        		  ->setNr_inregistrare($row->nr_inregistrare)
        		  ->setCui($row->cui)
        		  ->setCod_iban($row->cod_iban)
        		  ->setBanca($row->banca);
    }


    /**
     * Fetch all records from Model used
     *
     * @return array of Application_Model_CabinetMedical
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_CabinetMedical();
            $entry->setId_cabinet($row->id_cabinet)
            ->setNume_cabinet($row->nume_cabinet)
            ->setLogo_cabinet($row->logo_cabinet)
            ->setNr_inregistrare($row->nr_inregistrare)
            ->setCui($row->cui)
            ->setCod_iban($row->cod_iban)
            ->setBanca($row->banca);
            $entries[] = $entry;
        }
        return $entries;
    }
}
