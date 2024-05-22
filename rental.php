<?php
class motor {

private $beat, $scopy, $vario, $klx; 
public $hari, $jenis, $nama;
protected $Diskon = 0.05;

public function __construct(){
    $this->Diskon = 0.05;
}

public function setHarga($tipe1, $tipe2, $tipe3, $tipe4){
    $this->beat = $tipe1;
    $this->scopy = $tipe2;
    $this->vario = $tipe3;
    $this->klx = $tipe4; 
}

public function getHarga() {
    $data["beat"] = $this->beat;
    $data["scopy"] = $this->scopy;
    $data["vario"] = $this->vario;
    $data["klx"] = $this->klx;
    return $data;
}
}

class nyewa extends motor {
private $listmember = ['kika','caca', ' kafiya', 'dhini', 'kekey'];

public function hargaBeli() {
    $dataHarga = $this->getHarga();
    $hargaBeli = $this->hari * $dataHarga[$this->jenis];
    $hargaDiskon = $this->Diskon;

   
    if (in_array($this->nama, $this->listmember)) {
        $member=$hargaBeli*$hargaDiskon;
        $hargaBayar = $hargaBeli - ($hargaBeli * $hargaDiskon)+10000-500;
    return $hargaBayar;
    }
    $hargaBayar = $hargaBeli+10000 ;
    return $hargaBayar;
    
    
}
public function hargaBeli1() {
    $dataHarga = $this->getHarga();
    $hargaBeli = $this->hari * $dataHarga[$this->jenis];
    $hargaDiskon = $this->Diskon;

   
    $hargaBayar = $hargaBeli+10000 ;
    return $hargaBayar;
    
    
}


public function cetakPembelian() {
    
    if (in_array($this->nama, $this->listmember)) {
        echo '<div class="container ">';
        echo '<table class="table table-bordered mt-5">';
        echo '<thead>';
        echo '<tr>';
        echo '<th colspan="2">Total</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>Nama Anda ada di member:</td>';
        echo '<td>' . $this->nama . ' mendapatkan diskon sebesar 5%</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental sebuah motor:</td>';
        echo '<td>' . $this->jenis . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental perhari motor:</td>';
        echo '<td>' . number_format(($this->hargaBeli1() - 10000) / $this->hari, 0, '', '.') . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Dengan lama:</td>';
        echo '<td>' . $this->hari . ' Hari</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Total yang harus anda bayar(termasuk dengan ppn) :</td>';
        echo '<td>Rp. ' . number_format($this->hargaBeli(), 0, '', '.') . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<table class="table table-bordered mt-5">';
        echo '<thead>';
        echo '<tr>';
        echo '<th colspan="2">Total</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>Nama:</td>';
        echo '<td>' . $this->nama . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental sebuah motor:</td>';
        echo '<td>' . $this->jenis . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental perhari motor:</td>';
        echo '<td>' . number_format(($this->hargaBeli() - 10000) / $this->hari, 0, '', '.') . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Dengan lama:</td>';
        echo '<td>' . $this->hari . ' Hari</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Total yang harus anda bayar(termasuk dengan ppn) :</td>';
        echo '<td>Rp. ' . number_format($this->hargaBeli(), 0, '', '.') . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
  
    
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <center>
        <table class="mt-5">
            <form action="" method="post">
                <tr>
                    <td>Masukkan nama</td>
                    <td>
                       <input type="text"name="nama" class="input form-control">
                    </td>
                </tr>
                <tr>
                    <td>Waktu rental(perhari)</td>
                    <td>
                    <input type="number"name="hari" class="input form-control">
                    </td>
                </tr>
                <tr>
                    <td>Pilih Motor</td>
                    <td>
                        <select name="jenis" required  class="input form-control">
                            <option value="beat">Beat</option>
                            <option value="scoopy">scopy</option>
                            <option value="vario">vario</option>
                            <option value="klx">klx</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="submit" name="kirim" class="btn btn-success"></td>
                </tr>
            </form>
        </table>
    </center>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

<?php
$proses = new nyewa();
$proses->setHarga(50000, 70000, 80000, 100000);
if (isset($_POST['kirim'])) {
    $proses->hari = $_POST['hari'];
    $proses->jenis = $_POST['jenis'];
    $proses->nama = $_POST['nama'];

    $proses->hargaBeli();
    $proses->cetakPembelian();
}
?>
