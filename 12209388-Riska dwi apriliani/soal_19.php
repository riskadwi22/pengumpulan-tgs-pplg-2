<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 19</title>
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    font-family: 'Poppins', sans-serif;
}

body {
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #FAF1E4;
    color: fff;
}

.container {
    text-align: left;
    box-shadow: 8.5px 8.5px 7px 0 rgba(255, 255, 255, 0.786);
    padding: 20px;
    border-radius: 10px;
    background-color: #f0f0f0;
    width: 600px;
    position: relative;
}

.result {
    text-align: left;
    box-shadow: 8.5px 8.5px 7px 0 rgba(255, 255, 255, 0.786);
    padding: 20px;
    border-radius: 10px;
    background-color: #f0f0f0;
    width: 600px;
    height: 55vh;
    position: relative;
}

label {
    font-weight: bold;
}

input {
    border: 1px solid #000;
    width: 90%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    height: 20px;
}

.pe {
    font-size: 11px; 
    position: absolute;
    top: 325px;
    color: #161f1c ;
    left: 20px;
}

button {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    background-color: #9EB384;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #435334;
    transform: scale(1.02);
}

.back-button {
    width: 80%;
    padding: 8px 30px;
    margin: 10px 0;
    background-color: #435334;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-size: 15px;
}

.back-button:hover {
    background-color: #435334;
    transform: scale(1.02);
}

@media screen and (max-width: 600px) {
    .container {
        padding: 20px;
        height: 270px;
        width: 270px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 9.5px;
        box-shadow: 7px 7px 6px 0 rgba(255, 255, 255, 0.786);
    }

    .result {
        height: 270px;
        width: 270px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-size: 9.5px;
        box-shadow: 7px 7px 6px 0 rgba(255, 255, 255, 0.786);
    }

    .back-button {
        width: 20%;
        padding: 5px;
        font-size: 9px;
        text-align: center;
    }

    button {
        width: 80%;
        padding: 5px;
        font-size: 9px;
        width: 70px;
    }

    .pe {
        font-size: 7px;
        position: absolute;
        top: 225px;
        left: 20px;
    }

    input {
        font-size: 9px;
        height: 10px;
        width: 250px;
    }
    
}
   </style>
</head>

<body>
    <div class="container">
        <form action="result.php" method="post">
            <h2>Bioskop XXYWN'S</h2>
            <h3>Masukan Total Tiket</h3>
            <input type="text" class="top-input" name="Ekonomi" required placeholder="Ekonomi"><br>
            <input type="text" name="Vip" required placeholder="VIP"><br>
            <input type="text" name="Eksekutif" required placeholder="Eksekutif"><br><br>
            
            <button type="submit" name="submit">Hitung</button>
        </form>
    </div>
</body>
</html>