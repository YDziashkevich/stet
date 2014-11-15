<?php
class ListController extends Controller
{
    public function indexAction()
    {
        $data = "";
        $this->view->render("list", $data);
    }
}