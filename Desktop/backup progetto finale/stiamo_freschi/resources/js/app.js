import './bootstrap';
import "bootstrap";


document.addEventListener('DOMContentLoaded', function () {
    // Il tuo codice JavaScript qui
    var isLoggedIn = false;
    var isPopClosedManually = false;
    window.onscroll = function () {
        scrollPop()
        scrollFunction();

    };


    function scrollFunction() {
        // se il cookies non è impostato, mostra il pop-up
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");
        // Mostra il bottone quando si scende di una certa altezza dalla cima della pagina
        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            scrollToTopBtn.style.display = "flex"; // Mostra il bottone
        } else {
            scrollToTopBtn.style.display = "none"; // Nascondi il bottone
        }
    }


    // funzione per creare un cookie
    function setCookie(nome, valore, ggScadenza, path) {
        if (path == undefined) {
            path = "/";
        }
        var d = new Date();
        d.setTime(d.getTime() + (ggScadenza * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = nome + "=" + valore + "; " + expires + "; path=" + path;
    }
    // Funzione per recuperare il cookie specifico
    function getCookie(nome) {
        var name = nome + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }


    var closeBtn = document.getElementById('close');
    var popElement = document.getElementById('pop');
    if (closeBtn && popElement) {
        closeBtn.onclick = function () {
            popElement.style.display = 'none';
            isPopClosedManually = true; // Imposta il flag quando l'utente chiude manualmente l'elemento pop
            // verifica se esiste il cookie
            var request_user_cookies = getCookie('chiusuraSpamRegister');
            if (request_user_cookies == "") {
                // se non esiste il cookie, crealo
                setCookie('chiusuraSpamRegister', 'true', 60 * 60 * 24 * 30, "/");
            }
        }
        popElement.onclick = function () {
            popElement.style.display = 'none';
            isPopClosedManually = true; // Imposta il flag quando l'utente chiude manualmente l'elemento pop
            // verifica se esiste il cookie
            var request_user_cookies = getCookie('chiusuraSpamRegister');
            if (request_user_cookies == "") {
                // se non esiste il cookie, crealo
                setCookie('chiusuraSpamRegister', 'true', 60 * 60 * 24 * 30, "/");
            }
        }
    }

    function scrollPop() {

        if (!isLoggedIn) {
            if (getCookie('chiusuraSpamRegister') == "") {
                var popElement = document.getElementById('pop');
                if (popElement) {
                    popElement.style.display = 'block';
                }
            }
        }
        var scrollTop = document.getElementById('pop');
        if (getCookie('chiusuraSpamRegister') == "") {
            if (!isPopClosedManually && window.pageYOffset > 1000) {
                scrollTop.style.display = 'block';
                scrollTop.style.transition = 'all 5s';
            } else if (scrollTop) {
                scrollTop.style.display = 'none';
            }
        }
    }


    const gridContainer = document.getElementById("grid-container");

    /*  // Array di oggetti contenenti informazioni sull'immagine e il collegamento
      const images = [
          { src: '/img/pexels-photo-4397840.webp', alt: "Categoria 1", link: "categoria1.html" },
          { src: "categoria2.jpg", alt: "Categoria 2", link: "categoria2.html" },
          // Aggiungi altri oggetti per altre categorie
      ];
  
      // Creazione dinamica degli elementi della griglia
      images.forEach(image => {
          const gridItem = document.createElement("div");
          gridItem.classList.add("grid-item");
  
          const link = document.createElement("a");
          link.href = image.link;
  
          const img = document.createElement("img");
          img.src = image.src;
          img.alt = image.alt;
  
          link.appendChild(img);
          gridItem.appendChild(link);
          gridContainer.appendChild(gridItem);
      });*/
});

function hidePopup() {
    document.getElementById('popSuccess').style.display = 'none';
}
function hidePopupDenied() {
    document.getElementById('popDenied').style.display = 'none';
}



