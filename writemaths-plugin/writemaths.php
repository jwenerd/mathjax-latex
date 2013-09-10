<?php
/*
Plugin Name: Write maths, see maths
Plugin URI: http://christianp.github.com/writemaths
Description: Add instant MathJax preview to LaTeX being typed in text areas.
Version: 1.0
Author: Christian Perfect, contributions Jared Wenerd
Author URI: http://checkmyworking.com
License: Apache 2
 */
/*
   Copyright 2012 Christian Perfect

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
 */

class Writemaths_Plugin
{

	function Writemaths_Plugin(){

		add_action('wp_enqueue_scripts',array($this,'enqueue_scripts'));
	}

	function enqueue_scripts()
	{
    $this->plugin_url = plugin_dir_url(__FILE__);
    if(is_ssl()){
      $this->plugin_url = str_replace("http://", "https://", $this->plugin_url);
    }

		//these scripts get loaded everywhere. How do I get them to only load when I'm looking at a post? is_single() seems not to work here
		wp_enqueue_script('jquery_caretposition', $this->plugin_url . 'assets/jquery.caretposition.js',array('jquery'));
		wp_enqueue_script('textinputs_jquery', $this->plugin_url . 'assets/textinputs_jquery.js',array('jquery'));
		wp_enqueue_script('writemaths_plugin', $this->plugin_url . 'assets/writemaths.js',array('jquery','jquery_caretposition','textinputs_jquery','mathjax','jquery-ui-position'));
		wp_enqueue_script('writemaths_apply', $this->plugin_url . 'assets/writemaths_apply.js',array('writemaths_plugin'));
	}
}
?>
