


function verif()
{

var rib =document.querySelector("#rib").value;
var ncb =document.querySelector("#ncb").value;
var nce =document.querySelector("#nce").value;
var list=document.querySelectorAll("input[type=checkbox]"),nb=0,p="";

if((rib =="")||(rib.length()!=10))
{
     m="il faut que le rib est non vide et different de 10"
    alert (m);
}

if((ncb =="")||(ncb.length()!=10))
{
     m="il faut que le numero carte bancaire est non vide et different de 10"
    alert (m);
}

if((nce =="")||(nce.length()!=10))
{
     m="il faut que le numero carte etudiant est non vide et different de 10"
    alert (m);
}

for(var i=0;i<list.length;i++)
{
    if(list[0].checked())
    {
        nb++;
        p+=list[i].value+"";
    }
}
if(nb>1)
{
    m="interdit4"
    alert (m);

}

}
