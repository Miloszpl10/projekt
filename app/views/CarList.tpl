{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}carList">
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
<a class="pure-button button-success" href="{$conf->action_root}carNew">+ Nowy samochód</a>
</div>

<table id="tab_car" class="pure-table pure-table-bordered">
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
{foreach $car as $c}
{strip}
	<tr>
		<td>{$c["samochod_vim"]}</td>
		<td>{$c["marka"]}</td>
		<td>{$c["model"]}</td>
		<td>{$c["rok"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}carEdit/{$c['samochod_vim']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}carDelete/{$c['samochod_vim']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
