<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
</head>
<body>
    
<h3 style="color:red">users</h3>
<ul>
               
               <?php foreach($susers as $su) {?>
                       <li><?php echo $su['username'];?></li>
                           <?php } ?>
                           
           </ul>

     
           <form method="post" action="ok">
        
        <button type="submit">ok</button>
        </form>










</body>
</html>