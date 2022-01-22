
<center><h1 class="mt-4 mb-3">SPP SISWA 2022</h1></center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Tambah Data
</button>
<!-- --------------------------------------------------------------------------------------------------- -->
<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Id Kelas</td>
        <th>Id Jurusan</th>
        <th>No Telepon</th>
        <th>Alamat</th>
        <th>--Action--</th>
    </tr>
    <?php
        //$query = mysqli_query($konek,"SELECT * FROM anggota");
        $query = mysqli_query($konek, "SELECT anggota.id_anggota, anggota.nis, anggota.nama, anggota.jk, anggota.tempat_lahir, 
        anggota.tanggal_lahir, anggota.id_kelas, anggota.id_jurusan, anggota.no_telepon, anggota.alamat,
        kelas.id_kelas, kelas.nama_kelas, jurusan.id_jurusan, jurusan.nama_jurusan 
        FROM anggota
        JOIN kelas ON anggota.id_kelas = kelas.id_kelas
        JOIN jurusan ON anggota.id_jurusan = jurusan.id_jurusan");
        $no = 1;
        foreach ($query as $row) {
      
    ?>
    <tr>
        <td class="table-info" valign="center" valign="middle"><?php echo $no; ?></td>
        <td class="table-info" valign="middle"><?php echo $row['nis']; ?></td>
        <td class="table-info" valign="middle"><?php echo $row['nama']; ?></td>
        <td class="table-info" valign="middle"><?php echo $row['jk']=="L"?"Laki-Laki":"Perempuan"; ?></td>
        <td class="table-info" valign="middle"><?php echo $row['tempat_lahir']; ?></td>
        <td class="table-info" valign="middle"><?php echo $row['tanggal_lahir']; ?></td> 
        <td class="table-info" valign="middle"><?php echo $row['id_kelas']; ?></td>
        <td class="table-info" valign="middle"><?php echo $row['id_jurusan']; ?></td> 
        <td class="table-info" valign="middle"><?php echo $row['no_telepon']; ?></td>
        <td class="table-info" valign="middle"><?php echo $row['alamat']; ?></td>
        <td class="table-info" valign="middle">
        <a href="?page=anggota-delete&delete&id=<?php echo $row['id_anggota']; ?>">
            <button class="btn btn-danger" name="delete"><i class="fas fa-trash-alt"> Hapus</i></button></a>
        <a href="?page=anggota-edit&edit&id=<?php echo $row['id_anggota']; ?>">
            <button class="btn btn-warning" name="insert"><i class="fas fa-edit"></i>Update</button></a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>
<!-- ------------------------------------------------------------- -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="?page=anggota-insert" method="post">
            <div class="form-group">
              <input class="form-control" type="text" name="nis" placeholder="NIS" require>
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text" name="nama" placeholder="Nama Siswa" require>
            </div>
            <div class="form-group mt-2">
              <select class="form-control" name="jenis_kelamin">
                 <option value="">--Pilih Gender--</option>
                 <option value="L">Laki-laki</option>
                 <option value="P">Perempuan</option>
             </select>
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text" name="tempat_lahir" placeholder=" Tempat Lahir" require>
            </div> 
            <div class="form-group mt-2"> 
               <input class="form-control" type="date" name="tanggal_lahir" placeholder=" Tanggal Lahir" require>
            </div>
            <div class="form-group mt-2">
               <select class="form-control" name="kelas">
                  <option value="">--Pilih Kelas--</option>
                  <?php
                  $query_kelas = mysqli_query($konek,"SELECT * FROM kelas");
                  foreach( $query_kelas as $kelas){
                    ?>
                    <option value="<?php echo $kelas['id_kelas']?>"><?php echo $kelas['nama_kelas']?></option>
                    <?php
                  }
                  ?>
                </select>
            </div>
            <div class="form-group mt-2">
                 <select class="form-control" name="jurusan">
                    <option value="">--Pilih Jurusan--</option>
                    <option value="1">Rekayasa Perangkat Lunak</option>
                    <option value="2">Teknik Audio Video</option>
                    <option value="3">Teknik Kendaraan Ringan</option>
                    <option value="4">Teknik Instalasi Tenaga Listrik</option>
                </select>
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text" name="no_telepon" placeholder=" No_Telepon" require>
            </div>
            <!-- <div class="form-group mt-2">  -->
               <!-- <input class="form-control" type="text" name="alamat" placeholder=" Alamat" require> -->
            <!-- </div> -->
            <div class="form-group mt-2">
             <textarea class="form-control" name="alamat" placeholder=" Alamat" require></textarea> 
           </div>
           
            
                 
           
        <!-----------------------------------------------------------------------------------------------------------------  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success mt-2" type="submit" name="save">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>
