<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__DIR__).'/libraries/out/autoload.php';

class Twigtemplater{

    protected $CI;
    protected $twig;
    protected $loader;

    public function __construct(){
        $this->CI = & get_instance();

        $this->loader = new Twig_Loader_Filesystem(
            $this->CI->config->item('twig_skin_dir')
        );

        $this->twig = new Twig_Environment($this->loader, array(
            'cache' => $this->CI->config->item('twig_cache_dir'),
            'auto_reload' => true
        ));
    }


    public function render($template, $data){
        echo $this->twig->render($template.'.twig', $data);
    }

}