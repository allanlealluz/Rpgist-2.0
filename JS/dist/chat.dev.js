"use strict";

addEventListener('submit', function (e) {
  value = document.getElementById('mensage').value;
  div = document.getElementById('menssages');
  e.preventDefault();
  p = document.createElement('p');
  p.innerHTML = value;
  div.append(p);
  fetch('/rpgnip/index/receive/' + value);
});

function search() {
  div = document.getElementById('menssages');
  fetch('/rpgnip/index/search').then(function (response) {
    return response.json();
  }).then(function (data) {
    for (var i in data) {
      var author = document.createElement('p');
      var p = document.createElement('p');
      p.innerHTML = data[i]['mensagem'];
      author.innerHTML = data[i]['userrname'];
      div.append(author);
      div.append(p);
    }
  });
  setTimeout('search()', 5000);
}