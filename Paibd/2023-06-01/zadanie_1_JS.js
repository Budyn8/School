inputy = document.querySelectorAll('input')

imie = inputy[0]
nazwisko = inputy[1]
wiek = inputy[2]
email = inputy[3]
zatwierdz = inputy[4]

zatwierdz.addEventListener('click', () => {
    if(imie.value == '' || nazwisko.value == '' || wiek.value == '' || email.value == ''){        
        alert('Prosimy wpisać wszystkie dane')
    }else if(imie.checkValidity() && nazwisko.checkValidity() && wiek.checkValidity() && email.checkValidity()){
        alert('Rejestracja udana')
    }else{
        alert('Któreś z danych zostały źle wpisane')
    }
})