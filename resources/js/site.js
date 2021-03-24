
            // import AOS from 'aos';
            // AOS.init();
            
                        
            /////////////////////////     
            // Script Tab panel click
            /////////////////////////
            const tabs = document.querySelectorAll(".tabs");
            const tab = document.querySelectorAll(".tab");
            const panel = document.querySelectorAll(".tab-content");
            var testActive;
            var testNoActive; 
            
            if (siteDarkMode == 1) {// costante valorizzata nello script della pagina blade
              testActive = "text-gray-800";
              testNoActive = "dark:text-gray-500";
            } else {
              testActive = "text-gray-800";
              testNoActive = "text-gray-500";
            }

            function onTabClick(event) {

                for (let i = 0; i < tab.length; i++) {
                    tab[i].classList.remove("active");
                    tab[i].classList.remove(testActive);
                    tab[i].classList.add(testNoActive);
                }

                for (let i = 0; i < panel.length; i++) {
                    panel[i].classList.remove("active");
                    panel[i].classList.remove("block"); 
                    panel[i].classList.add('hidden');
                }
                
                event.target.classList.add('active');
                event.target.classList.remove(testNoActive);
                event.target.classList.add(testActive);
                
                let classString = event.target.getAttribute('data-target');
                
                document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active");
                document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("block");
                document.getElementById('panels').getElementsByClassName(classString)[0].classList.remove("hidden");
                // AOS.refreshHard();
            }

            for (let i = 0; i < tab.length; i++) {
                tab[i].addEventListener('click', onTabClick, false);
            }

            //////////////////
            // Gestione modali
            ////////////////// 
            const openEls = document.querySelectorAll("[data-open]");
            const closeEls = document.querySelectorAll("[data-close]");
            const isVisible = "is-visible";

            for (const el of openEls) {
                el.addEventListener("click", function() {
                    const modalId = this.dataset.open;
                    document.getElementById(modalId).classList.add(isVisible);
                });
            }

            for (const el of closeEls) {
                el.addEventListener("click", function() {
                    this.parentElement.parentElement.parentElement.classList.remove(isVisible);
                });
            }

            document.addEventListener("click", e => {
                if (e.target == document.querySelector(".modal.is-visible")) {
                    document.querySelector(".modal.is-visible").classList.remove(isVisible);
                }
            });

            document.addEventListener("keyup", e => {
                if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
                    document.querySelector(".modal.is-visible").classList.remove(isVisible);
                }
            });


            /////////////////////////////////////////////////////
            // Codice per pulsante che torna in cima allo schermo
            ///////////////////////////////////////////////////// 
            var backToTopButton = document.getElementById("backToTopButton");
            // backToTopButton.style.display = "none"; // alternativa ad animazione aos.js

            // Dopo uno scroll di  20px mostra il pulsante  
            window.onscroll = function() { scrollFunction() };

            function scrollFunction() {
                // alternativa ad animazione aos.js
                // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                //     backToTopButton.style.display = "block";
                // } else {
                //     backToTopButton.style.display = "none";
                // }
            }

            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

            ////////////////////////////////
            // Gestione galleria fotografica
            ////////////////////////////////
            function carousel() {
                return {
                    active: 0,
                    init() {
                    var flkty = new Flickity(this.$refs.carousel, {
                        wrapAround: true,
                        // , draggable: false
                        // , autoPlay: 2000
                    });
                    flkty.on('change', i => this.active = i);
                    }
                }
            }

            function carouselFilter() {
                return {
                    active: 0,
                    changeActive(i) {
                    this.active = i;
                    
                    this.$nextTick(() => {
                        let flkty = Flickity.data( this.$el.querySelectorAll('.carousel')[i] );
                        flkty.resize();
                    });
                    }
                }
            }

            /////////////////////////////////////////////////////
            // Gestione mappa google con Javascript (no iframe)
            ////////////////////////////////////////////////////
            let map;

            function initMap() {
                var myLatLng = {lat: 46.19508599859083, lng: 9.013443766292003};
                map = new google.maps.Map(document.getElementById("map"), {
                    center: myLatLng, 
                    // hl: 'it',
                    zoom: 17,
                });
                // var icon = '{{asset('img/header-logo-ssse.png')}}'
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    // icon: icon,
                    title: 'SSSE - Scuola specializzata superiore di economia'
                });
            }