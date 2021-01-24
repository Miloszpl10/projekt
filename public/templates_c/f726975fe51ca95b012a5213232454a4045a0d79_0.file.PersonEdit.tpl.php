<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-23 17:09:48
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\PersonEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600c4a4ca5fc22_39368707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f726975fe51ca95b012a5213232454a4045a0d79' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\PersonEdit.tpl',
      1 => 1611418180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600c4a4ca5fc22_39368707 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_814704125600c4a4ca5bce3_07401919', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_814704125600c4a4ca5bce3_07401919 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_814704125600c4a4ca5bce3_07401919',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="marka">Marka</label>
            <input id="marka" type="text" placeholder="Marka" name="marka" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->marka;?>
">
        </div>
		<div class="pure-control-group">
            <label for="model">Model</label>
            <input id="model" type="text" placeholder="Model" name="model" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->model;?>
">
        </div>
		<div class="pure-control-group">
            <label for="rok">Rok</label>
            <input id="rok" type="text" placeholder="Rok" name="rok" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->rok;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="samochd_vim" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->samochod_vim;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
