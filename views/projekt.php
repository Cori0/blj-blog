<?php
    include 'moving.php';
    include 'nav.php' 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"></link>
    <title>Document</title>
</head>
<body>

    <h1>
        Home
    </h1>   
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

