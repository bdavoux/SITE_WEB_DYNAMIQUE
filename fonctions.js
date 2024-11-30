function passerEtape(etape) {
    if (etape === 2) {
        document.getElementById('etape1').style.display = 'none';
        document.getElementById('etape2').style.display = 'block';
    } else if (etape === 3) {
        document.getElementById('etape2').style.display = 'none';
        document.getElementById('etape3').style.display = 'block';
    }
}

// Attention code de l'api récupéré au boulot nous l'avons comp mais pas totalement perso
document.addEventListener('DOMContentLoaded', function() {
    var adresseInput = document.getElementById('adresse');
    var suggestionsList = document.getElementById('suggestions');

    adresseInput.addEventListener('input', function() {
        var query = adresseInput.value;
        if (query.length > 2) { // Ne commencez la recherche que si le nombre de caractères est > 2
            fetch('https://api-adresse.data.gouv.fr/search/?q=' + query)
                .then(response => response.json())
                .then(data => {
                    suggestionsList.innerHTML = '';
                    data.features.forEach(feature => {
                        var li = document.createElement('li');
                        li.textContent = feature.properties.label;
                        li.addEventListener('click', function() {
                            adresseInput.value = feature.properties.label;
                            suggestionsList.innerHTML = '';
                        });
                        suggestionsList.appendChild(li);
                    });
                });
        } else {
            suggestionsList.innerHTML = '';
        }
    });
});