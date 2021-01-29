<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-29 21:40:25
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\templates\messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601472b9acb9c3_55060616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '108cf57dcba94e52da2c42f7bdf6dd6372bef709' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\templates\\messages.tpl',
      1 => 1611952824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601472b9acb9c3_55060616 (Smarty_Internal_Template $_smarty_tpl) {
?> <link rel="stylesheet" href="/projekt/app/views/templates/css/Messages.css">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
<div class="messages bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
	<li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }
}
}
