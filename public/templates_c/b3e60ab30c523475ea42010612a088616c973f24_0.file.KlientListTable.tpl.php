<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-08 18:53:22
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\KlientListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60bfa082666871_32184687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3e60ab30c523475ea42010612a088616c973f24' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\KlientListTable.tpl',
      1 => 1623171200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60bfa082666871_32184687 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="tab_klient" class="pure-table pure-table-bordered fl-table">
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
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" onclick="confirmLink('<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
klientDelete/<?php echo $_smarty_tpl->tpl_vars['k']->value['wlasciciel_id'];?>
','Czy na pewno usunąć rekord ?')">Usuń</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table><?php }
}
