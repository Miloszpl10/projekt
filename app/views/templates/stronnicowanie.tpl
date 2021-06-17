    <div style="text-align: center;">
        {foreach $pages as $page}
            <input type="button" value="{$page['pageNumber']}" name="pageNumber"
                   onclick="ajaxPostForm('search-form','{$conf->action_root}carListPart?','tab_car'); return false;"/>
        {/foreach}
        </div>