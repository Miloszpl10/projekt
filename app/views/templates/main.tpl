<!doctype html>
<html lang="pl">
<head>    
    <meta charset="utf-8">
    <title>Aplikacja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">{*css od stronnicowania - numeracja stron*}
    <link rel="stylesheet" href=""/projekt/app/views/templates/css/Style.css">
    <script type="text/javascript" src="{$conf->app_url}/js/functions.js"></script>
   </head>
   <body  style="background: rgba(71, 147, 227, 1)";>
<div class="container contact-form ">

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_root}carList" class="pure-menu-heading pure-menu-link">Car</a>
	<a href="{$conf->action_root}klientList" class="pure-menu-heading pure-menu-link">Klient</a>
{if \core\RoleUtils::inRole("wlasciciel")}
	<a href="{$conf->action_root}faktHistory" class="pure-menu-heading pure-menu-link">Faktury</a>
{/if}
{if count($conf->roles)>0}
	<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
{else}
	<a href="{$conf->action_root}loginShow" class="pure-menu-heading pure-menu-link">Zaloguj</a>
{/if}
</div>

    {block name=top} Domyślna treść zawartości .... {/block}

{block name=bottom} {/block}


{include file="messages.tpl"}
</div>


{include file="footer.tpl"}

    </body>
    </html>