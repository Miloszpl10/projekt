<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-24 18:27:25
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\FaktHistory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600dadfdbe03a9_99777818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74e9d733e0bb4b7434770df9027153dade65113c' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\FaktHistory.tpl',
      1 => 1611504960,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600dadfdbe03a9_99777818 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2127237951600dadfdbc42b9_46423840', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_879267394600dadfdbcbd54_74766155', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_2127237951600dadfdbc42b9_46423840 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_2127237951600dadfdbc42b9_46423840',
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
class Block_879267394600dadfdbcbd54_74766155 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_879267394600dadfdbcbd54_74766155',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
faktEdit">+ Nowa faktura</a>
</div>	

<table id="tab_fakt" class="pure-table pure-table-bordered">
<thead>
	<tr>
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
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["faktura_numer"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["koszt"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["termin_płatnosci"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
faktEdit/<?php echo $_smarty_tpl->tpl_vars['f']->value['faktura_numer'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
faktDelete/<?php echo $_smarty_tpl->tpl_vars['f']->value['faktura_numer'];?>
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
