<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-16 21:00:39
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\FaktEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ca4a5708d0c5_14927955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e90be68a407c6cc3aa97d5b8ffcc15f2ef24e6f1' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\FaktEdit.tpl',
      1 => 1623870036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ca4a5708d0c5_14927955 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_98116522260ca4a5707b1a2_32707285', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_98116522260ca4a5707b1a2_32707285 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_98116522260ca4a5707b1a2_32707285',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
faktSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane faktury</legend>
		<div class="pure-control-group">
            <label for="faktura_numer">Numer Faktury</label>
            <input id="faktura_numer" type="text" placeholder="Numer faktury" name="faktura_numer" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->faktura_numer;?>
">
        </div>
		<div class="pure-control-group">
            <label for="koszt">Koszt</label>
            <input id="koszt" type="text" placeholder="Koszt" name="koszt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->koszt;?>
">
        </div>
		<div class="pure-control-group">
            <label for="termin_platnosci">Termin Płatności</label>
            <input id="termin_platnosci" type="text" placeholder="Termin płatności" name="termin_platnosci" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->termin_platnosci;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
faktHistory">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id_fakt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_fakt;?>
">
</form>
</div>

<?php
}
}
/* {/block 'top'} */
}
