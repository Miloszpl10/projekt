<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-29 22:38:18
  from 'F:\Programy i Uczelnia\XAMPP\htdocs\projekt\app\views\templates\loginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6014804a892e08_05969473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd2f3cb95a77a01c05982221da39a0a1b0020aaf' => 
    array (
      0 => 'F:\\Programy i Uczelnia\\XAMPP\\htdocs\\projekt\\app\\views\\templates\\loginView.tpl',
      1 => 1611956206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6014804a892e08_05969473 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/projekt/app/views/templates/css/LoginView.css">
</head>

<body>

    <div class="login-dark">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" id="id_login" type="text" name="login" placeholder="User" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/></div>
            <div class="form-group"><input class="form-control" id="id_pass" type="password" name="pass" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
