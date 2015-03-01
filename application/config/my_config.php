<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


## Настройки для почты
$config['email_user'] = ''; // email с которого отправляются письма
$config['email_pass'] = ''; // пароль от почты
$config['email_smtp'] = ''; // smtp почты
$config['smtp_port']  = 465;
$config['smtp_type']  = 'ssl';

## Настройки для шаблонизатора Smarty
$config['smarty_dir']  = APPPATH.'/views/smarty/skins/';
$config['smarty_compile']  = APPPATH.'/views/smarty/compile';
$config['smarty_cache']  = APPPATH.'views/smarty/cache';
$config['smarty_skin'] = $config['smarty_dir'].'default/';
$config['smarty_enable_cache'] = false;

## Настройки для шаблонизатора Twig
$config['twig_cache_dir'] = APPPATH.'/views/twig/cache';
$config['twig_template_dir'] = APPPATH.'/views/twig/skins';
$config['twig_skin_dir'] = $config['twig_template_dir'].'/default';

## Настройки для google recaptcha
$config['google_recaptcha_private'] = "6LdYzgITAAAAAPOzfwAXNr3oQHu7nPhXM5gRDBhc";
$config['google_recaptcha_public']  = "6LdYzgITAAAAAE4CHE4Ps0diT-AH3z4mTiYAjNPA";