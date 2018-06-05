<?php 
    include_once('template/head.php');
?>
<body>
    <div class="row">
        <div class="container">
            <h2><i class="fa fa-home"></i>Data Mahasiswa</h2>
            <hr>
            <a href="input.php" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Data</a>
            <br><br>
            <table class="table table-striped table-bordered table-hover" id="tb-mahasiswa">
                <thead>
                    <tr>
                        
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Semester</th>
                        <th>Prodi</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once('koneksi.php');
                    $no = 1;

                    $koneksiObj = new Koneksi();
                    $koneksi = $koneksiObj->getKoneksi();

                    if($koneksi->connect_error){
                        echo "Gagal Koneksi : ". $koneksi->connect_error;
                        echo "</td></tr>";
                    }

                    $query = "select * from mahasiswa";
                    $data = $koneksi->query($query);
                    if($data->num_rows <= 0){
                        echo "<tr>";
                        echo "<td colspan='7' class='text-center'><i>Data Kosong</i></td>";
                        echo "</tr>";
                    } else{
                        while($row = $data->fetch_assoc()){
                            echo "<tr>";
                            
                            echo "<td class='center'>".$row['nim']."</td>";
                            echo "<td>".$row['nama']."</td>";
                            echo "<td>".$row['jenis_kelamin']."</td>";
                            echo "<td class='center'>".$row['semester']."</td>";
                            echo "<td>".$row['prodi']."</td>";
                            echo '<td class="text-center"><a href="form-edit.php?nim='.$row['nim'].'" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>';
                            echo ' <a href="hapus.php?nim='.$row['nim'].'" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></td>';
                            echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p class="text-center">Dwiki Supmar Hernanda (16090103)</p>
    </footer>
</body>
<?php 
    include_once('template/script.php');
?>
</html>
