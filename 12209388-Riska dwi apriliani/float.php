<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .baris{
        box-sizing: border-box;
				padding: 20px;
      }
      .kolom{
        width: 250px;
        height: 120px;
        background-color: aquamarine;
        margin: 3px;
        box-sizing: border-box;
				padding: 10px;
      }
      .kolom1{
        float: right;
        width: 300px;
        max-width: 100%;
        text-align: center;
    margin-bottom: 25px;
      }
      /* .kolom4{
        clear: left;
        width: 70%;
        background-color: aqua;
      } */
    </style>
</head>
<body>
  <section class="baris">
	   <div class="kolom kolom1">Kolom 1</div>
	   <div class="kolom kolom2">Kolom 2</div>
	   <div class="kolom kolom3">Kolom 3</div>
	   <div class="kolom kolom4">Kolom 4 (float di clear)</div>
  </section>
</body>
</html>