<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-26 21:50:14
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\CarList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6010808689b894_01121701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b77e78d005cfcfb85603ae510b7dcd53b157ec32' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\CarList.tpl',
      1 => 1611694213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6010808689b894_01121701 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62026161060108086891251_50503366', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1640964470601080868947d6_18097642', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_62026161060108086891251_50503366 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_62026161060108086891251_50503366',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="marka samochodu" name="sf_marka" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->marka;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_1640964470601080868947d6_18097642 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_1640964470601080868947d6_18097642',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
carNew">+ Nowy samochód</a>
</div>

<table id="tab_car" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>VIM Samochodu</th>
		<th>Marka</th>
		<th>Model</th>
		<th>Rok</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['car']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['c']->value["samochod_vim"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["marka"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["model"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["rok"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['samochod_vim'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['samochod_vim'];?>
">Usuń</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
