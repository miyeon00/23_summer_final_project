function addCard(){

    var newdiv = document.createElement('div');
    newdiv.className ='card';
    var child_div = document.createElement('div');
    child_div.className = 'card-body';
    newdiv.appendChild(child_div);
    var h5 = document.createElement('h5');
    h5.className ='card-title';
    h5.innerText="New Property";
    newdiv.appendChild(h5);

}