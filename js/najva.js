function getElementsByClassName(className, tag, elm){
var testClass = new RegExp("(^|\\s)" + className + "(\\s|$)");
var tag = tag || "*";
var elm = elm || document;
var elements = (tag == "*" && elm.all)? elm.all : elm.getElementsByTagName(tag);
var returnElements = [];
var current;
var length = elements.length;
for(var i=0; i<length; i++){
current = elements[i];
if(testClass.test(current.className)){
returnElements.push(current);
}
}
return returnElements;
}
function addClassName(elm, className){
var currentClass = elm.className;
if(!new RegExp(("(^|\\s)" + className + "(\\s|$)"), "i").test(currentClass)){
elm.className = currentClass + ((currentClass.length > 0)? " " : "") + className;
}
return elm.className;
}
function removeClassName(elm, className){
var classToRemove = new RegExp(("(^|\\s)" + className + "(\\s|$)"), "i");
elm.className = elm.className.replace(classToRemove, "").replace(/^\s+|\s+$/g, "");
return elm.className;
}
function activateThisColumn(column) {
var table = document.getElementById('pricetable');
var ths = table.getElementsByTagName('th');
for (var g=0; g<ths.length; g++) {
removeClassName(ths[g], 'on');
}
var tds = table.getElementsByTagName('td');
for (var m=0; m<tds.length; m++) {
removeClassName(tds[m], 'on');
}
var newths = getElementsByClassName(column, 'th', table);
for (var h=0; h<newths.length; h++) {
addClassName(newths[h], 'on');
}
var newtds = getElementsByClassName(column, 'td', table);
for (var i=0; i<newtds.length; i++) {
addClassName(newtds[i], 'on');
}
}