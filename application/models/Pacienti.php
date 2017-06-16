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
class Application_Model_Pacienti
{
	protected $_id_pacient;
	protected $_nume_pacient;
	protected $_prenume_pacient;
	protected $_cnp;
	protected $_data_nastere;
	protected $_id_judet;
	protected $_id_orase;
	protected $_adresa;
	protected $_ocupatie;
	protected $_loc_munca;
	protected $_telefon;
	protected $_email;
	protected $_stare_civila;
	protected $_id_user;
	

	public function __construct(array $options = null)
	{
		if (is_array($options)) {
			$this->setOptions($options);
		}
	}
	public function __set($name, $value)
	{
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid user property');
		}
		$this->$method($value);
	}
	public function __get($name)
	{
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid user property');
		}
		return $this->$method();
	}
	public function setOptions(array $options)
	{
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods)) {
				$this->$method($value);
			}
		}
		return $this;
	}


    public function setId_pacient($id_pacient)
    {
    	$this->_id_pacient= (int) $id_pacient;
        return $this;
    }

    public function getId_pacient()
    {
    	return $this->_id_pacient;
    }
    
    
    public function setNume_pacient($nume_pacient)
    {
    	$this->_nume_pacient= (string) $nume_pacient;
    	return $this;
    }
    
    public function getNume_pacient()
    {
    	return $this->_nume_pacient;
    }
    
    
    public function setPrenume_pacient($prenume_pacient)
    {
    	$this->_prenume_pacient= (string) $prenume_pacient;
    	return $this;
    }
    
    public function getPrenume_pacient()
    {
    	return $this->_prenume_pacient;
    }
    
    
    public function setCnp($cnp)
    {
    	$this->_cnp= (int) $cnp;
    	return $this;
    }
    
    public function getCnp()
    {
    	return $this->_cnp;
    }
    
    
    public function setData_nastere($ts)
    {
    	$this->_data_nastere= $ts;
    	return $this;
    }
    
    public function getData_nastere()
    {
    	return $this->_data_nastere;
    }
    
    
    public function setId_judet($id_judet)
    {
    	$this->_id_judet= (int) $id_judet;
    	return $this;
    }
    
    public function getId_judet()
    {
    	return $this->_id_judet;
    }
    
    
    public function setId_orase($id_orase)
    {
    	$this->_id_orase= (int) $id_orase;
    	return $this;
    }
    
    public function getId_orase()
    {
    	return $this->_id_orase;
    }
    
    
    public function setAdresa($adresa)
    {
    	$this->_adresa= (string) $adresa;
    	return $this;
    }
    
    public function getAdresa()
    {
    	return $this->_adresa;
    }
    
    
    public function setOcupatie($ocupatie)
    {
    	$this->_ocupatie= (string) $ocupatie;
    	return $this;
    }
    
    public function getOcupatie()
    {
    	return $this->_ocupatie;
    }
  
    
    public function setLoc_munca($loc_munca)
    {
    	$this->_loc_munca= (string) $loc_munca;
    	return $this;
    }
    
    public function getLoc_munca()
    {
    	return $this->_loc_munca;
    }
    
    
    
    public function setTelefon($telefon)
    {
    	$this->_telefon= (int) $telefon;
    	return $this;
    }
    
    public function getTelefon()
    {
    	return $this->_telefon;
    }
    
    
    public function setEmail($email)
    {
    	$this->_email= (string) $email;
    	return $this;
    }
    
    public function getEmail()
    {
    	return $this->_email;
    }
    
    
    public function setStare_civila($stare_civila)
    {
    	$this->_stare_civila= (string) $stare_civila;
    	return $this;
    }
    
    public function getStare_civila()
    {
    	return $this->_stare_civila;
    }
    
    
    public function setId_user($id_user)
    {
    	$this->_id_user= (int) $id_user;
    	return $this;
    }
    
    public function getId_user()
    {
    	return $this->_id_user;
    }

}