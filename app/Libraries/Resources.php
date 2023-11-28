<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Libraries;

class Resources
{
	
	public function js($js_files = []){
		$js = NULL;
	    foreach ($js_files as  $js_file) {
	        $js .= '<script src="'.$js_file.'"></script>';
	    }

	    return $js;

	}

	public function css($css_files = []){
		$css = NULL;

	    foreach ($css_files as  $css_file) {
	        $css .= '<link href="'.$css_file.'" rel="stylesheet">';
	    }

	    return $css;

	}

}

/*
USE EXAMPLE
	
	in the controller
		
		// u must create an instance of the main controller
		$CI =& get_instance();

	    $CI->load->library('resources');
		

		// custom files arrays
	    $js_files = [
	        base_url('assets/caruvi/custom/js/profile/profile.js'),
	    ];
	    $css_files = [
	        base_url('assets/caruvi/custom/css/profile/profile.css'),
	    ];


		// var for the view
	    $data['css_files'] = $CI->resources->css($css_files);
	    $data['js_files']  = $CI->resources->js($js_files);

	    $this->load->view('your-view', $data);


    in the view

    	<?php echo (isset($css_files)) ? $css_files : '' ; ?>
    	<?php echo (isset($js_files))  ? $js_files  : '' ; ?>

*/


