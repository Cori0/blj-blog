<!doctype html> 
<html> 
<head> 
<meta charset="utf-8" /> 
<title>Title</title> 
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<link rel="stylesheet" href="../css/styles.css"></link>
</head> 
<body> 

<script>
//sets a random absolute position to a html element; receives the html element 
function moveElmRand(elm){ 
 elm.style.position ='absolute'; 
 elm.style.top = Math.floor(Math.random()*90+5)+'%'; 
 elm.style.left = Math.floor(Math.random()*90+5)+'%'; 
} 
 
//get the #btn_test 
var home = document.querySelector('#home'); 
 
//register to call moveElmRand() on mouseenter event to #btn_test 
home.addEventListener('mouseenter', function(e){ moveElmRand(e.target);}); 
 
//register click to #btn_test 
home.addEventListener('click', function(e){ alert('You are Good.');});
</script>
</body> 
</html>