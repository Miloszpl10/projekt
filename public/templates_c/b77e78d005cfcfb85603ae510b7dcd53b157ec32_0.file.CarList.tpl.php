<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-08 18:38:12
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\CarList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60bf9cf4207f71_40758466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b77e78d005cfcfb85603ae510b7dcd53b157ec32' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\CarList.tpl',
      1 => 1623170290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:CarListTable.tpl' => 1,
  ),
),false)) {
function content_60bf9cf4207f71_40758466 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_96830883060bf9cf41fedf9_49807997', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_186229765260bf9cf4204569_32824218', 'bottom');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_96830883060bf9cf41fedf9_49807997 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_96830883060bf9cf41fedf9_49807997',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
carListPart','table'); return false;">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="marka samochodu" name="sf_marka" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->marka;?>
" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>

        <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
carNew">+ Nowy samochód</a>

	</fieldset>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_186229765260bf9cf4204569_32824218 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_186229765260bf9cf4204569_32824218',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="/projekt/app/views/templates/css/Table.css">

<div id="table">
<?php $_smarty_tpl->_subTemplateRender("file:CarListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
