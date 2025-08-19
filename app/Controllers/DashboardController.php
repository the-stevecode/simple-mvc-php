<?php
class DashboardController extends SecureController
{
    public function __destruct() {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('dashboard/index', ['user'=>$this->user]);
    }
}
?>