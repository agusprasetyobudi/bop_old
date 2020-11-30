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
 abstract class CFViews
 {
	 abstract function cfs();
	 protected static function Boot()
	 {
		 $temp_name = explode('_',get_called_class());
		 $_REQUEST['CFSystem']['CFObject'][$temp_name[0]]['view'] =  get_called_class();	
	 }
	 
 }
?>