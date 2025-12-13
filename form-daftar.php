<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex; 
        justify-content: center;
        align-items: center;
        height: 100vh; 
        margin:0;
    }

    .main {
        background-color: white; 
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        padding: 20px; 
        width: 500px; 
        position: relative;
    }

    h2 { 
        color: black;
        text-align: center; 
    }

    label { 
        color:black; 
        font-weight:bold; 
        display:block; 
        margin:5px 0;
    }

    input,select {
        width:100%; 
        padding:10px; 
        margin-bottom:5px; 
        box-sizing: border-box;
        border:1px solid black; 
        border-radius:5px;
        }

    .error {
        color: #ff8080; font-size: 13px; margin-bottom: 10px;
        display:none;
    }

    input[type="submit"] {
            background-color: #0078D7;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #005fa3;
        }
  </style>
</head>

<body>
    <div class="main">
        <h2>Pendaftaran Siswa</h2>

        <form id="regForm" action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">

                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama lengkap" />
  
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat" />
         
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <select name="jenis kelamin">
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
       
                <label for="agama">Agama: </label>
                <select name="agama">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                    <option>Atheis</option>
                </select>
          
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" name="sekolah_asal" placeholder="nama sekolah" />

                <label for="foto">Foto: </label>
                <input type="file" name="foto" accept="image/*">
         
                <input type="submit" value="Daftar" name="daftar" />
            
            </fieldset>

        </form>

    </body>
</html>