<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-22 00:01:16
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\CarListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60d10c2ced3257_40424269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '475faa49f0750d76dfb44f72acbc4a4ea705fa0b' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\CarListTable.tpl',
      1 => 1624312875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d10c2ced3257_40424269 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="tab_car" class="pure-table pure-table-bordered fl-table">
<thead>
	<tr>
	    <th>ID samochodu</th>
		<th>VIM Samochodu</th>
		<th>Marka</th>
		<th>Model</th>
		<th>Rok</th>
		<th>Usterka</th>
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
<tr><td><?php echo $_smarty_tpl->tpl_vars['c']->value["id_car"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["samochod_vim"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["marka"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["model"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["rok"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["usterka"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_car'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" onclick="confirmLink('<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_car'];?>
','Czy na pewno usunąć rekord ?')">Usuń</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>


<nav aria-label="Page navigation example">
	<ul class="pagination">
		<?php ob_start();
echo $_smarty_tpl->tpl_vars['searchForm']->value->page > 1;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
		<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carPreviousPage?page=<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
'); return false;">Previous</a></li>
		<?php }?>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'page');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
			<li class="page-item"><a class="page-link" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['number'];?>
" name="page" onclick="ajaxReloadElement('table','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carTestPage?page=<?php echo $_smarty_tpl->tpl_vars['page']->value['number'];?>
'); return false;"><?php echo $_smarty_tpl->tpl_vars['page']->value['number'];?>
</a></li>

		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


		<?php ob_start();
echo $_smarty_tpl->tpl_vars['searchForm']->value->page < $_smarty_tpl->tpl_vars['searchForm']->value->last_page;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {?>
		<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carNextPage?page=<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
'); return false;">Next</a></li>
		<?php }?>
	</ul>
	<h5> Strona: <?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
/<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->last_page;?>
</h5>
</nav>




	<?php }
}
