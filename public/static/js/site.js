const route = document.getElementsByName('routeName')[0].getAttribute('content');
const base = location.protocol + '//' + location.host;
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content')
const auth = document.getElementsByName('auth')[0].getAttribute('content')
var page = 1;
var page_section = "";
var favorite_list = [];



document.addEventListener('DOMContentLoaded', function () {
    var preloader = document.getElementById('loader');
    var products_list = document.getElementById('products_list');
    var load_more_products = document.getElementById('load_more_products');
    if (route == "inicio") {
        window.onload = function () {
            setTimeout(function () { preloader.style.display = "none"; }, 2000)
        }
    } else {
        window.onload = function () {
            preloader.style.display = 'none';
        };
    }

    if (route == 'tienda') {
        load_products('tienda');

    }

    if (load_more_products) {
        load_more_products.addEventListener('click', function (e) {
            e.preventDefault();
            load_products(page_section);
        })
    }

});

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function load_products(section) {
    page_section = section;
    var url = base + '/md/api/load/products/' + page_section + '?page=' + page;
    http.open('GET', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            page = page + 1;
            // console.log(page);
            var data = this.responseText;
            data = JSON.parse(data);
            if (data.data.length == 0) {
                load_more_products.style.display = "none";
            }
            console.log(data.data);
            data.data.forEach(function (producto, index) {
                favorite_list.push(producto.id_prod);
                var precio_prod = addCommas(producto.precio_prod);
                var div = "";
                div += "<div class=\"product\">";                    
                    div += "<div class=\"image\">";
                        div += "<div class=\"overlay\">";
                            div += "<div class=\"btns\">";
                                if (auth == 1) {
                                    div += "<a href=\"\" id=\"favorito_"+producto.id_prod+"\" onclick=\"agregar_a_favoritos('"+producto.id_prod+"'); return false\" ><i class=\"fas fa-heart\"></i></a>";
                                }else{
                                    div += "<a href=\"\" id=\"favorito_"+producto.id_prod+"\" onclick=\"Swal.fire({title:':(', text:'¡Debes iniciar sesión para agregar productos a tus favoritos!', icon:'warning'}); return false\"><i class=\"fas fa-heart\"></i></a>";
                                }                                
                                div += "<br>";
                                div += "<a href=\"\"><i class=\"fas fa-cart-plus\"></i></a>";
                                div += "<br>";
                                div += "<a href=\""+base+"/product/"+producto.id_prod+"\"><i class=\"far fa-eye\"></i></a>";
                                div += "<br>";
                            div += "</div>";
                        div += "</div>";
                        // IMAGEN
                        if (producto.cat_prod == "polera") {
                            div += "<img src=\""+base+"/uploads/productos/poleras/"+producto.file_path+"/t_"+producto.img_prod+"\" class=\"img-fluid\">";
                        }
                    div += "</div>";
                    div += "<a href=\""+base+"/product/"+producto.id_prod+"\"  title=\""+producto.nom_prod+"\">";  
                        div += "<div class=\"title\">"+producto.nom_prod+"</div>";
                        // PRECIO
                        if (producto.en_dcto_prod == "si") {
                            div += "<div class=\"price\">"+"$"+precio_prod+" Oferta </div>";
                        }else{
                            div += "<div class=\"price\">"+"$"+precio_prod+"</div>";
                        }
                        

                        div += "<div class=\"options\"></div>";
                    div += "</a>";
                div += "</div>";
                div += "</div>";
                
                if (producto.cat_prod == "polera") {
                    div += "<img src=\""+base+"/uploads/productos/poleras/"+producto.file_path+"/t_"+producto.img_prod+"\" class=\"img-fluid\">";
                }else if(producto.cat_prod == "cuadro"){
                    div += "<img src=\""+base+"/uploads/productos/cuadros/"+producto.file_path+"/t_"+producto.img_prod+"\" class=\"img-fluid\">";
                }else if(producto.cat_prod == "spray"){
                    div += "<img src=\""+base+"/uploads/productos/sprays/"+producto.file_path+"/t_"+producto.img_prod+"\" class=\"img-fluid\">";
                }

                div += "</div>";
                div += "<a href=\"" + base + "/product/" + producto.id_prod + "\"  title=\"" + producto.nom_prod + "\">";
                div += "<div class=\"title\">" + producto.nom_prod + "</div>";
                div += "<div class=\"price\">" + "$" + precio_prod + "</div>";
                div += "<div class=\"options\"></div>";
                div += "</a>";
                div += "</div>";
                products_list.innerHTML += div;
            });

            if (auth == "1") {
                mark_user_favorites(favorite_list);
                favorite_list = [];
            }


        } else {
            // mensaje de error
        }
    }
}

function mark_user_favorites(favoritos) {
    var url = base + '/md/api/load/user/favorites';
    var params = 'productos=' + favoritos;
    http.open('POST', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.send(params);
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            data = JSON.parse(data);
            if (data.count > 0) {
                data.productos.forEach(function (favorito, index) {
                    document.getElementById('favorito_' + favorito).classList.add('favorite_active');
                })
            }
        }
    }
}

function agregar_a_favoritos(producto) {
    url = base + '/md/api/favorites/add/' + producto;
    http.open('POST', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            data = JSON.parse(data);
            if (data.status == "success") {
                document.getElementById('favorito_' + producto).classList.add('favorite_active');
            }
        }
    }
}