{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}faktHistory">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="numer faktury" name="sf_faktura" value="{$searchForm->faktura_numer}" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}faktNew">+ Nowa faktura</a>
</div>	

<table id="tab_fakt" class="pure-table pure-table-bordered">
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
{foreach $fakt as $f}
{strip}
	<tr>
	    <td>{$f["id_fakt"]}</td>
		<td>{$f["faktura_numer"]}</td>
		<td>{$f["koszt"]}</td>
		<td>{$f["termin_platnosci"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}faktEdit/{$f['id_fakt']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}faktDelete/{$f['id_fakt']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
