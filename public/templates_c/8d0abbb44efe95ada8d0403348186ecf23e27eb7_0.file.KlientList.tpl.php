<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-30 03:50:43
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\KlientList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6014c983193807_88584458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d0abbb44efe95ada8d0403348186ecf23e27eb7' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\KlientList.tpl',
      1 => 1611975039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6014c983193807_88584458 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11602032996014c9831732c1_67496398', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7392906756014c98317f870_65080569', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_11602032996014c9831732c1_67496398 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_11602032996014c9831732c1_67496398',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
klientList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwisko" name="sf_nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwisko;?>
" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
		<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
klientNew">+ Nowa osoba</a>

	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_7392906756014c98317f870_65080569 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_7392906756014c98317f870_65080569',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="/projekt/app/views/templates/css/Table.css">


<table id="tab_klient" class="pure-table pure-table-bordered fl-table">
<thead>
	<tr>
		<th>ID Wlasciciela</th>
		<th>nazwisko</th>
		<th>telefon</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['klient']->value, 'k');
$_smarty_tpl->tpl_vars['k']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
$_smarty_tpl->tpl_vars['k']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['k']->value["wlasciciel_id"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["nazwisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["telefon"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
klientEdit/<?php echo $_smarty_tpl->tpl_vars['k']->value['wlasciciel_id'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
klientDelete/<?php echo $_smarty_tpl->tpl_vars['k']->value['wlasciciel_id'];?>
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
