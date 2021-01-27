<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-27 23:20:40
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\KlientEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6011e738647672_11849333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20eb4d8e6fb5df23b31bba999b033fc9f996422c' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\KlientEdit.tpl',
      1 => 1611700746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011e738647672_11849333 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9214354006011e738632b11_34160899', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_9214354006011e738632b11_34160899 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_9214354006011e738632b11_34160899',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
klientSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="nazwisko">Nazwisko</label>
            <input id="nazwisko" type="text" placeholder="Nazwisko" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
">
        </div>
		<div class="pure-control-group">
            <label for="telefon">Numer Telefon</label>
            <input id="Telefon" type="text" placeholder="Numer Telefonu" name="telefon" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->telefon;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
klientList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="wlasciciel_id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->wlasciciel_id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
