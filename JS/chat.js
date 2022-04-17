addEventListener('submit',function(e){
    value = document.getElementById('mensage').value
    div = document.getElementById('menssages')
    e.preventDefault()
    p = document.createElement('p')
    p.innerHTML = value
    div.append(p)
    fetch('/rpgnip/index/receive/'+value)
})
function search(){
    setTimeout('search()',1000)
    fetch('/rpgnip/index/search')
    .then(function(response){
      return response.json()
    })
    .then(function(data){
        for(var i in data){
            console.log(data[i]['mensagem'])
        }
    })
}