{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}carSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane samochodu</legend>
		<div class="pure-control-group">
            <label for="samochod_vim">Vim samochodu</label>
            <input id="samochod_vim" type="text" placeholder="Vim samochodu" name="samochod_vim" value="{$form->samochod_vim}">
        </div>
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
        <div class="pure-control-group">
            <label for="usterka">Usterka</label>
            <input id="rok" type="text" placeholder="Usterka" name="usterka" value="{$form->usterka}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}carList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id_car" value="{$form->id_car}">
</form>
</div>

{/block}
