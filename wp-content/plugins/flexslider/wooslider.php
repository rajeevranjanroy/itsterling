<?php
/*
Plugin Name: FlexSlider
Plugin URI: 
Description: Add responsive sliders to your website using shortcodes, template tags or widgets, to showcase custom slides, blog posts or other content in a responsive animated slider.
Version: 1.0.8
Author: Minti FlexSlider
Author URI: 
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
/*  Copyright 2012

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	require_once( 'classes/class-wooslider.php' );
	if ( ! is_admin() ) require_once( 'inc/wooslider-template.php' );

	global $wooslider;
	$wooslider = new WooSlider( __FILE__ );
	$wooslider->version = '1.0.8';
?>