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
<nav aria-label="Page navigation example">
	<ul class="pagination">
		{if {$searchForm->page > 1}}
			<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','{$conf->action_url}klientPreviousPage?page={$searchForm->page}'); return false;">Previous</a></li>
		{/if}

		{foreach $pages as $page}
			<li class="page-item"><a class="page-link" value="{$page['number']}" name="page" onclick="ajaxReloadElement('table','{$conf->action_url}klientTestPage?page={$page['number']}'); return false;">{$page['number']}</a></li>

		{/foreach}


		{if {$searchForm->page < $searchForm->last_page}}
			<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','{$conf->action_url}klientNextPage?page={$searchForm->page}'); return false;">Next</a></li>
		{/if}
	</ul>
	<h5> Strona: {$searchForm->page}/{$searchForm->last_page}</h5>
</nav>