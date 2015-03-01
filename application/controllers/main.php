<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

    public function index(){

        if(parent::is_post()){
            $ip =  $_SERVER['REMOTE_ADDR'];
            $repcatcha = $this->input->post('g-recaptcha-response');

            if($this->recaptcha->check($repcatcha, $ip)){
                echo "Все ок";
            } else {
                echo "Что-то пошло не так";
            }

        }

        $this->twigtemplater->render('index', array(
            'name' => 'Антон Голомазов'
        ));

    }

}