function date()
{
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("cdate").innerHTML = d + "/" + m + "/" + y;
}
