<?php
/*
 * Crazy Framework
 *
 * Copyright 2006-2011 by the Crazy Framework Team.
 * founder is : Teguh SCN (teguh_cahya2000@yahoo.com)
 * supported By : pusatide (http://pusatide.com)
 * All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 *
 */
 
 /*
 ROOTPATH = root of app
 INGINEPATH = root of engine
 */
	#url friendy = 1 ; using url friendly
	#url friendy = 0 ; without url friendly with classix request e.g index.php?cfo=objectMVC&cfu=functionofoobject&anotherparameter.....
	#url friendy = 2 ; without url friendly with modern request index.php/objectMVC/functionofoobject/anotherparametervalue
	$system['url_friendly'] = 1;
	$system['development']  = true;
	$system['loaders'] = '%ROOTPATH%assets/plugins/';
	$system['application'] = 'assets/modules';
	$system['application_ondir'] = false;
	$system['model'] = 'model';
	$system['view'] = 'view';
	$system['view_obj'] = false;
	$system['controller'] = 'controller';
	$system['baseurl'] = '/bop/';
	$system['library_dir'] = '%ROOTPATH%assets/libs/';
	$system['default_app'] = 'index';
	$system['default_caller'] = 'index';
	$system['upload_modules_dir'] = '%ROOTPATH%assets/uploads/';
	$system['image_url'] = '';
	#additional setting
	$system['themes'] = '%ROOTPATH%assets/templates/';
	$system['base_themes'] = 'bops/assets/templates/';
	$system['session_limit'] = 5*60;
	$system['title'] = 'APLIKASI BOP KORKOT';
	//$system['page_error'] = 'errors/raise';
	
	$system['SYS_TEMPLATE_EXTENSION'] = 'html';
	//$system['cache'] = '%ROOTPATH%comp/';
	//$system['SYS_TEMPLATES_PATH'] = '%ROOTPATH%pusatide/pusatide';
	$system['SYS_TEMPLATES_COMPATH'] = '%ROOTPATH%assets/cache/';
	
	#for caching page
	$system['page_cache'] = false;
	#cache limit on second
	$system['cache_limit'] = 1;
	
	
	#setting for database
	#we can setting on multiple connection on array key
	#array key default is default
	$system['database']['default']['db_type'] = 'mysql';
	$system['database']['default']['db_name'] = 'bop_l';
	$system['database']['default']['db_host'] = 'localhost';
	$system['database']['default']['db_user'] = 'adminbop';
	$system['database']['default']['db_pass'] = 'rahasia';
	$system['database']['default']['db_prefix'] = 'tc_';
	$system['database']['default']['db_port'] = '3308';
	$system['database']['default']['db_active'] = false;
	$system['database']['default']['db_cache'] = false;	
	# 3600*24; // cache 24 hours
	# time for db cache
	# optionals parameters
	$system['database']['default']['cacheSecs'] = 0;
	$system['database']['default']['debug'] = false;
	$system['database']['default']['db_option'] = 'persist=0&fetchmode=2&debug=0';
?>
