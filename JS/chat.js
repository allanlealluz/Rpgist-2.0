var id = 0
addEventListener('submit',function(e){
    e.preventDefault()
    value = document.getElementById('mensage').value
    fetch('/rpgnip/index/receive/'+value)
    document.getElementById('mensage').innerHTML = ''
    document.getElementById('mensage').value = ''
})
function search(){
    div = document.getElementById('menssages')
    fetch(`/rpgnip/index/search/${id}`)
    .then(function(response){
      return response.json()
    })
    .then(function(data){
        for(var i in data){
            var author = document.createElement('h2')
            var p = document.createElement('h2')
            p.innerHTML = data[i]['mensagem']
            author.innerHTML = data[i]['userrname']
            id = data[i]['id']
            author.setAttribute('class','text-secondary')
            div.append(author)
            div.append(p)
            div.scroll(0,1000000000000)
        }
    })
    setTimeout('search()',500) 
}
setTimeout(function(){
conteudo = document.getElementById('Conteudo')
carregamento = document.getElementById('bg')
conteudo.setAttribute('style','display:inline;')
carregamento.setAttribute('style','display:none;')

},1000)