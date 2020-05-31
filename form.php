<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<style type="text/css">
  *{
    font-family: verdana;
  }
.gabungan{
  padding-left: 200px;
}

.gabungan .pengirim{
  float: left;
  padding-right: 90px;
}

.rincian{
  clear: left;
  padding-top: 50px;
  padding-left: 500px;
}

</style>
<?php
$namapengirim = $namapenerima = $alamatpenerima = $teleponpengirim = $teleponpenerima = $namabarang = $jeniskelaminpengirim = $jeniskelaminpenerima = $area  = $provinsi  = $jenisbarang = $waktupengirim = $berat =  $ongkir = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $namapengirim = test_input($_POST["namapengirim"]);
  $namapenerima = test_input($_POST["namapenerima"]);
  $alamatpenerima = test_input($_POST["alamatpenerima"]);
  $teleponpengirim = test_input($_POST["teleponpengirim"]);
  $teleponpenerima = test_input($_POST["teleponpenerima"]);
  $namabarang = test_input($_POST["namabarang"]);
  $berat = test_input($_POST["berat"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<style type="text/css">
  
</style>

<center><h2>PENGIRIMAN BARANG</h2></center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="gabungan">
  <div class="pengirim">  
    <h2>PENGIRIM BARANG</h2>
    Nama : <input type="text" name="namapengirim">
    <br><br>
    No.Telepon : <input type="text" name="teleponpengirim">
    <br><br>
    Jenis Kelamin:
    <?php
      $jeniskelaminpengirim = array('L' => 'Laki Laki', 'P' => 'Perempuan');
      foreach ($jeniskelaminpengirim as $kode => $detail) {
        $checked = @$_POST['jeniskelaminpengirim'] == $kode ? ' checked="checked"' : '';
        echo '<label class="radio">
            <input name="jeniskelaminpengirim" type="radio" value="' . $kode . '"' . $checked . '>' . $detail . '</option>
          </label>';
      }
      ?>
    <br><br>

    <h2>PENERIMA BARANG</h2>
    Nama : <input type="text" name="namapenerima">
    <br><br>
    No.Telepon : <input type="text" name="teleponpenerima">
    <br><br>
    Alamat : <input type="text" name="alamatpenerima">
    <br><br>
    Kabupaten / Kota : <select name="area">
      <?php $options = array ('Jakarta' ,'Surabaya' , 'Solo' , 'Bandung' , 'Sidoarjo' , 'Bojonegoro');
      foreach($options as $area){
        $selected = @$_POST['area'] == $area ? 'selected="selected' : '';
        echo '<option value="' . $area .'"' . $selected . '>' . $area . ' </option>';
      }
      ?>
    </select>
    Provinsi : <select name="provinsi">
      <?php $options = array('Jakarta', 'Jawa Timur', 'Jawa Tengah', 'Jawa Barat', 'Bali');
      foreach ($options as $provinsi) {
        $selected = @$_POST['provinsi'] == $provinsi ? ' selected="selected"' : '';
        echo '<option value="' . $provinsi . '"' . $selected . '>' . $provinsi . '</option>';
      }?>
    </select>
    <br><br>
    Jenis Kelamin:
    <?php
      $jeniskelaminpenerima = array('L' => 'Laki Laki', 'P' => 'Perempuan');
      foreach ($jeniskelaminpenerima as $kode => $detail) {
        $checked = @$_POST['jeniskelaminpenerima'] == $kode ? ' checked="checked"' : '';
        echo '<label class="radio">
            <input name="jeniskelaminpenerima" type="radio" value="' . $kode . '"' . $checked . '>' . $detail . '</option>
          </label>';
      }
      ?>
  </div>

  <div class="barang">
    <h2>DATA BARANG</h2>
    Nama Barang : <input type="text" name="namabarang">
    <br><br>
    Jenis Barang : <select name="jenisbarang">
      <?php $options = array ('Makanan' ,'Elektronik' , 'Kosmetik' , 'Alat Rumah Tangga' , 'Pakaian');
      foreach($options as $jenisbarang){
        $selected = @$_POST['jenisbarang'] == $jenisbarang ? ' selected="selected"' : '';
        echo '<option value="' . $jenisbarang .'"' . $selected . '>' . $jenisbarang . ' </option>';
      }
      ?>
    </select>
    <br><br>
    Berat Barang : <input type="text" name="berat">
    <br><br>
    Ongkos Kirim: <input type="text" name="ongkir">
    <br><br>
  </div>

  <input type="submit" name="submit" value="Submit">  
</div>
</form>

<div class="rincian">
<?php
if (isset($_POST['submit'])) {
  echo '<h1>RINCIAN DATA</h1>';
  echo '<h4>DATA PENGIRIM</h4>';
  echo '<li>Nama : ' . $_POST['namapengirim'] . '</li>';
  echo '<li>No.Telepon : ' . $_POST['teleponpengirim'] . '</li>';
  echo '<li>Jenis Kelamin : ' . (isset($_POST['jeniskelaminpengirim']) ? $jeniskelaminpengirim[$_POST['jeniskelaminpengirim']] : '-') . '</li>';
  
  echo '<h4>DATA PENERIMA</h4>';
  echo '<li>Nama : ' . $_POST['namapenerima'] . '</li>';
  echo '<li>No.Telepon : ' . $_POST['teleponpenerima'] . '</li>';
  echo '<li>Alamat : ' . $_POST['alamatpenerima'] . '</li>';
  echo '<li>Kota/Kabupaten : ' . $_POST['area'] . '</li>';
  echo '<li>Provinsi : ' . $_POST['provinsi'] . '</li>';
  echo '<li>Jenis Kelamin : ' . (isset($_POST['jeniskelaminpenerima']) ? $jeniskelaminpenerima[$_POST['jeniskelaminpenerima']] : '-') . '</li>';

  echo '<h4>DATA BARANG</h4>';
  echo '<li>Nama : ' . $_POST['namabarang'] . '</li>';
  echo '<li>Jenis Barang : ' . $_POST['jenisbarang'] . '</li>';
  echo '<li>Berat : ' . $_POST['berat'] . '</li>';
  echo '<li>Ongkos Kirim : ' . $_POST['ongkir'] . '</li>';
  
}?>
</div>
</body>
</html>