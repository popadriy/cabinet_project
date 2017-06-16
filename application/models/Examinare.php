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
class Application_Model_Examinare
{
    protected $_id_examinare;
    protected $_tip_examinare;
    protected $_pret_examinare;

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



    public function setId_examinare($id_examinare)
    {
    	$this->_id_examinare = (int) $id_examinare;
        return $this;
    }

    public function getId_examinare()
    {
        return $this->_id_examinare;
    }
    
    public function setTip_examinare($tip_examinare)
    {
    	$this->_tip_examinare= (string) $tip_examinare;
    	return $this;
    }
    
    public function getTip_examinare()
    {
    	return $this->_tip_examinare;
    }
    
    public function setPret_examinare($pret_examinare)
    {
    	$this->_pret_examinare= (double) $pret_examinare;
    	return $this;
    }
    
    public function getPret_examinare()
    {
    	return $this->_pret_examinare;
    }
}