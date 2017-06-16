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
class PacientiController extends Zend_Controller_Action
{
	
	/**
	 * Init()
	 *
	 * @return none
	 */
	public function init()
	{
		// Called for every action.
		$this->_helper->layout->setLayout('pacienti');
	}
	
	
	/**
	 * Default Action
	 *
	 * @return null
	 */
	public function indexAction()
	{
		$pacienti = new Application_Model_PacientiMapper();
		$this->view->entries = $pacienti->fetchAll();
	}
	
	
	/**
	 * Sign Action
	 *
	 * @return null
	 */
	public function signAction()
	{
		$request = $this->getRequest();
		$form    = new Application_Form_Pacienti();
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($request->getPost())) {
				$comment = new Application_Model_Pacienti($form->getValues());
				$mapper  = new Application_Model_PacientiMapper();
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
		$mapper  = new Application_Model_PacientiMapper();
		$resObjArr = $mapper->findPacienti('Buta');
		var_dump($resObjArr);die();
	}
}