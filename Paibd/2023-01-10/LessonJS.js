const id1 = {name:'Thomann 111SN Double Bass',grafika:'c-bass.jpg',alt:'classical bass',desc:'Size: 3 / 4<br>Colour: Light brown, matte<br>With Artino strings',cena:'4 499 zł'}
const table = ['7','8','9']
const scierzka = ".\\Grafika\\c-bass.jpg"
const cena = '4000 zł'

function newSection(id){ 

        var section = document.createElement("section")
        section.id = "section"+id
        document.getElementById('main').appendChild(section)

        var center1 = document.createElement("center")
        section.appendChild(center1)

        var center2 = document.createElement("center")
        section.appendChild(center2)

        var p = document.createElement("p")
        center1.appendChild(p) 
        p.append(id)

        var img = document.createElement("img")
        img.src = scierzka
        img.alt = "classical bass"
        //document.getElementById('center2'+row).appendChild(img)
        center2.append(img)
        
        var br1 = document.createElement("br")
        var br2 = document.createElement("br")
        var br3 = document.createElement("br")

        var article = document.createElement("article")
        article.id = 'article'+id

        section.appendChild(article)
        article.append('Size: 3 / 4',br1,'1Colour: Light brown, matte',br2,'With Artino strings')
        section.append(br3,cena)

        var btn = document.createElement("button") 
        btn.append('KUP TERAZ')
        section.appendChild(btn)
}

table.forEach(newSection)

