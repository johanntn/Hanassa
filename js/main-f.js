
// lähetä XMLHttpRequest-pyyntö
// Tee XMLHttpRequest-objekti. Anna sen nimeksi xhr

// Tee funktio 'showImages', joka
// tarkastaa onko readyState ja status sellaiset että ladatun sisällön voi näyttää sekä
// muuttaa ladatun JSON-tekstin JavaScript-objektiksi
// Tee funktioon myös muuttuja 'output', jolle annat arvoksi tyhjän merkkijonon sekä
// tee silmukka joka rakentaa jokaisesta kuvasta alla olevan HTML:n
/*
<li>
    <figure>
        <a href="img/original/filename.jpg"><img src="img/thumbs/filename.jpg"></a>
        <figcaption>
            <h3>Title</h3>
        </figcaption>
    </figure>
*/
// lisää em. HTML output-muuttujaan
// Silmukan jälkeen tulosta HTML-koodi (output) <ul>-elementin sisälle.
// Funktio päättyy.

// avaa XMLHttpRequest-yhteys osoitteeseen X, metodi GET
// kun readystate vaihtuu, kutsu showImages funktiota
// lähetä XMLHttpRequest-pyyntö

 

var xhr = new XMLHttpRequest();

var showImages = function () {
    if (this.readyState == 4 && this.status == 200) {

        var json = JSON.parse(xhr.responseText);

        var output = '';
        for (var i = 0; i < json.length; i++) {

            output += '<li>' +
                '<figure>' +
                '<a href="Hanassa/uploads' + json[i].mediaUrl + '"><img src="Hanassa/uploads/' + json[i].mediaThumb + '"></a>' +
                '<figcaption>' +
                '<h3>Title</h3>' +
                '</figcaption>' +
                '</figure>' +
                '</li>';
        }
        document.querySelector("ul").innerHTML = output;
    }
}

xhr.open("GET", "jsonKuvat.php", true);
//xhr.send();
xhr.onreadystatechange = showImages;
 