{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}klientSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="nazwisko">Nazwisko</label>
            <input id="nazwisko" type="text" placeholder="Nazwisko" name="nazwisko" value="{$form->nazwisko}">
        </div>
		<div class="pure-control-group">
            <label for="telefon">Numer Telefon</label>
            <input id="Telefon" type="text" placeholder="Numer Telefonu" name="telefon" value="{$form->telefon}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}klientList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="wlasciciel_id" value="{$form->wlasciciel_id}">
</form>	
</div>

{/block}
