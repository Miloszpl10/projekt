<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-16 21:01:20
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\FaktHistory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ca4a8025e503_39081075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74e9d733e0bb4b7434770df9027153dade65113c' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\FaktHistory.tpl',
      1 => 1623870079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:FaktHistoryTable.tpl' => 1,
  ),
),false)) {
function content_60ca4a8025e503_39081075 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_65246781860ca4a8024dfe1_30109270', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_49168911560ca4a80257881_10497329', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_65246781860ca4a8024dfe1_30109270 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_65246781860ca4a8024dfe1_30109270',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
faktHistoryPart','table'); return false;">
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
class Block_49168911560ca4a80257881_10497329 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_49168911560ca4a80257881_10497329',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="/projekt/app/views/templates/css/Table.css">

<div id="table">
<?php $_smarty_tpl->_subTemplateRender("file:FaktHistoryTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
