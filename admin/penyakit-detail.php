   <?php $id = $_GET['id'];
        $ambil = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit = '$id'");
        $pecah = $ambil->fetch_assoc();
   ?>
   
   <!-- Page Heading -->
   <div class="row">
       <div class="col-lg-12">
           <h1 class="page-header">
               <?= $pecah['nama_penyakit'] ?>
           </h1>
           <ol class="breadcrumb">
               <li class="">
                   <i class="fa fa-eye-slash"></i> Kelainan Mata

               </li>
               <li class="active">
                   Detail Penyakit
               </li>
               <li>
                   <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                       <i class="fa fa-plus"></i>
                   </button>
               </li>
           </ol>
       </div>
   </div>
   <!-- /.row -->

   <div class="table-responsive">
       <table class="table table-striped table-bordered" id="tabelid" style="width:100%">
           <thead>
               <tr>
                   <th style="vertical-align: middle" class="text-center">No</th>
                   <th style="vertical-align: middle" class="text-center">Soal</th>
                   <th style="vertical-align: middle" class="text-center">Jawaban</th>
                   <th style="vertical-align: middle" class="text-center">Aksi</th>
               </tr>
           </thead>
           <tbody>
               <?php $no = 1;
                
                $get = $koneksi->query("SELECT * FROM pertanyaan JOIN penyakit ON pertanyaan.id_penyakit = penyakit.id_penyakit WHERE pertanyaan.id_penyakit = '$id'") ?>
               <?php while ($set = $get->fetch_assoc()) : ?>
                   <tr>
                       <td style="vertical-align: middle" class="text-center"><?= $no ?></td>
                       <td style="vertical-align: middle" class="text-center"><img src="../assets/img/<?= $set['soal'] ?>" alt="" srcset="" class="img-fluid" style="width: 100px"></td>
                       <td style="vertical-align: middle" class="text-center"><?= $set['jawaban'] ?></td>
                       <td style="vertical-align: middle" class="text-center">
                           <div class="btn-group-vertical" role="group" aria-label="...">
                               <a href="penyakit-detail-hapus.php?id=<?= $set['id_pertanyaan'] ?>&idp=<?= $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus')"><i class="fa fa-times"></i> Hapus</a>
                           </div>
                       </td>
                   </tr>
               <?php $no++;
                endwhile ?>
           </tbody>
       </table>
   </div>

   <!-- Modal -->
   <form action="" method="post" enctype="multipart/form-data">

       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Tambah Soal</h4>
                   </div>
                   <div class="modal-body">

                       <div class="form-group">
                           <label for="">Soal</label>
                           <input type="file" name="soal" id="" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="">Jawaban</label>
                           <input type="text" name="jawaban" id="" class="form-control">
                       </div>

                   </div>
                   <div class="modal-footer">
                       <button class="btn btn-default" data-dismiss="modal">Close</button>
                       <button class="btn btn-primary" name="simpan">Tambah</button>
                   </div>
               </div>
           </div>
       </div>

   </form>

   <?php
    if (isset($_POST['simpan'])) {

        /* foto */
        $nama = $_FILES['soal']['name'];
        $tmp_nama = $_FILES['soal']['tmp_name'];

        move_uploaded_file($tmp_nama, "../assets/img/" . $nama);

        $jawaban = $_POST['jawaban'];

        $koneksi->query("INSERT INTO pertanyaan (id_penyakit,soal,jawaban) VALUES ('$id','$nama','$jawaban')");
        echo "<script>alert('Data Berhasil Ditambahkan');location='index.php?page=penyakit-detail&id=$id'</script>";
    }
