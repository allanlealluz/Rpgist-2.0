"use strict";

addEventListener('submit', function (e) {
  e.preventDefault();
  value = document.getElementById('mensage').value;
  fetch('/rpgnip/index/receive/' + value);
  document.getElementById('mensage').innerHTML = '';
  document.getElementById('mensage').value = '';
});

function search() {
  div = document.getElementById('menssages');
  fetch('/rpgnip/index/search').then(function (response) {
    return response.json();
  }).then(function (data) {
    for (var i in data) {
      var author = document.createElement('h2');
      var p = document.createElement('h2');
      p.innerHTML = data[i]['mensagem'];
      author.innerHTML = data[i]['userrname'];
      author.setAttribute('class', 'text-secondary');
      div.append(author);
      div.append(p);
      div.scroll(0, 1000000000000);
    }
  });
  setTimeout('search()', 5000);
}