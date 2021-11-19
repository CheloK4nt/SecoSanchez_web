var base = location.protocol+'//'+location.host;

var route = document.getElementsByName('routeName')[0].getAttribute('content');



// ACTIVADOR BOTON GALERIA PRODUCTOS
    document.addEventListener('DOMContentLoaded', function(){

        var preloader = document.getElementById('loader');
        if (route == "inicio") {
            window.onload = function(){
                setTimeout(function(){preloader.style.display = "none";}, 2000)
                // preloader.style.display = 'none';
            }
        } else {
            window.onload = function(){
                preloader.style.display = 'none';
            };
        }

        if (route == "polera.edit") {
            var img_prod_gal = document.getElementById('img_prod_gal');
            var btn_img_prod_gal = document.getElementById('btn_img_prod_gal');
            btn_img_prod_gal.addEventListener('click', function(){
            img_prod_gal.click();
            }, false);
    
            img_prod_gal.addEventListener('change', function(){
            document.getElementById('form_galeria').submit();
            });
        }else if(route == "cuadro.edit"){
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
        console.log(object, path, url);

        // IF ELIMINAR PROD
        if (action == "delete_prod") {
            action = "delete";
            var title = "¿Eliminar producto?";
            var text = "¡El producto será enviado a la papelera!";
            var icon = "warning";
            var cancel = "El producto no se ha eliminado";
            var confBtn = "Eliminar";
            var confColor = "#ff0000";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // =============================POLERA=============================//
        // IF ELIMINAR POLERA
        if (action == "delete_polera") {
            action = "delete";
            var title = "¿Eliminar producto?";
            var text = "¡El producto será enviado a la papelera!";
            var icon = "warning";
            var cancel = "El producto no se ha eliminado";
            var confBtn = "Eliminar";
            var confColor = "#ff0000";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // IF RESTAURAR POLERA
        if (action == "restore_polera") {
            action = "restore";
            var title = "¿Restaurar producto?";
            var text = "¡El producto volverá a estar activo!";
            var icon = "info";
            var cancel = "El producto sigue en la papelera";
            var confBtn = "Restaurar";
            var confColor = "#92bb85";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }
        // =============================FIN  POLERA=============================//

        // =============================CUADRO=============================//
        // IF ELIMINAR CUADRO
        if (action == "delete_cuadro") {
            action = "delete";
            var title = "¿Eliminar producto?";
            var text = "¡El producto será enviado a la papelera!";
            var icon = "warning";
            var cancel = "El producto no se ha eliminado";
            var confBtn = "Eliminar";
            var confColor = "#ff0000";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // IF RESTAURAR CUADRO
        if (action == "restore_cuadro") {
            action = "restore";
            var title = "¿Restaurar producto?";
            var text = "¡El producto volverá a estar activo!";
            var icon = "info";
            var cancel = "El producto sigue en la papelera";
            var confBtn = "Restaurar";
            var confColor = "#92bb85";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }
        // =============================FIN  CUADRO=============================//

        // =============================SPRAY=============================//
        // IF ELIMINAR SPRAY
        if (action == "delete_spray") {
            action = "delete";
            var title = "¿Eliminar producto?";
            var text = "¡El producto será enviado a la papelera!";
            var icon = "warning";
            var cancel = "El producto no se ha eliminado";
            var confBtn = "Eliminar";
            var confColor = "#ff0000";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // IF RESTAURAR CUADRO
        if (action == "restore_spray") {
            action = "restore";
            var title = "¿Restaurar producto?";
            var text = "¡El producto volverá a estar activo!";
            var icon = "info";
            var cancel = "El producto sigue en la papelera";
            var confBtn = "Restaurar";
            var confColor = "#92bb85";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }
        // =============================FIN  CUADRO=============================//

        // IF ELIMINAR DOSSIER
        if (action == "delete_dossier") {
            action = "delete";
            var title = "¿Eliminar dossier?";
            var text = "¡El dossier será enviado a la papelera!";
            var icon = "warning";
            var cancel = "El dossier no se ha eliminado";
            var confBtn = "Eliminar";
            var confColor = "#ff0000";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // IF RESTAURAR PRODUCTO
        if (action == "restore_prod") {
            action = "restore";
            var title = "¿Restaurar producto?";
            var text = "¡El producto volverá a estar activo!";
            var icon = "info";
            var cancel = "El producto sigue en la papelera";
            var confBtn = "Restaurar";
            var confColor = "#92bb85";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // IF ELIMINAR CATEGORIA
        if (action == "cat_delete") {
            action = "delete";
            var title = "¿Eliminar Categoría?";
            var text = "¡La categoría se eliminará definitivamente!";
            var icon = "info";
            var cancel = "La categoría no se ha eliminado";
            var confBtn = "Eliminar";
            var confColor = "#ff0000";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // IF ELIMINAR SLIDE
        if (action == "sli_delete") {
            action = "delete";
            var title = "¿Eliminar Slide?";
            var text = "¡El slide se eliminará definitivamente!";
            var icon = "info";
            var cancel = "El slide no se ha eliminado";
            var confBtn = "Eliminar";
            var confColor = "#ff0000";
            var cnclBtn = "Cancelar";
            var url = base + '/' + path + '/' + object + '/' + action;
        }

        // // IF AGREGAR PRODUCTO
        // if (action == "agregar_producto") {
        //     action = "store";
        //     var title = "¿Agregar producto?";
        //     var text = "¡El producto se guardará en la base de datos!";
        //     var icon = "info";
        //     var cancel = "Registro cancelado";
        //     var confBtn = "Agregar";
        //     var confColor = "#92bb85";
        //     var cnclBtn = "Cancelar";
        //     // var url = base + '/' + path + '/' + action;
        // }

        // // IF AGREGAR SLIDE
        // if (action == "agregar_slide") {
        //     action = "store";
        //     // var id_sli = document.getElementById('id_sli');
        //     // var id_sli = id_sli.getAttribute('value');
        //     var title = "¿Agregar slide?";
        //     var text = "¡El slide se guardará en la base de datos!";
        //     var icon = "info";
        //     var cancel = "Registro cancelado";
        //     var confBtn = "Agregar";
        //     var confColor = "#92bb85";
        //     var cnclBtn = "Cancelar";
        //     // var url = base + '/' + path + '/' + action;
        // }

        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: confColor,
            cancelButtonColor: '#55555',
            confirmButtonText: confBtn,
            cancelButtonText: cnclBtn,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = url;
            }
          }
        )
    }

    var text_max = 10;
    $('#count_message').html('0 / ' + text_max );

    $('#text').keyup(function() {
        var text_length = $('#text').val().length;
        var text_remaining = text_max - text_length;
  
        $('#count_message').html(text_length + ' / ' + text_max);
    });










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