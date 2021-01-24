{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="marka">Marka</label>
            <input id="marka" type="text" placeholder="Marka" name="marka" value="{$form->marka}">
        </div>
		<div class="pure-control-group">
            <label for="model">Model</label>
            <input id="model" type="text" placeholder="Model" name="model" value="{$form->model}">
        </div>
		<div class="pure-control-group">
            <label for="rok">Rok</label>
            <input id="rok" type="text" placeholder="Rok" name="rok" value="{$form->rok}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="samochd_vim" value="{$form->samochod_vim}">
</form>	
</div>

{/block}
