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
class GuestbookController extends Zend_Controller_Action
{

    /**
     * Init()
     *
     * @return none
     */
    public function init()
    {
        // Called for every action.
         $this->_helper->layout->setLayout('guestbook');
    }


	/**
	 * Default Action
	 *
	 * @return null
	 */
	public function indexAction()
	{
        $guestbook = new Application_Model_GuestbookMapper();
        $this->view->entries = $guestbook->fetchAll();
	}
	
	
	/**
	 * Sign Action
	 *
	 * @return null
	 */
	public function signAction()
	{
		$request = $this->getRequest();
		$form    = new Application_Form_Guestbook();
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($request->getPost())) {
				$comment = new Application_Model_Guestbook($form->getValues());
				$mapper  = new Application_Model_GuestbookMapper();
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
		$mapper  = new Application_Model_GuestbookMapper();
		$resObjArr = $mapper->findGuestbook('foo@bar.com');
		var_dump($resObjArr);die();
	}
}