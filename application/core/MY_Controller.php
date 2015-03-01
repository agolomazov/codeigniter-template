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
     * Берем значение шаблонизатора по умолчанию
     */
    protected function getTemplater()
    {
        return $this->config->item('default_template');
    }


    /**
     * @param $template - метод рендерит шаблон и выводит на экран
     */
    protected function render($template){

        $templater = $this->getTemplater();

        switch($templater){

            case 'smarty':
                $this->smartytemplater->assign('data', $this->data);
                $this->smartytemplater->display($template . '.tpl');
                break;
            default:
                $this->twigtemplater->render($template, $this->data);

        }

    }


    /**
     *  Устанавливаем данные для страницы
     * @param $key - ключ для элемента данных страницы
     * @param $value - значение для элемента данных страницы
     */
    protected function setToData($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     *  Метод проверяет, был ли пост запрос
     * @return bool - TRUE если был post запрос, в противном случае - FALSE
     */
    protected function is_post()
    {
        return ($_SERVER['REQUEST_METHOD'] == "POST") ? true : false;
    }

} 