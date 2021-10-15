var base = location.protocol+'//'+location.host;

var route = document.getElementsByName('routeName')[0].getAttribute('content');

// ACTIVADOR BOTON GALERIA PRODUCTOS
    document.addEventListener('DOMContentLoaded', function(){
        if (route == "producto.edit") {
            var img_prod_gal = document.getElementById('img_prod_gal');
            var btn_img_prod_gal = document.getElementById('btn_img_prod_gal');
            btn_img_prod_gal.addEventListener('click', function(){
            img_prod_gal.click();
            }, false);
    
            img_prod_gal.addEventListener('change', function(){
            document.getElementById('form_galeria').submit();
            });
        }
        route_active = document.getElementsByClassName('lk-'+route)[0].classList.add('active');
// FIN SECCION

        // CONFIRMAR MODAL
        btn_confirmar_modal = document.getElementsByClassName('btn-confirmar-modal');
        for(i=0; i < btn_confirmar_modal.length; i++){
            btn_confirmar_modal[i].addEventListener('click', confirmar_modal);
        }


    }); 
    // "{{ route('producto.destroy',$prod->id_prod) }}"

    // MODAL
    function confirmar_modal(e){
        e.preventDefault();
        var object = this.getAttribute('data-object');
        var action = this.getAttribute('data-action');
        var path = this.getAttribute('data-path');
        var url = base + '/' + path + '/' + object + '/' + action;
        console.log(object, path, url);

        // IF ELIMINAR PRODUCTO
        if (action == "delete") {
            var title = "¿Eliminar producto?";
            var text = "¡El producto será enviado a la papelera!";
            var icon = "warning";
            var cancel = "El producto no se ha eliminado";
            var confBtn = "Eliminar";
            var cnclBtn = "Cancelar";
        }

        // IF RESTAURAR PRODUCTO
        if (action == "restore") {
            var title = "¿Restaurar producto?";
            var text = "¡El producto volverá a estar activo!";
            var icon = "info";
            var cancel = "El producto sigue en la papelera";
            var confBtn = "Restaurar";
            var cnclBtn = "Cancelar";
        }

        swal({
            title: title,
            text: text,
            icon: icon,
            buttons: true,
            dangerMode: true,
            buttons: {
                cancel : cnclBtn,
                confirm : {text: confBtn ,className:'sweet-warning'},
            },
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal(cancel);
            }
        });
    }










// $(document).ready(function(){
//     editor_init('editor');
// })

// function editor_init(field){
//     CKEDITOR.replace(field,{
//         // skin: 'moono-lisa',
//         // extraPlugins: 'codesnippet,ajax,xml,textmatch,autocomplete,textwatcher,emoji,panelbutton,preview,wordcount',
//         toolbar: [
//             // {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']},
//             {name: 'basicStyles', items: ['Bold', 'Italic',]},
//             // {name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source']}
//         ]
//     });
// }