<?php


/**
 * Class MY_Controller - мой базовый контроллер
 */
class MY_Controller extends CI_Controller
{

    /**
     * @var - данные страницы
     */
    protected $data;

    /**
     *  Возвращаем данные страницы
     * @return mixed - данные страницы
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     *  Устанавливаем данные для страницы
     * @param $key    - ключ для элемента данных страницы
     * @param $value  - значение для элемента данных страницы
     */
    protected function setToData($key, $value)
    {
        $this->data[$key] = $value;
    }

} 