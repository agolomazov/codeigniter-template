<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

    public function index(){

        $this->twigtemplater->render('index', array(
            'name' => 'Антон Голомазов'
        ));

    }

}