<table id="tab_car" class="pure-table pure-table-bordered fl-table">
<thead>
	<tr>
	    <th>ID samochodu</th>
		<th>VIM Samochodu</th>
		<th>Marka</th>
		<th>Model</th>
		<th>Rok</th>
		<th>Usterka</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
{foreach $car as $c}
{strip}
	<tr>
		<td>{$c["id_car"]}</td>
		<td>{$c["samochod_vim"]}</td>
		<td>{$c["marka"]}</td>
		<td>{$c["model"]}</td>
		<td>{$c["rok"]}</td>
		<td>{$c["usterka"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}carEdit/{$c['id_car']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" 
			onclick="confirmLink('{$conf->action_url}carDelete/{$c['id_car']}','Czy na pewno usunąć rekord ?')">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
<div style="text-align: center;">
	{foreach $pages as $page}
		<input type="button" value="{$page['pageNumber']}" name="pageNumber"
			   onclick="ajaxPostForm('search-form','{$conf->action_root}carListPart?','tab_car'); return false;"/>
	{/foreach}
</div>