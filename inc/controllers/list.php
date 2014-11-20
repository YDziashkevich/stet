<?php
class ListController extends Controller
{
    private $ListModel;
    public function __construct(){
        parent::__construct();
        $this->ListModel = new ListModel();
    }
    public function indexAction()
    {
        $data = "";
        $this->view->render("list", $data);
    }
}