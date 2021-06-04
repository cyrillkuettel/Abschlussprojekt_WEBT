function validate() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let opt = document.getElementById('productDropDown');




    if (name == "" || email == "") {
        alert('Füllen Sie bitte jedes Feld aus.')
        return false;
    }



    if (email.indexOf("@") == -1) {
        alert('Bitte gültige Email angeben.')
        return false;
    }
    if (email.length < 3) { // so eine Email gibt es nicht.
        alert('Email muss mehr als drei Zeichen beinhalten')
        return false;
    }

    if (opt.value == "") {
        alert("Please select a bike from the drop down menu")
        return false;   
    }


    return true;
}
