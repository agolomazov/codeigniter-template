<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__DIR__).'/libraries/out/autoload.php';

/**
 * Class Smartytemplater - класс шаблонизатора, унаследованного от Smarty
 */
class Smartytemplater extends Smarty{

    /**
     * @var - объект CodeIgniter
     */
    protected $CI;

    /**
     *
     */
    public function __construct(){

        $this->CI = & get_instance();

        // Установка конфигурации
        $this->template_dir = $this->CI->config->item('smarty_skin');
        $this->compile_dir  = $this->CI->config->item('smarty_compile');
        $this->cache_dir    = $this->CI->config->item('smarty_cache');
        $this->caching      = $this->CI->config->item('smarty_enable_cache');


    }


}