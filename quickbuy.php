<?php
if (!defined('_PS_VERSION_'))
{
  exit;
}

class QuickBuy extends Module
{
	public function __construct()
	{
	$this->name = 'quickbuy';
	$this->tab = 'front_office_features';
	$this->version = '1.0.0';
	$this->author = 'Werner Koppel';
	$this->need_instance = 0;
	$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	$this->bootstrap = true;

	parent::__construct();

	$this->displayName = $this->l('QuickBuy');
	$this->description = $this->l('QuickBuy - module for quick buying accesories/related products.');

	$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

	if (!Configuration::get('QUICKBUY_NAME'))
	  $this->warning = $this->l('No name provided');
	}
  

	public function install()
	{
	  if (Shop::isFeatureActive())
		Shop::setContext(Shop::CONTEXT_ALL);
	 
	  return parent::install() 
		&& $this->registerHook('displayHeader')
		;		
	}
	
	public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS(($this->_path).'js/quickbuy.js');
    }	

}
