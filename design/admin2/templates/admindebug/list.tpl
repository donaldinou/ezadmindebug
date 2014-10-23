{def $exist = false()}

<form id="form_admin_debug_view" name="admin_debug_view" method="post" action="{'admindebug/view'|ezurl('no')}">
    <div class="context-block">
        <div class="box-header">
            <h1 class="context-title">
                <a href="#">{'admindebug'|class_icon( 'normal', 'eZ Admin Debug' )}</a>
                {'Debug Admin'|i18n('')}
            </h1>
            <div class="header-mainline">
                {* Nothing *}
            </div>
        </div>
        <div class="box-content">
            <div class="context-attributes">
                <div class="object">
                    <table class="list" width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <th class="tight">&nbsp;</th>
                                <th>{'Name'|i18n( 'design/admin/settings' )}</th>
                                <th>{'Path'|i18n( 'design/admin/settings' )}</th>
                                <th class="tight">&nbsp;</th>
                            </tr>
                            {if is_set($files)}
                                {foreach $files as $key => $file sequence array( 'bgdark', 'bglight' ) as $style}
                                    {if or(is_unset($file.name), is_unset($file.path))}
                                        {continue}
                                    {/if}
                                    {set $exist = true()}
                                    <tr valign="top" class="{$style}">
                                        <td width="1">
                                            <input type="checkbox"
                                                   id="file_list_{$key}"
                                                   name="FileList[]"
                                                   title="{'Select File to Interact with'|i18n('')}"
                                                   {if is_set($file.id)}value="{$file.id}"{else}disabeld="disabled"{/if} />
                                        </td>
                                        <td>{$file.name|wash()}</td>
                                        <td>{$file.path|wash()}</td>
                                        <td width="1">
                                            <a href="#" id="file_link_{$key}" class="flref">
                                                <img src="{'edit.gif'|ezimage('no')}" alt="{'Edit'|i18n('design/admin/settings')}" />
                                            </a>
                                        </td>
                                    </tr>
                                {/foreach}
                            {else}
                                <tr valign="top" class="bglight">
                                    <td colspan="4">{'There is no files to load'|i18n( 'design/admin/settings' )}</td>
                                </tr>
                            {/if}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="controlbar">
            <div class="block">
                <input class="button" type="submit" name="ViewButton" value="View selected" title="View selected.">
            </div>
        </div>
    </div>
</form>

{def $authorized_lib = array( 'jquery' )}
{def $preferred_lib = ezini('eZJSCore', 'PreferredLibrary', 'ezjscore.ini')}{if $authorized_lib|contains( $preferred_lib )|not()}{set $preferred_lib = 'jquery'}{/if}
{ezscript_require( array( concat( 'ezjsc::', $preferred_lib ), concat( 'ezjsc::', $preferred_lib, 'io' ), concat( 'admindebuglist_', $preferred_lib, '.js' ) ) )}
{undef $authorized_lib $preferred_lib}

{undef $exist}