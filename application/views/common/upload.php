<!--
/*
 * jQuery File Upload Plugin HTML Example 5.0.5
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://creativecommons.org/licenses/MIT/
 */
-->
<?php echo link_tag('common/style/blueimp-file-upload/jquery.fileupload-ui.css');?>
<div id="fileupload">
    <form action="<?php echo site_url('admin/'.$this->router->class.'/upload');?>" method="POST" enctype="multipart/form-data">
        <div class="fileupload-buttonbar">
            <label class="fileinput-button">
                <span><?php echo lang('add_files');?>...</span>
                <input type="file" name="files[]" multiple>
            </label>
            <button type="submit" class="start"><?php echo lang('start_upload');?></button>
            <button type="reset" class="cancel"><?php echo lang('cancel_upload');?></button>
            <button type="button" class="delete"><?php echo lang('delete_files');?></button>
        </div>
    </form>
    <div class="fileupload-content">
        <table class="files"></table>
        <div class="fileupload-progressbar"></div>
    </div>
</div>
<script id="template-upload" type="text/x-jquery-tmpl">
    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
        <td class="preview"></td>
        <td class="name">${name}</td>
        <td class="size">${sizef}</td>
        {{if error}}
            <td class="error" colspan="2">Error:
                {{if error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="progress"><div></div></td>
            <td class="start"><button><?php echo lang('start');?></button></td>
        {{/if}}
        <td class="cancel"><button><?php echo lang('cancel');?></button></td>
    </tr>
</script>
<script id="template-download" type="text/x-jquery-tmpl">
    <tr class="template-download{{if error}} ui-state-error{{/if}}">
        {{if error}}
            <td></td>
            <td class="name">${name}</td>
            <td class="size">${sizef}</td>
            <td class="error" colspan="2">Error:
                {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                {{else error === 3}}File was only partially uploaded
                {{else error === 4}}No File was uploaded
                {{else error === 5}}Missing a temporary folder
                {{else error === 6}}Failed to write file to disk
                {{else error === 7}}File upload stopped by extension
                {{else error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                {{else error === 'emptyResult'}}Empty file upload result
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="preview">
                {{if thumbnail_url}}
                    <a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
                {{/if}}
            </td>
            <td class="name">
                <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
            </td>
            <td class="size">${sizef}</td>
            <td colspan="2"></td>
        {{/if}}
        <td class="delete">
            <button data-type="${delete_type}" data-url="${delete_url}">
                <?php echo lang('delete');?>
            </button>
        </td>
    </tr>
</script>
<?php echo script_tag('common/script/blueimp-file-upload/jquery.fileupload.js');?>
<?php echo script_tag('common/script/blueimp-file-upload/jquery.fileupload-ui.js');?>
<?php echo script_tag('common/script/blueimp-file-upload/jquery.iframe-transport.js');?>
<?php echo script_tag('common/script/blueimp-file-upload/jquery.tmpl.js');?>
<?php echo script_tag('common/script/blueimp-file-upload/jquery.image-gallery.js');?>
<?php echo script_tag('common/script/blueimp-file-upload/application.js');?>
