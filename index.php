<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <style>
        body {
            background-color: rgb(229, 229, 229);
            font-family: Arial, sans-serif;
            display: flex; 
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin:0;
            flex-direction: column;
        }

        .main {
            background-color: white; 
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            padding: 20px; 
            width: 500px; 
            position: relative;
            text-align: center;
        }

        h2 { 
            color: black;
            text-align: center; 
        }

        .button {
        display: inline-block;
        width:45%;
        padding:10px 20px; 
        background: #0078D7; 
        color:white;
        border:none; 
        border-radius:10px; 
        text-decoration: none;
        cursor:pointer; 
        font-size:16px;
        margin-top: 10px;
        }

        .button:hover {
            background: #005fa3; 
            transition:.5s;
        }    

        .status-message {
            margin-top: 20px;
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            animation: fadeout 1s ease-out forwards;
            animation-delay: 2.5s;
        }
    </style>
</head>

<body>

    <div class="main">
        <h3>Pendaftaran Siswa Baru</h3>
        <h1>ITS CODING</h1>
        <h4>Menu :</h4>
        <a class="button" href="form-daftar.php">Daftar</a></li>
        <a class="button" href="list-siswa.php">List Pendaftar</a></li>
        </ul>
    </div>

    <?php if(isset($_GET['status'])): ?>
        <div id="statusBox" class="status-message">
            <?php
                if($_GET['status'] == 'sukses'){
                    echo "Pendaftaran siswa baru berhasil!";
                } else {
                    echo "Pendaftaran gagal!";
                }
            ?>
        </div>
    <?php endif; ?>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('statusBox');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 3000);
    </script>

</body>
</html>
