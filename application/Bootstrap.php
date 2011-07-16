<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView()
        {
            // Initialize view
            $view = new Zend_View();
            $view->setEncoding('UTF-8');
            $view->doctype('XHTML1_STRICT');
            $view->headTitle('Nama Yagja 2011');
            $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
            $view->addHelperPath('App/View/Helper' , 'App_View_Helper');
     
            // Add it to the ViewRenderer
            $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
                'ViewRenderer'
            );
            $viewRenderer->setView($view);
     
            // Return it, so that it can be stored by the bootstrap
            return $view;
        }
        
     public function _initRoutes()
        {

            $frontController = Zend_Controller_Front::getInstance();
            $router = $frontController->getRouter();

            $router->addRoute(
                    'testimonialsOnIndex', 
                    new Zend_Controller_Router_Route('/testimonials' , 
                            array('controller' => 'index',
                                  'action'     => 'testimonials'))
                    );
            
            $router->addRoute(
                    'registrationOnIndex', 
                    new Zend_Controller_Router_Route('/registration' , 
                            array('controller' => 'index',
                                  'action'     => 'registration'))
                    );
            
            $router->addRoute(
                    'contactusOnIndex', 
                    new Zend_Controller_Router_Route('/contactus' , 
                            array('controller' => 'index',
                                  'action'     => 'contactus'))
                    );
        }
}

