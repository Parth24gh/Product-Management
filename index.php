<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Management</title>

  <style>
    body{
        background: radial-gradient( rgb(155, 149, 255) 0%, rgba(13, 0, 255, 0.3) 0%, rgba(13, 0, 255, 0.1) 100%);
        display: flex;
        flex-direction: column;
        font-family: candara;
    }

    button{
        background-color: rgb(211, 255, 205);
        color: rgb(0, 0, 0);
        font-size: 20px;
        height: 60px;
        width: 200px;
        top: 50%;
        margin-right: 10px;
    }

    button:hover{
        transition: 1.5s;
        background-color: rgb(124, 103, 249);
    }

    h1{
        font-size: 120px;
        font-style: italic;
        text-align: center;
        color: white;
    }

    @media (max-width:500px){
        #div{
            height:900px;
        }
    }

    
  </style>

</head>
<body>
    <h1>Product MGMT</h1>

    <div id="div" style="height: 300px; display: flex; margin: auto;">
        <div  style="display: flex; margin: auto; justify-content: space-between;">
            <button onclick="location.href='./products/create.php';">Create Products</button>
            <button onclick="location.href='./products/index.php';">Read Products</button>
        </div>
    </div>

</body>
</html>