{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}KlientList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="marka samochodu" name="sf_marka" value="{$searchForm->marka}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}KlientNew">+ Nowa osoba</a>
</div>	

<table id="tab_klient" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>VIM Samochodu</th>
		<th>Marka</th>
		<th>Model</th>
		<th>Rok</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
{foreach $klient as $k}
{strip}
	<tr>
		<td>{$k["samochod_vim"]}</td>
		<td>{$k["marka"]}</td>
		<td>{$k["model"]}</td>
		<td>{$k["rok"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}klientEdit/{$k['samochod_vim']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}klientDelete/{$k['samochod_vim']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
