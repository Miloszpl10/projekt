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
			<a class="button-small pure-button button-warning" onclick="confirmLink('{$conf->action_url}klientDelete/{$k['wlasciciel_id']}','Czy na pewno usunąć rekord ?')">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>