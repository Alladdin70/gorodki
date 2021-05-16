
var tables = [];
var selectedItem = "";
function getTables(){
    let xhr = new XMLHttpRequest();
    xhr.open('GET','get_tables.php',true);
    xhr.addEventListener("readystatechange", () => {
        if(xhr.readyState === 4 && xhr.status === 200){
            tables = JSON.parse(xhr.responseText);
        }        
    });        
    xhr.send();
}

function showTables(){
    let list = document.getElementById('list');
    for(let i = 0; i < tables.length; i++){
        let div = document.createElement('div');
        div.setAttribute("id",i);
        div.setAttribute("onmouseover","changeColor(this.id)");
        div.setAttribute("onmouseout","restoreColor(this.id)");
        div.setAttribute("ondblclick","showName(this.id)");
        div.textContent = tables[i].name;
        list.appendChild(div);
    }
}

function changeColor(id){
    let elem = document.getElementById(id);
    elem.setAttribute("style","background-color:blue;");
}

function restoreColor(id){
    let elem = document.getElementById(id);
    elem.setAttribute("style","background-color:white;");
}

function showName(id){
    selectedItem = tables[id].name;
    alert( selectedItem + " clicked" );
}