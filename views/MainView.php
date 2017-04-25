<?php
class MainView {		
	private $name,$lvl,$type,$gender,$hunger,$thirst,$xp,$cssname;
	  function __construct() {
			$args = func_get_args();
			$this->name=$args[0];
			$this->lvl=$args[1];
			$this->type=$args[2];
			$this->gender=$args[3];
			$this->hunger=$args[4];
			$this->thirst=$args[5];
			$this->xp=$args[6];
			$this->cssname="main";
    }
	function Body($i){
		return ($i ==="start" ?  "<body>" :  "</body>");
		
	}
	function Head () {
		return "<!DOCTYPE html>
		<html lang='hu'>
		<head>
				<meta charset='utf-8'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<meta name='description' content=''>
				<meta name='author' content=''>

				<title>Main</title>

				<link href='".CSS_ROOT."css/bootstrap.min.css' rel='stylesheet'>
			<link href='https://fonts.googleapis.com/css?family=Nunito+Sans' rel='stylesheet'>
			<link rel='stylesheet' href='".CSS_ROOT."css/font-awesome.min.css'>
		</head>";
	}
	function NavBar(){
    return "<nav class='navbar navbar-inverse navbar-static-top' role='navigation'>
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='#'>KecskeNevelde</a>
            </div>
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav'>
                    <li>
                        <a href='#'>Főoldal</a>
                    </li>
                    <li>
                        <a href='#'>Küldetések</a>
                    </li>
                    <li>
                        <a href='#'>KECSKEEEEEE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>";
	}
function Content(){

 return '<div class="container">
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <div class="well">
                    <h4><i class="fa fa-user"></i> Profil</h4>
                    <div class="input-group">
				<p><b>Név: </b> '.$this->name.'</p>
					<p><b>Szint: </b>'.$this->lvl.'</p>
					<p><b>Típus: </b>'.$this->type.'</p>
					<p><b>Nem: </b>'.$this->gender.' </p>
					<p><b>Éhség: </b>'.$this->hunger.' / 100</p>
					<p><b>Szomj: </b>'.$this->thirst.' / 100</p>
					<p><b>XP: </b>'.$this->xp.' / 100</p>
					<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">
					<input type="submit" name="eszik" value="Egyél"/></form>
					<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">
					<input type="submit" name="iszik" value="Igyál"/>
					</form>			
					<form method="POST" action="logout.php">
					<input type="submit" value="Kijelentkezés"/>
					</form>
                    </div>
                </div>
            </div>			
        </div>';
}
function Footer(){
	return '<hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Kabát - KecskeNevelde 2017</p>
                </div>
            </div>
        </footer>

    </div>';
}	
}