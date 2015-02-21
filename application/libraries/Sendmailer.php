<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__DIR__).'/libraries/out/autoload.php';

/**
 * Class Sendmailer - класс для отправки писем с использование PHP mailer
 */
class Sendmailer extends PHPMailer{

    /**
     * @var - объект CodeIgniter
     */
    protected $CI;

    /**
     *  Контруктор класса - подгружает настройки из  конфигурационного файла и проводить базовую настройку объекта
     */
    public function __construct(){

        $this->CI = & get_instance();
        parent::__construct();

        $this->isSMTP();
        $this->SMTPAuth = true;
        $this->SMTPSecure = $this->CI->config->item('smtp_type');
        $this->Username = $this->CI->config->item('email_user');
        $this->Password = $this->CI->config->item('email_pass');
        $this->Host = $this->CI->config->item('email_smtp');
        $this->Port = $this->CI->config->item('smtp_port');
        $this->From = $this->CI->config->item('email_user');
        $this->isHTML(true);

    }


    /**
     *  Метод устанавливает подпись от кого будет приходить письмо
     *
     * @param $userLabel - имя, от кого будет приходить письмо
     */
    public function setSenderLabel($userLabel){
        $this->FromName = $userLabel;
        $this->From = $this->Username;
    }


    /**
     *  Метод устанавливает получателей письма
     *  формат - array('email', 'name')
     *
     * @param $recipients
     */
    public function setRecipient($email, $name){
        $this->addAddress($email, $name);
    }


    /**
     *  Метод расширяющий базовый - отправляет письмо
     *
     * @param $subject - тема письма
     * @param $text    - текст письма
     * @return mixed   - TRUE или FALSE
     */
    public function send($subject, $text){
        $this->Subject = $subject;
        $this->Body    = $text;
        parent::send();
    }

}
