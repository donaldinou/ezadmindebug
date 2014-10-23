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
    {if is_set($files)}
        {foreach $files as $key => $file}
            {if and( is_set($file.id), is_set($file.content), is_set($file.filesize) )}
                <div class="box-content">
                    <div class="context-attributes">
                        <table class="list" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <th>{if is_set($file.name)}{$file.name|wash()}{else}{'File : '|i18n('')} {$_key}{/if}</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="container_file_{$key}" title="{$file.id}" class="file-container" style="height:300px;overflow-y: scroll;color:#ffff00;background-color:#000000;padding-right:10px;padding-left:5px;">
                                            <div class="file_id">{$file.id}</div>
                                            <div class="file_filesize">{$file.filesize}</div>
                                            <div class="file_content">
                                               {$file.content|nl2br()}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="controlbar">
                    <div class="block">
                        &nbsp;
                    </div>
                </div>
            {/if}
        {/foreach}
    {else}
        <div class="box-content">
            <div class="context-attributes">
                {'There is no files to load'|i18n( 'design/admin/settings' )}
            </div>
        </div>
    {/if}
</div>

{def $authorized_lib = array( 'jquery' )}
{def $preferred_lib = ezini('eZJSCore', 'PreferredLibrary', 'ezjscore.ini')}{if $authorized_lib|contains( $preferred_lib )|not()}{set $preferred_lib = 'jquery'}{/if}
{ezscript_require( array( concat( 'ezjsc::', $preferred_lib ), concat( 'ezjsc::', $preferred_lib, 'io' ), concat( 'admindebugtail_', $preferred_lib, '.js' ) ) )}
{undef $authorized_lib $preferred_lib}