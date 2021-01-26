<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-26 21:47:57
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\CarEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60107ffd351cc1_37746975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '251a066d634f2dd60ac62b7365985a8426bfd4f0' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\CarEdit.tpl',
      1 => 1611694076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60107ffd351cc1_37746975 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_164138257160107ffd34dc18_56396297', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_164138257160107ffd34dc18_56396297 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_164138257160107ffd34dc18_56396297',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
carSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane samochodu</legend>
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
carList">Powrót</a>
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
