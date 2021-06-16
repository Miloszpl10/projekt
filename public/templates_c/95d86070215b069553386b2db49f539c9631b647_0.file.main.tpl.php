<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-08 18:30:22
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60bf9b1eca0672_75426674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95d86070215b069553386b2db49f539c9631b647' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\templates\\main.tpl',
      1 => 1623169686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:stronnicowanie.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60bf9b1eca0672_75426674 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>    
    <meta charset="utf-8">
    <title>Aplikacja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">
    <link rel="stylesheet" href=""/projekt/app/views/templates/css/Style.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/functions.js"><?php echo '</script'; ?>
>
   </head>
   <body  style="background: rgba(71, 147, 227, 1)";>
<div class="container contact-form ">

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
carList" class="pure-menu-heading pure-menu-link">Car</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
klientList" class="pure-menu-heading pure-menu-link">Klient</a>
<?php if (\core\RoleUtils::inRole("wlasciciel")) {?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
faktHistory" class="pure-menu-heading pure-menu-link">Faktury</a>
<?php }
if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
<?php } else { ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="pure-menu-heading pure-menu-link">Zaloguj</a>
<?php }?>
</div>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_30267048760bf9b1ec975c8_01619417', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163929649360bf9b1ec987f9_21532111', 'bottom');
?>



<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:stronnicowanie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </body>
    </html><?php }
/* {block 'top'} */
class Block_30267048760bf9b1ec975c8_01619417 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_30267048760bf9b1ec975c8_01619417',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_163929649360bf9b1ec987f9_21532111 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_163929649360bf9b1ec987f9_21532111',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'bottom'} */
}
