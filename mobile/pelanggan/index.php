<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">

  <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  <link href="assets/css/jquery.dataTables.css" rel="stylesheet" media="screen">
  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .form_login {
      margin: 0 auto;
      padding: 20px;
      max-width: 400px;
      background-color: white;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .form_login h3 {
      text-align: center;
      margin-bottom: 20px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form_login">
          <h3>Info Pelanggan</h3>
          <form method="POST" action="cari.php" name="tagihan" id="tagihan">

            <div class="form-group">
              <p>Pencarian data pelanggan bisa dilakukan dengan cara memilih wilayah dan mengisi 5 digit ID terakhir (XXXX00000)</p>
            </div>

            <div class="form-group">
              <select name="wilayah" class="form-control" id="wilayah">
                <option value="-">- Pilih Wilayah -</option>
                <option value="01,02,03,04">Tanjungpinang</option>
                <option value="05">Kijang</option>
                <option value="06,07,08,09">Tanjung Uban</option>
              </select>
            </div>

            <div class="form-group">
              <input type="text" name="search" class="form-control" placeholder="5 digit ID pelanggan" maxlength="5" id="search" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="Submit" value="Cek">Cek</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery.dataTables.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>

</body>

</html>