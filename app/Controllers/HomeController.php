<?php

require_once(ROOT_PATH.'/core/Controller.php');


class HomeController extends Controller
{
    public function index()
    {

        $data= ['name'=>'John Doe'];
        $this->render('index',$data);
    }


    public function about()
    {
        $data= ['name'=>'John Doe','age'=>30];
        $this->render('about',$data);
    }
}
?>