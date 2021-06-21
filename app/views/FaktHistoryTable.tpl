<table id="tab_fakt" class="pure-table pure-table-bordered fl-table">
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
			<a class="button-small pure-button button-warning"
            onclick="confirmLink('{$conf->action_url}faktDelete/{$f['id_fakt']}','Czy na pewno usunąć rekord ?')">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

<nav aria-label="Page navigation example">
	<ul class="pagination">
		{if {$searchForm->page > 1}}
			<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','{$conf->action_url}faktPreviousPage?page={$searchForm->page}'); return false;">Previous</a></li>
		{/if}

		{foreach $pages as $page}
			<li class="page-item"><a class="page-link" value="{$page['number']}" name="page" onclick="ajaxReloadElement('table','{$conf->action_url}faktTestPage?page={$page['number']}'); return false;">{$page['number']}</a></li>

		{/foreach}


		{if {$searchForm->page < $searchForm->last_page}}
			<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','{$conf->action_url}faktNextPage?page={$searchForm->page}'); return false;">Next</a></li>
		{/if}
	</ul>
	<h5> Strona: {$searchForm->page}/{$searchForm->last_page}</h5>
</nav>