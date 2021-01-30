<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-30 03:50:43
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\FaktHistory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6014c983b35003_81057613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74e9d733e0bb4b7434770df9027153dade65113c' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\FaktHistory.tpl',
      1 => 1611975039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6014c983b35003_81057613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1160281926014c983b16301_65605903', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18279531416014c983b21891_14993171', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1160281926014c983b16301_65605903 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1160281926014c983b16301_65605903',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
faktHistory">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="numer faktury" name="sf_faktura" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->faktura_numer;?>
" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
		<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
faktNew">+ Nowa faktura</a>

	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_18279531416014c983b21891_14993171 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_18279531416014c983b21891_14993171',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="/projekt/app/views/templates/css/Table.css">


<table id="tab_fakt" class="pure-table pure-table-bordered fl-table">
<thead>
	<tr>
	    <th>ID Faktury</th>
		<th>Numer Faktury</th>
		<th>Koszt</th>
		<th>Termin płatności</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fakt']->value, 'f');
$_smarty_tpl->tpl_vars['f']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['f']->value["id_fakt"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['f']->value["faktura_numer"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['f']->value["koszt"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['f']->value["termin_platnosci"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
faktEdit/<?php echo $_smarty_tpl->tpl_vars['f']->value['id_fakt'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
faktDelete/<?php echo $_smarty_tpl->tpl_vars['f']->value['id_fakt'];?>
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
