 <?php require('connect.php'); ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMICS</title>

 </head>
 <body>
 <div>  

 
 <form  method="POST" action="data.php">
        <input type="email" placeholder="Email" name="email">
        <button onclick="send()" name ="submit">SUBMIT</button>
    </form>
    </div> 
 </body>
 </html>