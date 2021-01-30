{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}klientList">
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


<table id="tab_klient" class="pure-table pure-table-bordered fl-table">
<thead>
	<tr>
		<th>ID Wlasciciela</th>
		<th>nazwisko</th>
		<th>telefon</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
{foreach $klient as $k}
{strip}
	<tr>
		<td>{$k["wlasciciel_id"]}</td>
		<td>{$k["nazwisko"]}</td>
		<td>{$k["telefon"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}klientEdit/{$k['wlasciciel_id']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}klientDelete/{$k['wlasciciel_id']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
