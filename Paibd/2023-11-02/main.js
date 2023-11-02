const f = ( fontColor ) => {
  let paragraf = document.getElementById("wynik")
  let procent = document.querySelector("#procent").value
  let styl = document.querySelector("#styl").value

  paragraf.style.color = fontColor
  paragraf.style.fontSize = procent + "%"
  paragraf.style.fontStyle = styl
}