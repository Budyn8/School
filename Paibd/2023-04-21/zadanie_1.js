const cyfry = {
    '0':0,
    '1':1,
    '2':2,
    '3':3,
    '4':4,
    '5':5,
    '6':6,
    '7':7,
    '8':8,
    '9':9,
    'A':10,
    'B':11,
    'C':12,
    'D':13,
    'E':14,
    'F':15
}

let button_1 = document.querySelector('#submit_1')
let odpowiedz_1 = document.querySelector('#wynik_1')


button_1.addEventListener('click', () => {
    let liczba = document.querySelector('#liczba_wpisana_1').value
    let system_liczbowy = document.querySelector('#system_liczbowy_1').value
    let dlugosc = liczba.length
    let wynik = 0

    for(x = 0; x < dlugosc; x++){

        true_number = cyfry[liczba[x]]

        x != 0 ?  wynik = wynik*Number(system_liczbowy) + true_number : wynik = true_number 

    }
    odpowiedz_1.innerHTML = 'Wynik: ' + wynik 
})
