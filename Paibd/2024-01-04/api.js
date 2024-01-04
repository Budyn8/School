const hello = async () => {
  fetch("http://localhost/5ti/tests.txt").then( (res) => {
    console.log(res)
    return res.text()
  }).then( (thing) => {
    console.log(thing)
  })

}