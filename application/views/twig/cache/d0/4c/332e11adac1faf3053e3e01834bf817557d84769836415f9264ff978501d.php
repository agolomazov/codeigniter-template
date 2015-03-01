<?php

/* index.twig */
class __TwigTemplate_d04c332e11adac1faf3053e3e01834bf817557d84769836415f9264ff978501d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <title>Тестовый шаблон</title>
    <script src=\"/libs/ckeditor/ckeditor.js\"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

    <h1>Тестовый шаблон</h1>

    ";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "

    <form action=\"\" method=\"post\">
        <div>
            ";
        // line 17
        echo (isset($context["captcha_html"]) ? $context["captcha_html"] : null);
        echo "
        </div>
        <input type=\"submit\" value=\"Отправить\"/>
    </form>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 17,  33 => 13,  19 => 1,);
    }
}
