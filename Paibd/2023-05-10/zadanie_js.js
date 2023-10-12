let output = document.querySelector('#text')

let button = document.getElementsByTagName('img')

console.log(button)

for(let i = 0; Object.keys(button).length > i; i++){

    let img = button[i]

    img.addEventListener('click', () => {
            output.innerHTML = img.title
    })
}
