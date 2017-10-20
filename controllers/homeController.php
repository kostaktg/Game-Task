<?php
class homeController extends Controller{
    
    protected function Index(){
        $viewmodel = Home::getInstance();
        $viewmodel->index();
        $this->smarty->assign('data',$viewmodel->index());
        $this->smarty->show('home/index');
        
    }
}