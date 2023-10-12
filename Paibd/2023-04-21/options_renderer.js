const nazwy = [
    'dwójkowy',
    'tryjkowy',
    'czwórkowy',
    'piątkowy',
    'szóstkowy',
    'siódemkowy',
    'ósemkowy',
    'dziewiętny',
    'dziesiętny',
    'jedenastkowy',
    'dwunastkowy',
    'trzynastkowy',
    'czternastkowy',
    'piętnoastkowy',
    'szesnastkowy'
]

function options(){
    let select = document.getElementsByClassName('options')
    i = 2
    for(i = 0; i < select.length; i++){
        x = select[i]
        console.log(nazwy.length)

        for(j = 0; j < nazwy.length; j++){
            
            let option = document.createElement('option')
            let text = document.createTextNode(nazwy[j])
            option.value = j+2
            option.appendChild(text)
            x.append(option)

        }
    }
}