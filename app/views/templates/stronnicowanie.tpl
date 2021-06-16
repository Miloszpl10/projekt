    <div style="text-align: center;">
        {foreach $pages as $page}
            <input type="submit" value="{$page['pageNumber']}" name="pageNumber"
                   onclick="ajaxPostForm('search-form','{$conf->action_root}action_carListPart?pageNumber={$page['pageNumber']}','all'); return false;"/>
        {/foreach}
        </div>