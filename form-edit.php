<?php
    require_once('koneksi.php');

    if($_GET['nim']!=null){
        $nim = $_GET['nim'];

        $koneksiObj = new Koneksi();
        $koneksi = $koneksiObj->getKoneksi();

        if($koneksi->connect_error){
            echo "Gagal Koneksi : ". $koneksi->connect_error;
        }

        $query = "select * from mahasiswa where nim='$nim'";
        $data = $koneksi->query($query);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
    //include_once('template/head.php');
?>
<body>
    
    <?php
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan";
        } else{
            while($row = $data->fetch_assoc()){
                $nim    = $row['nim'];
                $nama   = $row['nama'];
                $jl     = $row['jenis_kelamin'];
                $smt    = $row['semester'];
                $prodi  = $row['prodi'];
            }
        }
    ?>

    <div class="row">
        <div class="container">
        <h2><i class="fa fa-refresh"></i> Edit Data</h2>
        <hr>
        <form class="form-horizontal" method="post" action="update.php">
            <div class="form-group">
                <label for="nim" class="col-sm-2 control-label">NIM</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="nim" name="nim" placeholder="nim" value="<?php echo $nim;?>">
                </div>
            </div>

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama;?>">
                </div>
            </div>

            <div class="form-group">
                <label for="jl" class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                <select name="jl" class="form-control">
                    <option value="Laki-Laki" <?php echo $jl=='Laki-Laki'? 'selected':''; ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php echo $jl=='Perempuan'? 'selected':''; ?>>Perempuan</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label for="smt" class="col-sm-2 control-label">Semester</label>
                <div class="col-sm-4">
                    <select name="smt" class="form-control">
                        <option value="">-- Pilih Semester --</option>
                        <?php 
                            for($i=1;$i<=8;$i++){ ?>
                                <option value="<?php echo $i;?>" <?php echo $smt==$i ? 'selected':'';?>><?php echo $i;?></option>
                        <?php  } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="prodi" class="col-sm-2 control-label">Prodi</label>
                <div class="col-sm-4">
                    <select name="prodi" class="form-control">
                        <option value="">-- Pilih Prodi --</option>
                        <option value="D4 Teknik Informatika" <?php echo $prodi=='D4 Teknik Informatika' ? 'selected':'';?>>D4 Teknik Informatika</option>
                        <option value="D3 Kebidanan" <?php echo $prodi=='D3 Kebidanan' ? 'selected':'';?>>D3 Kebidanan</option>
                        <option value="D3 Farmasi" <?php echo $prodi=='D3 Farmasi' ? 'selected':'';?>>D3 Farmasi</option>
                        <option value="D3 Akuntansi" <?php echo $prodi=='D3 Akuntansi' ? 'selected':'';?>>D3 Akuntansi</option>
                        <option value="D3 Teknik Komputer" <?php echo $prodi=='D3 Teknik Komputer' ? 'selected':'';?>>D3 Teknik Komputer</option>
                        <option value="D3 Teknik Mesin" <?php echo $prodi=='D4 Teknik Mesin' ? 'selected':'';?>>D3 Teknik Mesin</option>
                        <option value="D3 Teknik Elektro" <?php echo $prodi=='D4 Teknik Elektro' ? 'selected':'';?>>D3 Teknik Elektro</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <footer>
        <p class="text-center">Dwiki Supmar Hernanda (16090103)</p>
    </footer>
</body>
<?php
    //include_once('template/script.php');
?>
</html>

