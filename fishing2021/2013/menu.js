<!-- innen
/*
Letöltve a ThomasWebMûhely javascript archívumából:
http://www.thomas98.hu/webmuhely.php
*/

var linkset=new Array()
// ITT LEHET BEÍRNI A LINKEKET

linkset[0]='<div class="menuitems"><a href="foo.php?site=program">ZENEI PROGRAMOK</a></div>'
linkset[0]+='<div class="menuitems"><a href="foo.php?site=off">OFF-PROGRAMOK</a></div>'

linkset[1]='<div class="menuitems"><a href="foo.php?site=jegyinfo">JEGYINFORMÁCIÓ</a></div>'
linkset[1]+='<div class="menuitems"><a href="http://fishingonorfu.jegy.hu" target="_blank">ONLINE JEGYVÁSÁRLÁS</a></div>'
linkset[1]+='<div class="menuitems"><a href="http://www.jegy.hu/partners.php" target="_blank">JEGYÁRUSÍTÓ HELYEK</a></div>'

linkset[2]='<div class="menuitems"><a href="foo.php?site=hazirend">HÁZIREND</a></div>'
linkset[2]+='<div class="menuitems"><a href="foo.php?site=napkozi">NAPKÖZI</a></div>'
linkset[2]+='<div class="menuitems"><a href="foo.php?site=szallas">SZÁLLÁS</a></div>'
linkset[2]+='<div class="menuitems"><a href="foo.php?site=utazas">UTAZÁS</a></div>'
linkset[2]+='<div class="menuitems"><a href="foo.php?site=terkep">TÉRKÉP</a></div>'
linkset[2]+='<div class="menuitems"><a href="foo.php?site=kapcsolat">KAPCSOLAT</a></div>'

linkset[3]='<div class="menuitems"><a href="foo.php?site=videok">VIDEÓK</a></div>'
linkset[3]+='<div class="menuitems"><a href="foo.php?site=kepek">KÉPEK</a></div>'

linkset[4]='<div class="menuitems"><a href="foo.php?site=sajtoakkr">SAJTÓAKKREDITÁCIÓ</a></div>'
linkset[4]+='<div class="menuitems"><a href="foo.php?site=sajtoanyag">SAJTÓANYAGOK</a></div>'
linkset[4]+='<div class="menuitems"><a href="foo.php?site=sajtofoto">SAJTÓFOTÓK</a></div>'


var ie4=document.all&&navigator.userAgent.indexOf("Opera")==-1
var ns6=document.getElementById&&!document.all
var ns4=document.layers

function showmenu(e,which){

if (!document.all&&!document.getElementById&&!document.layers)
return

clearhidemenu()

menuobj=ie4? document.all.popmenu : ns6? document.getElementById("popmenu") : ns4? document.popmenu : ""
menuobj.thestyle=(ie4||ns6)? menuobj.style : menuobj

if (ie4||ns6)
menuobj.innerHTML=which
else{
menuobj.document.write('<layer name=gui bgColor=#E6E6E6 width=165 onmouseover="clearhidemenu()" onmouseout="hidemenu()">'+which+'</layer>')
menuobj.document.close()
}

menuobj.contentwidth=(ie4||ns6)? menuobj.offsetWidth : menuobj.document.gui.document.width
menuobj.contentheight=(ie4||ns6)? menuobj.offsetHeight : menuobj.document.gui.document.height
eventX=ie4? event.clientX : ns6? e.clientX : e.x
eventY=ie4? event.clientY : ns6? e.clientY : e.y

var rightedge=ie4? document.body.clientWidth-eventX : window.innerWidth-eventX
var bottomedge=ie4? document.body.clientHeight-eventY : window.innerHeight-eventY

if (rightedge<menuobj.contentwidth)

menuobj.thestyle.left=ie4? document.body.scrollLeft+eventX-menuobj.contentwidth : ns6? window.pageXOffset+eventX-menuobj.contentwidth : eventX-menuobj.contentwidth
else

menuobj.thestyle.left=ie4? document.body.scrollLeft+eventX : ns6? window.pageXOffset+eventX : eventX

if (bottomedge<menuobj.contentheight)
menuobj.thestyle.top=ie4? document.body.scrollTop+eventY-menuobj.contentheight : ns6? window.pageYOffset+eventY-menuobj.contentheight : eventY-menuobj.contentheight
else
menuobj.thestyle.top=ie4? document.body.scrollTop+event.clientY : ns6? window.pageYOffset+eventY : eventY
menuobj.thestyle.visibility="visible"
return false
}

function contains_ns6(a, b) {

while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function hidemenu(){
if (window.menuobj)
menuobj.thestyle.visibility=(ie4||ns6)? "hidden" : "hide"
}

function dynamichide(e){
if (ie4&&!menuobj.contains(e.toElement))
hidemenu()
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
hidemenu()
}

function delayhidemenu(){
if (ie4||ns6||ns4)
delayhide=setTimeout("hidemenu()",500)
}

function clearhidemenu(){
if (window.delayhide)
clearTimeout(delayhide)
}

function highlightmenu(e,state){
if (document.all)
source_el=event.srcElement
else if (document.getElementById)
source_el=e.target
if (source_el.className=="menuitems"){
source_el.id=(state=="on")? "mouseoverstyle" : ""
}
else{
while(source_el.id!="popmenu"){
source_el=document.getElementById? source_el.parentNode : source_el.parentElement
if (source_el.className=="menuitems"){
source_el.id=(state=="on")? "mouseoverstyle" : ""
}
}
}
}

if (ie4||ns6)
document.onclick=hidemenu
// eddig -->

