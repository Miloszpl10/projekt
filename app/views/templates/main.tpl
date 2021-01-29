<!doctype html>
<html lang="pl">
<head>    
    <meta charset="utf-8">
    <title>Aplikacja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
   </head>
   <body>


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

{include file="footer.tpl"}
    </body>
    </html>