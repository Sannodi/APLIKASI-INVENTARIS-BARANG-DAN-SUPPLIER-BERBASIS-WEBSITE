<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/TataAstana/koneksi.php";
include_once($path);

session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <?php
    $idpem = $_GET['id'];
    $rs=mysqli_query($conn,"SELECT * FROM pembelian p, user u, ongkir o
      where p.id_pel=u.id_pel AND p.id_ongkir=o.id_ongkir AND p.id_pem='$idpem'");
      $row=mysqli_fetch_assoc($rs);
     ?>
            <form method="POST">
            <table>
              <tr>
                <td>DEPO TATA ASTANA</td>
              </tr>
              <tr>
                <td>Jl. Raya Sari Rogo Ruko Citra City, Sidoarjo</td>
              </tr>
              <tr>
                <td>Telp : (031) 70339247</td>
              </tr>
            </table>

            <hr>
            <br/>

            <table width="100%" cellspacing="0">
              <tr>
                <td>
                  <table>
                    <tr>
                      <td>Nomor Faktur</td>
                      <td>:</td>
                      <td><?php echo (rand()."<br>"); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td>:</td>
                      <td><?php echo date('d/M/Y') ?></td>
                    </tr>
                  </table>
                </td>
                <td width="20%"></td>
                <td>
                  <table>
                    <tr>
                      <td>Dikirim Kepada</td>
                      <td>:</td>
                      <td><?php echo $row['nama_pel']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat Pengiriman</td>
                      <td>:</td>
                      <td><?php echo $row['alamat_kirim']; ?>, <?php echo $row['daerah_ongkir']; ?></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
                <br>
                <table class="table table-hover" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Satuan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $nomor=1;
                $sql = mysqli_query($conn,"SELECT * FROM pembelian p, pemb_brg pb, barang b, jenis j, merek m
                  WHERE p.id_pem=pb.id_pem AND pb.id_brg=b.id_brg AND b.id_jns=j.id_jns AND b.id_mrk=m.id_mrk AND p.id_pem='$idpem'");
                while($rw=mysqli_fetch_assoc($sql)){
                  $jml = $rw['jumlah'];
                  $hrg = $rw['harga_brg'];
                  $subtot = $jml*$hrg;
                  echo "<tr>";
                    echo "<td>".$nomor."</td>";
                    echo "<td>".$rw['nama_mrk']." ".$rw['nama_jns']."</td>";
                    echo "<td>".$rw['jumlah']."</td>";
                    echo "<td>Pcs</td>";
                  echo "</tr>";
                  $nomor++;
                }?>
                </tbody>
                </table>

                <br>
                
                <table width="100%" cellspacing="0">
                  <tr>
                    <td align="center">
                      Petugas
                    </td>
                    <td align="center">
                      Penerima
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <br>
                      <br>
                      <br>
                      <br>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                      (.......................)
                    </td>
                    <td align="center">
                      (.......................)
                    </td>
                  </tr>
                </table>
          </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <script>
    window.print();
  </script>
</html>
