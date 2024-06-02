const search = document.getElementById('search');
const bar = document.getElementById('searchBar');
const x = document.getElementById('x');

const searchMini = document.getElementById('search_mini');
const menu = document.getElementById('searchMenu');
const xMini = document.getElementById('xMini');
const all = document.getElementById('all');

let verifica = false;

search.onclick = function () {
    bar.style.height = '80px';
    verifica = true;
    if(verifica === true){
        search.style.display ='none';
        x.style.display = 'block'
    }
};

x.onclick = function () {
    bar.style.height = '0px';
    verifica = true;
    if(verifica === true){
        x.style.display ='none';
        search.style.display = 'block'
    }
};


searchMini.onclick = function () {
    all.style.display = 'none';
    menu.style.display = 'flex'; 
};

xMini.onclick = function () {
    all.style.display = 'block';
    menu.style.display = 'none';
};