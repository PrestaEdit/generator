<?php

include('./classes/Tools.php');

if(Tools::getValue('action') == 'finish_step')
{	
	$temp_dir = dirname(__FILE__).'/tmp/';
	$file = time();
	$module_name = Tools::getValue('moduleName');
	$version = Tools::getValue('moduleVersion');
				
	zipDir($file, $module_name);	
	
	$file_name = Tools::toCamelCase(Tools::toModuleName($module_name));
		
	$data = array();
	$data['file'] = $file;
	$data['file_name'] = $file_name.'-'.$version.'.zip';
		
	die(json_encode($data));
}

function zipDir($file, $module_name)
{  
	$temp_dir = dirname(__FILE__).'/tmp/';	
	$index_file = file_get_contents(dirname(__FILE__).'/sources/index.php');
	$module_name = Tools::toCamelCase(Tools::toModuleName(Tools::getValue('moduleName')));
	
  	$zip = new ZipArchive();  
   
	if($zip->open($temp_dir.$file.'.zip', ZipArchive::CREATE) == TRUE)
  	{    	
  		// folder  	
		$zip->addEmptyDir($module_name);
		$zip->addFromString($module_name.'/index.php', $index_file);

		$bootstrap_file = file_get_contents(dirname(__FILE__) . '/sources/bootstrap.php');

		/*Prepare INSTALL_HOOKS*/
		$selectedHooks = Tools::getValue('selectedHooks');	
		$hooks = explode(",", $selectedHooks);
		$selectedHooks = '';
		$installHooks = '';
		foreach($hooks as $h => $hook)
		{
			if($h)
				$selectedHooks .= ' || !$this->registerHook(\''.$hook.'\')';
			else				
				$selectedHooks .= '!$this->registerHook(\''.$hook.'\')';

			$installHooks .= 'public function hook'.ucfirst($hook).'($params)';
			if(($h+1) < count($hooks))
				$installHooks .= "\n\t{\n\t\t\n\t}\n\t\n\t";
			else
				$installHooks .= "\n\t{\n\t\t\n\t}";
		}
		$hooks = "if(".$selectedHooks.")\n\t\t\t return false;";
		
		/* Parsing & replace */
		$Replace_Booststrap_Pattern = Array(
					'//*MODULE*//',
					'//*MODULE_NAME*//',
					'//*MODULE_TAB*//',
					'//*MODULE_VERSION*//',
					'//*MODULE_AUTHOR*//',
					'//*MODULE_DISPLAYNAME*//',
					'//*MODULE_DESCRIPTION*//',
					'//*INSTALL_HOOKS*//',
					'//*INSTALLS_HOOKS*//',
		);
		$Replace_Booststrap_Replacement = Array(
					Tools::toNoSpaceCase(ucwords(Tools::getValue('moduleName'))),
					Tools::toUnderscoreCase($module_name),
					Tools::getValue('moduleTab'),
					Tools::getValue('moduleVersion'),
					Tools::getValue('moduleAuthor'),
					Tools::getValue('moduleDisplayName'),
					Tools::getValue('moduleDescription'),
					$hooks,
					$installHooks,
		);
		$bootstrap_file = preg_replace($Replace_Booststrap_Pattern , $Replace_Booststrap_Replacement , $bootstrap_file);

		$zip->addFromString($module_name.'/'.$module_name.'.php', $bootstrap_file);
  		
  		//	folderControllers  	
  		if(Tools::getIsset('folderControllers') && Tools::getValue('folderControllers') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/controllers');
			$zip->addFromString($module_name.'/controllers/index.php', $index_file);
		}
		//		folderControllerAdmin
		if(Tools::getIsset('folderControllerAdmin') && Tools::getValue('folderControllerAdmin') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/controllers/admin');
			$zip->addFromString($module_name.'/controllers/admin/index.php', $index_file);
		}
		//		folderControllerFront
		if(Tools::getIsset('folderControllerFront') && Tools::getValue('folderControllerFront') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/controllers/front');
			$zip->addFromString($module_name.'/controllers/front/index.php', $index_file);
		}
		//	folderMails
		if(Tools::getIsset('folderMails') && Tools::getValue('folderMails') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/mails');
			$zip->addFromString($module_name.'/mails/index.php', $index_file);
		}
		//	folderModels
		if(Tools::getIsset('folderModels') && Tools::getValue('folderModels') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/models');
			$zip->addFromString($module_name.'/models/index.php', $index_file);
		}
		//	folderOverrides
		if(Tools::getIsset('folderOverrides') && Tools::getValue('folderOverrides') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/overrides');
			$zip->addFromString($module_name.'/overrides/index.php', $index_file);
		}
		//	folderPDF
		if(Tools::getIsset('folderPDF') && Tools::getValue('folderPDF') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/pdf');
			$zip->addFromString($module_name.'/pdf/index.php', $index_file);
		}
		//	folderSQL
		if(Tools::getIsset('folderSQL') && Tools::getValue('folderSQL') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/sql');
			$zip->addFromString($module_name.'/sql/index.php', $index_file);
		}
		//	folderTranslations
		if(Tools::getIsset('folderTranslations') && Tools::getValue('folderTranslations') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/translations');
			$zip->addFromString($module_name.'/translations/index.php', $index_file);
		}
		//	folderUpgrade
		if(Tools::getIsset('folderUpgrade') && Tools::getValue('folderUpgrade') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/upgrade');
			$zip->addFromString($module_name.'/upgrade/index.php', $index_file);
		}
		//	folderViews
		if(Tools::getIsset('folderViews') && Tools::getValue('folderViews') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views');
			$zip->addFromString($module_name.'/views/index.php', $index_file);
		}
		//	    folderViewsCSS
		if(Tools::getIsset('folderViewsCSS') && Tools::getValue('folderViewsCSS') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views/css');
			$zip->addFromString($module_name.'/views/css/index.php', $index_file);
		}
		//	    folderViewsImg
		if(Tools::getIsset('folderViewsImg') && Tools::getValue('folderViewsImg') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views/img');
			$zip->addFromString($module_name.'/views/img/index.php', $index_file);
		}
		//	    folderViewsJS
		if(Tools::getIsset('folderViewsJS') && Tools::getValue('folderViewsJS') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views/js');
			$zip->addFromString($module_name.'/views/js/index.php', $index_file);
		}
		//	    folderViewsTemplates
		if(Tools::getIsset('folderViewsTemplates') && Tools::getValue('folderViewsTemplates') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views/templates');
			$zip->addFromString($module_name.'/views/templates/index.php', $index_file);
		}
		//	        folderViewsTemplatesAdmin
		if(Tools::getIsset('folderViewsTemplatesAdmin') && Tools::getValue('folderViewsTemplatesAdmin') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views/templates/admin');
			$zip->addFromString($module_name.'/views/templates/admin/index.php', $index_file);
		}
		//	        folderViewsTemplatesFront
		if(Tools::getIsset('folderViewsTemplatesFront') && Tools::getValue('folderViewsTemplatesFront') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views/templates/front');
			$zip->addFromString($module_name.'/views/templates/front/index.php', $index_file);
		}
		//	        folderViewsTemplatesHook
		if(Tools::getIsset('folderViewsTemplatesHook') && Tools::getValue('folderViewsTemplatesHook') == 'on')
  		{
			$zip->addEmptyDir($module_name.'/views/templates/hook');
			$zip->addFromString($module_name.'/views/templates/hook/index.php', $index_file);
		}   
   
    	$zip->close();
  	}  
}
