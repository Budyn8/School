function policz(){
    powierzchnia = document.getElementById('powierzchnia').value
    if(document.getElementById('400').checked == true){
        document.getElementById('wynik').innerHTML = 'Koszt kafelków ' +String(powierzchnia*70) + 'zł'
    }else if(document.getElementById('300').checked == true){
        document.getElementById('wynik').innerHTML = 'Koszt kafelków ' +String(powierzchnia*80) + 'zł'
    }else{
        document.getElementById('wynik').innerHTML = 'Nie zaznaczono wielkości kafelków'
    }
}