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


<nav aria-label="Page navigation example">
	<ul class="pagination">
		{if {$searchForm->page > 1}}
		<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','{$conf->action_url}carPreviousPage?page={$searchForm->page}'); return false;">Previous</a></li>
		{/if}

		{foreach $pages as $page}
			<li class="page-item"><a class="page-link" value="{$page['number']}" name="page" onclick="ajaxReloadElement('table','{$conf->action_url}carTestPage?page={$page['number']}'); return false;">{$page['number']}</a></li>

		{/foreach}


		{if {$searchForm->page < $searchForm->last_page}}
		<li class="page-item"><a class="page-link" onclick="ajaxReloadElement('table','{$conf->action_url}carNextPage?page={$searchForm->page}'); return false;">Next</a></li>
		{/if}
	</ul>
	<h5> Strona: {$searchForm->page}/{$searchForm->last_page}</h5>
</nav>




	{*<div style="text-align: center;">
		{foreach $pages as $page}
			<input type="button" value="{$page['number']}" name="page"
				   onclick="ajaxReloadElement('table','{$conf->action_url}carTestPage?page={$page['number']}'); return false;">
		{/foreach}
	</div>*}