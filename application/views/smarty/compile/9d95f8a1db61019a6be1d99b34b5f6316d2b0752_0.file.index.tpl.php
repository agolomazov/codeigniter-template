<?php /* Smarty version 3.1.22-dev/9, created on 2015-03-01 22:34:31
         compiled from "application//views/smarty/skins/default/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3050854f369c749cbb5_96674288%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d95f8a1db61019a6be1d99b34b5f6316d2b0752' => 
    array (
      0 => 'application//views/smarty/skins/default/index.tpl',
      1 => 1425238417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3050854f369c749cbb5_96674288',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/9',
  'unifunc' => 'content_54f369c75506d6_69876880',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_54f369c75506d6_69876880')) {
function content_54f369c75506d6_69876880 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '3050854f369c749cbb5_96674288';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тестовый шаблон</title>
</head>
<body>
    <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

</body>
</html><?php }
}
?>