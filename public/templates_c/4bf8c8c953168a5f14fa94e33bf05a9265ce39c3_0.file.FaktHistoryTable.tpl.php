<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-22 00:41:16
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\FaktHistoryTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60d1158c2d0795_79959381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bf8c8c953168a5f14fa94e33bf05a9265ce39c3' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\FaktHistoryTable.tpl',
      1 => 1624315275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d1158c2d0795_79959381 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="tab_fakt" class="pure-table pure-table-bordered fl-table">
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
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" onclick="confirmLink('<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
faktDelete/<?php echo $_smarty_tpl->tpl_vars['f']->value['id_fakt'];?>
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
faktPreviousPage?page=<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
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
faktTestPage?page=<?php echo $_smarty_tpl->tpl_vars['page']->value['number'];?>
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
faktNextPage?page=<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
'); return false;">Next</a></li>
		<?php }?>
	</ul>
	<h5> Strona: <?php echo $_smarty_tpl->tpl_vars['searchForm']->value->page;?>
/<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->last_page;?>
</h5>
</nav><?php }
}
