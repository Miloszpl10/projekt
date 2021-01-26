{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}klientList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwisko" name="sf_nazwisko" value="{$searchForm->nazwisko}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}klientNew">+ Nowa osoba</a>
</div>

<table id="tab_klient" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>wlasciciel_id</th>
		<th>nazwisko</th>
		<th>telefon</th>
		<th>samochod_vim</th>
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
		<td>{$k["samochod_vim"]}</td>
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

