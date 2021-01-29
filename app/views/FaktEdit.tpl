{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}faktSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane faktury</legend>
		<div class="pure-control-group">
            <label for="faktura_numer">Numer Faktury</label>
            <input id="faktura_numer" type="text" placeholder="Numer faktury" name="faktura_numer" value="{$form->faktura_numer}">
        </div>
		<div class="pure-control-group">
            <label for="koszt">Koszt</label>
            <input id="koszt" type="text" placeholder="Koszt" name="koszt" value="{$form->koszt}">
        </div>
		<div class="pure-control-group">
            <label for="termin_platnosci">Termin Płatności</label>
            <input id="termin_platnosci" type="text" placeholder="Termin płatności" name="termin_platnosci" value="{$form->termin_platnosci}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}faktHistory">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id_fakt" value="{$form->id_fakt}">
</form>
</div>

{/block}
