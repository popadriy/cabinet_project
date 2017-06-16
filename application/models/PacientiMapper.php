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
class Application_Model_PacientiMapper
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
     * @return Application_Model_DbTable_Pacienti
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Pacienti');
        }
        return $this->_dbTable;
    }


    /**
     * Save data from model, when id is set, it will try and update
     *
     * @param Application_Model_Pacienti instance
     * @return void
     */
    public function save(Application_Model_Pacienti $pacienti)
    {
        $data = array(
        	'id_pacient'   => $pacienti->getId_pacient(),
        	'nume_pacient' => $pacienti->getNume_pacient(),
       		'prenume_pacient' => $pacienti->getPrenume_pacient(),
       		'cnp' => $pacienti->getCnp(),
       		'data_nastere' => $pacienti->getData_nastere(),
       		'id_judet' => $pacienti->getId_judet(),
       		'id_orase' => $pacienti->getId_orase(),
       		'adresa' => $pacienti->getAdresa(),
       		'ocupatie' => $pacienti->getOcupatie(),
       		'loc_munca' => $pacienti->getLoc_munca(),
        	'telefon' => $pacienti->getTelefon(),
        	'email' => $pacienti->getEmail(),
        	'stare_civila' => $pacienti->getStare_civila(),
        	'id_user' => $pacienti->getId_user(),
        );
        

        if (null === ($id_pacient = $pacienti->getId_pacient())) {
            unset($data['id_pacient']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id_pacient = ?' => $id_pacient));
        }
    }


    /**
     * Find a record of Model, when found model is set
     *
     * @param $id_pacient
     * @return Application_Model_Pacienti
     */
    public function find($id_pacient, Application_Model_Pacienti$pacienti)
    {
        $result = $this->getDbTable()->find($id_pacient);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $pacienti->setId_pacient($row->id_pacient)
        		 ->setNume_pacient($row->nume_pacient)
        		 ->setPrenume_pacient($row->prenume_pacient)
        		 ->setCnp($row->cnp)
        		 ->setData_nastere($row->data_nastere)
        		 ->setId_judet($row->id_judet)
        		 ->setId_orase($row->id_orase)
        		 ->setAdresa($row->adresa)
        		 ->setOcupatie($row->ocupatie)
        		 ->setLoc_munca($row->loc_munca)
        		 ->setTelefon($row->telefon)
        		 ->setEmail($row->email)
        		 ->setStare_civila($row->stare_civila)
        		 ->setId_user($row->id_user);
    }

   
    /**
     * Fetch all records from Model used
     *
     * @return array of Application_Model_Pacienti
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Pacienti();
            $entry->setId_pacient($row->id_pacient)
            	  ->setNume_pacient($row->nume_pacient)
            	  ->setPrenume_pacient($row->prenume_pacient)
            	  ->setCnp($row->cnp)
            	  ->setData_nastere($row->data_nastere)
            	  ->setId_judet($row->id_judet)
            	  ->setId_orase($row->id_orase)
            	  ->setAdresa($row->adresa)
            	  ->setOcupatie($row->ocupatie)
            	  ->setLoc_munca($row->loc_munca)
            	  ->setTelefon($row->telefon)
            	  ->setEmail($row->email)
            	  ->setStare_civila($row->stare_civila)
            	  ->setId_user($row->id_user);
            $entries[] = $entry;
        }
        return $entries;
    }
}
