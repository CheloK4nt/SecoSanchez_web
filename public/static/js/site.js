const route = document.getElementsByName('routeName')[0].getAttribute('content');
const base = location.protocol+'//'+location.host;
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content')
var page = 1;
var page_section = "";


document.addEventListener('DOMContentLoaded', function(){
    var preloader = document.getElementById('loader');
    var products_list = document.getElementById('products_list');
    var load_more_products = document.getElementById('load_more_products');
    if (route == "inicio") {
        window.onload = function(){
            setTimeout(function(){preloader.style.display = "none";}, 2000)
        }
    } else {
        window.onload = function(){
            preloader.style.display = 'none';
        };
    }
    
    if (route == 'tienda') {
        load_products('tienda');
    }

    if (load_more_products) {
        load_more_products.addEventListener('click', function(e){
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

function load_products(section){
    page_section = section;
    var url = base + '/md/api/load/products/'+page_section+'?page='+page;
    http.open('GET', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            page = page + 1;
            console.log(page);
            var data = this.responseText;
            data = JSON.parse(data);
            if(data.data.length == 0){
                load_more_products.style.display = "none";
            }
            console.log(data.data);
            data.data.forEach( function(producto, index){
                var precio_prod = addCommas(producto.precio_prod);
                var div = "";
                div += "<div class=\"product\">";                    
                    div += "<div class=\"image\">";
                        div += "<div class=\"overlay\">";
                            div += "<div class=\"btns\">";
                                div += "<a href=\"\"><i class=\"far fa-heart\"></i></a>";
                                div += "<br>";
                                div += "<a href=\"\"><i class=\"fas fa-cart-plus\"></i></a>";
                                div += "<br>";
                                div += "<a href=\"\"><i class=\"far fa-eye\"></i></a>";
                                div += "<br>";
                            div += "</div>";
                        div += "</div>";
                        div += "<img src=\""+base+"/uploads/"+producto.file_path+"/t_"+producto.img_prod+"\" class=\"img-fluid\">";
                    div += "</div>";
                    div += "<a href=\""+base+"/product/"+producto.id_prod+"\">";  
                        div += "<div class=\"title\">"+producto.id_prod+"</div>";
                        div += "<div class=\"price\">"+"$"+precio_prod+"</div>";
                        div += "<div class=\"options\"></div>";
                    div += "</a>";
                div += "</div>";
                products_list.innerHTML += div;
            });
        }else{
            // mensaje de error
        }
    }
}