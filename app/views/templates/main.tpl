<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Aplikacja</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
   </head>
   <body>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_root}carList" class="pure-menu-heading pure-menu-link">Lista</a>
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

{block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}
{/block}

    </body>
    </html>