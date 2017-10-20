<?php
class boxController extends Controller{
    
    protected function Index(){
        // $viewmodel = Box::getInstance();
        // $viewmodel->index();
        $this->smarty->show('smarty');
    }

    protected function create($id){
        $viewmodel = Home::getInstance();
        $viewmodel->index();
        $this->smarty->assign('data',$viewmodel->index());
        $this->smarty->show('home/index');
    }
}