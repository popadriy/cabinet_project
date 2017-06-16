<?php

/**
  * Index page controller
  *
  * PHP version 5
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */

/**
  * Controller class
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */
class ScrisoareMedicalaController extends Zend_Controller_Action
{

    /**
     * Init()
     *
     * @return none
     */
    public function init()
    {
        // Called for every action.
         $this->_helper->layout->setLayout('scrisoareMedicala');
    }


	/**
	 * Default Action
	 *
	 * @return null
	 */
	public function indexAction()
	{
		$scrisoareMedicala= new Application_Model_ScrisoareMedicalaMapper();
		$this->view->entries = $scrisoareMedicala->fetchAll();
	}
	
	
	/**
	 * Sign Action
	 *
	 * @return null
	 */
	public function signAction()
	{
		$request = $this->getRequest();
		$form    = new Application_Form_ScrisoareMedicala();
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($request->getPost())) {
				$comment = new Application_Model_ScrisoareMedicala($form->getValues());
				$mapper  = new Application_Model_ScrisoareMedicalaMapper();
				$mapper->save($comment);
				return $this->_helper->redirector('index');
			}
		}
		
		$this->view->form = $form;
	}
	
	
	/**
	 * Sign Action
	 *
	 * @return null
	 */
	public function findAction()
	{
		$mapper  = new Application_Model_ScrisoareMedicalaMapper();
		$resObjArr = $mapper->findScrisoareMedicala('calea scrisorii');
		var_dump($resObjArr);die();
	}
}