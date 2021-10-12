var base = location.protocol+'//'+location.host;

document.addEventListener('DOMContentLoaded', function(){
    var img_prod_gal = document.getElementById('img_prod_gal');
    var btn_img_prod_gal = document.getElementById('btn_img_prod_gal');
    btn_img_prod_gal.addEventListener('click', function(){
        img_prod_gal.click();
    }, false);

    img_prod_gal.addEventListener('change', function(){
        document.getElementById('form_galeria').submit();
    });
});


$(document).ready(function(){
    editor_init('editor');
})

function editor_init(field){
    CKEDITOR.replace(field,{
        // skin: 'moono-lisa',
        // extraPlugins: 'codesnippet,ajax,xml,textmatch,autocomplete,textwatcher,emoji,panelbutton,preview,wordcount',
        toolbar: [
            // {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']},
            {name: 'basicStyles', items: ['Bold', 'Italic',]},
            // {name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source']}
        ]
    });
}