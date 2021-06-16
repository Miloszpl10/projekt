<?php
/* Smarty version 3.1.34-dev-7, created on 2021-06-13 00:40:15
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\templates\stronnicowanie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60c537cfae74d9_94344541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a71128c6cfa9aa17956c9fe4ee16d0b45a63716' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\templates\\stronnicowanie.tpl',
      1 => 1623537614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60c537cfae74d9_94344541 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div style="text-align: center;">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'page');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
            <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['pageNumber'];?>
" name="pageNumber"
                   onclick="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
action_carListPart?pageNumber=<?php echo $_smarty_tpl->tpl_vars['page']->value['pageNumber'];?>
','all'); return false;"/>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div><?php }
}
