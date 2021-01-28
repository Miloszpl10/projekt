<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-28 23:32:35
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60133b833c9fb7_27089737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95d86070215b069553386b2db49f539c9631b647' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\templates\\main.tpl',
      1 => 1611873092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60133b833c9fb7_27089737 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>    
    <meta charset="utf-8">
    <title>Aplikacja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
   </head>
   <body>


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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56883595460133b833be9e8_81323699', 'top');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_103459318860133b833c0b64_76558903', 'bottom');
?>


<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_43949957360133b833c7aa7_73542684', 'messages');
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
    </html><?php }
/* {block 'top'} */
class Block_56883595460133b833be9e8_81323699 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_56883595460133b833be9e8_81323699',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_103459318860133b833c0b64_76558903 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_103459318860133b833c0b64_76558903',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'bottom'} */
/* {block 'messages'} */
class Block_43949957360133b833c7aa7_73542684 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_43949957360133b833c7aa7_73542684',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'messages'} */
}
