function $(id){

  return typeof id === "string"? document.getElementById(id):document;
}

window.onload=function(){
  var list=$("list").getElementsByTagName("li");
  var item=$("item").getElementsByTagName("div");

  for(var i=0; i<list.length; i++){
    list[i].id=i;
    for(var j=0; j<list.length; j++){
      list[j].className="";
      item[j].style.display="none";
    }
    list[0].className="select";
    item[0].style.display="block";
  }

  for(var i=0; i<list.length; i++){
    list[i].id=i;
    list[i].onmouseover=function(){
      for(var j=0; j<list.length; j++){
        list[j].className="";
        item[j].style.display="none";
      }
      this.className="select";
      item[this.id].style.display="block";
    }
  }
}
