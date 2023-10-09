const litery = {
    0:'0',
    1:'1',
    2:'2',
    3:'3',
    4:'4',
    5:'5',
    6:'6',
    7:'7',
    8:'8',
    9:'9',
    10:'A',
    11:'B',
    12:'C',
    13:'D',
    14:'E',
    15:'F'
}

button_2 = document.querySelector('#submit_2')
odpowiedz_2 = document.querySelector('#wynik_2')

button_2.addEventListener('click', () => {

    let liczba = document.querySelector('#liczba_wpisana_2').value
    let system_liczbowy = document.querySelector('#system_liczbowy_2').value
    let wynik = []
    let output = ''

    while(1){
        x = liczba%system_liczbowy
        liczba = (liczba - x)/system_liczbowy
        wynik.push(x)
        if(liczba == 0){
            break
        }
    }

    wynik.reverse()

    wynik.forEach((v) => {
        output += litery[v]
    })
    odpowiedz_2.innerText = 'Wynik: ' + output
})

