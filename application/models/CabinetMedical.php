<?php
/**
  * Model file
  *
  * PHP version 5
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */

/**
  * Table Model class
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */
class Application_Model_CabinetMedical
{

    protected $_id;
    protected $_nume_cabinet;
    protected $_logo_cabinet;
    protected $_nr_inregistrare;
    protected $_cui;
    protected $_cod_iban;    
    protected $_banca;

    public function __construct(array $options = null)
    {
    	if (is_array($options)) {
    		$this->setOptions($options);
    	}
    }
    
    public function __set($nume, $value)
    {
    	
    	$numeArr = explode('_', $key);
    	$final = '';
    	foreach ($numeArr as $partialName) {
    		$final .= ucfirst($partialName);
    	}
    	
    	$method = 'set' . $final;
    	if (('mapper' == $nume) || !method_exists($this, $method)) {
    		throw new Exception('Invalid pacient property');
    	}
    	$this->$method($value);
    }
    
    public function __get($nume)
    {
    	$numeArr = explode('_', $nume);
    	$final = '';
    	foreach ($numeArr as $partialName) {
    		$final .= ucfirst($partialName);
    	}
    	$method = 'get' . $final;
    	
    	if (('mapper' == $nume) || !method_exists($this, $method)) {
    		var_dump($method);die();
    		throw new Exception('Invalid pacient property');
    	}
    	return $this->$method();
    }
    
    public function setOptions(array $options)
    {
    	$methods = get_class_methods($this);
    	foreach ($options as $key => $value) {
    		$numeArr = explode('_', $key);
    		$final = '';
    		foreach ($numeArr as $partialName) {
    			$final .= ucfirst($partialName);
    		}
    		
    		$method = 'set' . $final;
    		if (in_array($method, $methods)) {
    			$this->$method($value);
    		}
    	}
    	return $this;
    }

 

    public function setId_cabinet($id_cabinet)
    {
    	$this->_id_cabinet = (int) $id_cabinet;
        return $this;
    }

    public function getId_cabinet()
    {
        return $this->_id_cabinet;
    }
    
    
    public function setNume_cabinet($nume_cabinet)
    {
    	$this->_nume_cabinet = (string) $nume_cabinet;
    	return $this;
    }
    
    public function getNume_cabinet()
    {
    	return $this->_nume_cabinet;
    }
    
    
    public function setLogo_cabinet($logo_cabinet)
    {
    	$this->_logo_cabinet = (string) $logo_cabinet;
    	return $this;
    }
    
    public function getLogo_cabinet()
    {
    	return $this->_logo_cabinet;
    }
    
    
    public function setNr_inregistrare($nr_inregistrare)
    {
    	$this->_nr_inregistrare= (string) $nr_inregistrare;
    	return $this;
    }
    
    public function getNr_inregistrare()
    {
    	return $this->_nr_inregistrare;
    }
    
    
    public function setCui($cui)
    {
    	$this->_cui = (string) $cui;
    	return $this;
    }
    
    public function getCui()
    {
    	return $this->_cui;
    }
    
    
    public function setCod_iban($cod_iban)
    {
    	$this->_cod_iban = (string) $cod_iban;
    	return $this;
    }
    
    public function getCod_iban()
    {
    	return $this->_cod_iban;
    }
    
    
    public function setBanca($banca)
    {
    	$this->_banca = (string) $banca;
    	return $this;
    }
    
    public function getBanca()
    {
    	return $this->_banca;
    }
}