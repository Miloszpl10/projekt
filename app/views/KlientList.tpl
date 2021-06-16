{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','{$conf->action_root}klientListPart','table'); return false;">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwisko" name="sf_nazwisko" value="{$searchForm->nazwisko}" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
		<a class="pure-button button-success" href="{$conf->action_root}klientNew">+ Nowa osoba</a>

	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}
<link rel="stylesheet" href="/projekt/app/views/templates/css/Table.css">

<div id="table">
{include file="KlientListTable.tpl"}
</div>
{/block}
