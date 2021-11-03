class MDSlider{
    constructor(){
        this.slider_active = 0;
        this.items = document.getElementsByClassName('md-slider-item');
        this.elements = this.items.length -1;
        this.init();
    }

    init(){
        console.log('Slider Inicio');
        var mds_nav_prev = document.getElementById('mds_nav_prev');
        var mds_nav_next = document.getElementById('mds_nav_next');
        mds_nav_prev ? mds_nav_prev.addEventListener('click', function(){this.navigation('prev')}.bind(this)) : null ;
        mds_nav_next ? mds_nav_next.addEventListener('click', function(){this.navigation('next')}.bind(this)) : null ;
    }

    show(){        
        var pos, i;
        for(i=0; i < this.items.length; i++){
            pos = i*100;
            this.items[i].style.left = pos+'%';
            this.items[i].style.display = 'flex';
        }

        console.log('Slider Activo: '+this.slider_active+' - Total Slides: '+this.elements);
    }
    
    navigation(action){
        if (action == 'prev') {
            if(this.slider_active > 0){
                this.slider_active = this.slider_active - 1;
                var i,pos;
                for(i=0; i < this.items.length; i++){
                    pos = parseInt(this.items[i].style.left) + 100;
                    this.items[i].style.left = pos+'%';
                }
            }
        }

        if (action == 'next') {
            if(this.slider_active <  this.elements){
                this.slider_active = this.slider_active + 1;
                var i,pos;
                for(i=0; i < this.items.length; i++){
                    pos = parseInt(this.items[i].style.left) - 100;
                    this.items[i].style.left = pos+'%';
                }
            }
        }
    }
}