<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Recaptcha - библиотека для работы с Google Recaptcha
 */
class Recaptcha {

    /**
     * @var string - url для отправки на проверку
     */
    protected $url_to_send = "https://www.google.com/recaptcha/api/siteverify";
    /**
     * @var string - публичный ключ для генерации капчи
     */
    protected $public_key;
    /**
     * @var string - закрытый ключ для проверки капчи
     */
    protected $private_key;
    /**
     * @var CI_Controller - объект CI
     */
    protected $CI;
    /**
     * @var string - вид капчи (светлый - light, темный - dark)
     */
    protected $skin;
    /**
     * @var string - тип капчи (image - картинка, audio - аудио)
     */
    protected $type;

    /**
     * Конструктор капчи
     */
    public function __construct(){

        $this->CI = & get_instance();
        $this->public_key = $this->CI->config->item('google_recaptcha_public');
        $this->private_key = $this->CI->config->item('google_recaptcha_private');
        $this->setSkin('light');
        $this->setType('image');

    }

    /**
     * @param $skin - метод для установки скина для капчи
     */
    public function setSkin($skin){

        switch($skin){
            case 'dark':
                $this->skin = $skin;
                break;
            default:
                $this->skin = 'light';
                break;
        }

    }

    /**
     * @param $type - метод для установки типа капчи
     */
    public function setType($type){

        switch($type){

            case 'audio':
                $this->type = $type;
                break;
            default:
                $this->type = 'image';
                break;

        }

    }

    /**
     * @return string - метод возвращает html код капчи
     */
    public function captchaHtml(){
        return "<div data-type='{$this->type}' data-theme='{$this->skin}' class='g-recaptcha' data-sitekey='{$this->public_key}'></div>";
    }


    /**
     *  Метод генерирует URL на который нужно поылать результат отработки капчи
     *
     * @param $recaptcha - данные введенные в капчу
     * @param $ip        - IP
     * @return string    - URL на который нужно отправлять данные
     */
    protected function getUrlToCatpcha($recaptcha, $ip){
        return $this->url_to_send.'?secret='. $this->private_key.'&response='.$recaptcha.'&ip='.$ip;
    }


    /**
     *  Метод проверки правильности заполнения капчи
     *
     * @param string $recaptcha - данные из формы
     * @param string $ip - IP пользователя, который отправляет форму
     * @return bool - TRUE капча пройдена, FALSE - если нет
     */
    public function check($recaptcha, $ip){

        // получаем УРЛ на который отправляем данные капчи
        $url = $this->getUrlToCatpcha($recaptcha, $ip);
        $data_request = file_get_contents($url);

        $data =  json_decode($data_request, true);

        if(isset($data['success']) && $data['success'] == 1){
            return true;
        } else {
            return false;
        }

    }

} 