<?php
use App\Libs\Controller;  // ถ้า IndexCtrl extends Controller
class OtherCtrl extends Controller
{
    public function index()
    {
        //echo "Hello from IndexCtrl";
         $this->render();
    }
    public function project($code,$x){
        //echo "Hello from IndexCtrl project $code";
        //$this->render('index.view', compact('code','x'));
    }
}
