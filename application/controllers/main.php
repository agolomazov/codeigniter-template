<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

    public function index(){

        parent::setToData('name', 'Антон Васильевич Голомазов');
        parent::render('index');

    }

}