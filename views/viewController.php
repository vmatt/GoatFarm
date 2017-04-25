<?php 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
define( 'CSS_ROOT', 'http://demo.valq.hu/' );
require_once('MainView.php');
class View {
	 public function MainView($userdata) {
		 $v = new MainView($userdata);
	 }
}
?>