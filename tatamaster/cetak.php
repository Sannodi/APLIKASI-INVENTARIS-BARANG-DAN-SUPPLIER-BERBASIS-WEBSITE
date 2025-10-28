<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TataAstana/koneksi.php";
   include_once($path);

   @$from=$_POST['from'];
   @$end=$_POST['end'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Laporan Penjualan CV. Tata Astana</title>
  </head>
  <body>
    <table >
      <tr>
        <td width="35%" cellspacing="0"><img class="img-fluid" src="img/tatalogo.png" alt="" style="width: 180%; height: 135%;"></td>
        <td width="10%"></td>
        <td align="center">
          <h1>Laporan Penjualan</h1>
          <h3><?php echo date("d-F-Y", strtotime($from)) ?> Sampai <?php echo date("d-F-Y", strtotime($end)) ?></h3>
        </td>
      </tr>
    </table>

    <hr>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Tanggal Beli</th>
          <th scope="col">Nama Pembeli</th>
          <th scope="col">Total Pembelian</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $nomor = 1;
        $total = 0;
        if(isset($_POST['print'])){
          $rs=mysqli_query($conn,"SELECT * FROM pembelian p, pemb_brg pb, user u, barang b, jenis j, merek m
          WHERE p.id_pem=pb.id_pem AND p.id_pel=u.id_pel AND b.id_jns=j.id_jns AND b.id_mrk=m.id_mrk AND p.status_pem='Terverifikasi' AND (p.tanggal_pem BETWEEN '$from' AND '$end')
          group by p.id_pem");
          while($row=mysqli_fetch_array($rs)){
            $totpem = $row['total_pem'];
            $total+=$totpem;
            echo "<tr>";
              echo "<td>".$nomor."</td>";
              echo "<td>".date("d-F-Y", strtotime($row['tanggal_pem']))."</td>";
              echo "<td>".$row['nama_pel']."</td>";
              echo "<td>Rp. ".number_format($row['total_pem'])."</td>";
            echo "</tr>";
            $nomor++;
          }
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th scope="col" colspan="3">Total Penjualan dari tanggal <?php echo date("d-F-Y", strtotime($from)) ?> Sampai <?php echo date("d-F-Y", strtotime($end)) ?></th>
          <th scope="col">Rp. <?php echo number_format($total) ?></th>
        </tr>
      </tfoot>
    </table>

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
