let adressElt = document.getElementById('property_adress');
let datalistElt = document.getElementById('adress_results');

adressElt.addEventListener('input', () => {

    datalistElt.innerHTML = "";

    let search = adressElt.value;

    const URL = "https://api-adresse.data.gouv.fr/search/?q="+ search;

    let request = new XMLHttpRequest();

    request.open('GET', URL, true)
    request.onload = function() {

      let data = JSON.parse(this.response)
    
      if (request.status >= 200 && request.status < 400) {

        datalistElt.innerHTML = '';
        
        data['features'].forEach(result => {
            console.dir(datalistElt);
            resultElt = document.createElement("option");
            resultElt.value = result.properties.label;
            datalistElt.appendChild(resultElt);
        })

      } else {
        console.log('error')
      }
    }
    
    request.send()

})
