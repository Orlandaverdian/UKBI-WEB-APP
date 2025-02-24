<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["login"]) || $_SESSION['username'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<div class="row">
    <div class="isitabel">
        <div class="col-sm-12">
            <h1 class="text-center mt-5">Data soal dan jawaban</h1>
            <br><br>
            <div class="row btntambah">
                <div class="col-sm-2">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah_soal">Tambah Soal</button>
                </div>
            </div>
            <table class="table table-striped" id="dataku">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban</th>
                        <th>Option</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //include '../koneksi.php';
                    $no = 1;
                    $query = "SELECT * FROM tbl_soal";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $row['soal'] ?></td>
                            <td><?= $row['jawaban'] ?></td>
                            <td>
                                <a href="#" onclick="edit_soal('<?= $row['id'] ?>')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#soal_edit">edit</a> |
                                <a onclick="hapus_soal('<?= $row['id'] ?>')" href="#" class="btn btn-danger">hapus</a>
                                <?php
                                $queryhitungjawab = "SELECT id FROM tbl_jawaban WHERE id_soal= '" . $row['id'] . "' ";
                                $result_hitung = mysqli_query($con, $queryhitungjawab);
                                if (mysqli_num_rows($result_hitung) < 4) { ?> |
                                    <a onclick="tambah_jawaban('<?= $row['id'] ?>')" data-bs-toggle="modal" data-bs-target="#tambah_jawaban" href="#" class="btn btn-xs btn-info">tambah jawaban</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                        $query_jawab = "SELECT * FROM tbl_jawaban WHERE id_soal= '" . $row['id'] . "'  ";
                        $result_jawab = mysqli_query($con, $query_jawab);
                        while ($row2 = mysqli_fetch_assoc($result_jawab)) : ?>
                            <tr>
                                <td>-</td>
                                <td><?= $row2['pilihan_jawab'] ?></td>
                                <td>-</td>
                                <td><a href="#" onclick="edit_jawaban('<?= $row2['id'] ?>')" data-bs-toggle="modal" data-bs-target="#jawaban_edit" class="btn btn-xs btn-warning">edit</a> | <a onclick="hapus_jawaban('<?= $row2['id'] ?>')" href="#" class="btn btn-xs btn-danger">hapus</a></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal edit soal-->
<div class="modal fade" id="soal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="isi_editsoal">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saving_soal()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal editsoal -->

<!-- Modal tambah soal-->
<div class="modal fade" id="tambah_soal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_tambah_soal">
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea name="soal" id="soal" cols="30" rows="10" class="form-control" placeholder="isikan soal"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <input type="text" class="form-control" id="jawaban" name="jawaban" placeholder="isikan jawaban">
                    </div>
                    <button type="reset" class="btn btn-danger mt-3">Reset</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saving_tambah_soal()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal tambahsoal -->

<!-- Modal edit jawaban-->
<div class="modal fade" id="jawaban_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit jawaban</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="isi_editjawaban">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saving_jawaban()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal edit jawaban -->

<!-- modal tambah jawaban -->
<div class="modal fade" id="tambah_jawaban" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah jawaban</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_tambah_jawaban">
                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <input type="hidden" class="form-control" id="id_soal" name="id_soal">
                        <input type="text" class="form-control" id="pilihan_jawab" name="pilihan_jawab" required placeholder="jawaban">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saving_tambah_jawaban()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal tambah jawaban -->

<script>
    $(document).ready(function() {
        $("#dataku").dataTable({

            "order": [],
            "columnDefs": [{
                "defaultContent": "-",
                "targets": 'no-sort',
                "targets": "_all",
                "orderable": false,
            }]

        });


    });

    function edit_soal(id) {
        $('#isi_editsoal').load('edit_soal.php?id=' + id);
    }

    function edit_jawaban(id) {
        $('#isi_editjawaban').load('edit_jawaban.php?id=' + id);
    }

    function hapus_soal(id) {
        swal({
                title: "Yakin akan menghapus Soal??",
                text: "Data akan hilang jika dihapus!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "hapus_soal.php",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            swal("Deleted!", "Data has been deleted.", "success");
                            $('#isitabel').load('isitabel.php');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal("Error !", "Error deleting data", "error");
                        }
                    });

                } else {
                    swal("Cancelled", "oke.. data soal masih aman :)", "error");
                }
            });
    }

    function hapus_jawaban(id) {
        swal({
                title: "Yakin akan menghapus jawaban?",
                text: "Data akan hilang jika dihapus!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "hapus_jawaban.php",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            swal("Deleted!", "Data has been deleted.", "success");
                            $('#isitabel').load('isitabel.php');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal("Error !", "Error deleting data", "error");
                        }
                    });

                } else {
                    swal("Cancelled", "oke.. data jawaban masih aman :)", "error");
                }
            });
    }

    function saving_tambah_soal() {
        var url = "tambah_soal.php";
        var formData = new FormData($('#form_tambah_soal')[0]);
        if ($('#soal').val() == '' || $('#jawaban').val() == '') {
            $('#tambah_soal').modal('hide');
            swal("Warning !", "Isi dulu bro semuanya", "error");
        } else {
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {

                    if (data.status) //if success
                    {

                        $('#tambah_soal').modal('hide');
                        swal("Success!", "Successfully Added", "success");
                        $('#isitabel').load('isitabel.php');

                    }



                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal("Error !", "Error added data", "error");

                }

            });
        }

    }

    function saving_soal() {
        var url = "ubah_soal.php";
        var formData = new FormData($('#form_edit_soal')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success
                {

                    $('#soal_edit').modal('hide');
                    swal("Success!", "Successfully edit", "success");
                    $('#isitabel').load('isitabel.php');

                }



            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal("Error !", "Error edit data", "error");

            }

        });
    }

    function tambah_jawaban(id) {
        $('#form_tambah_jawaban')[0].reset();
        $('#id_soal').val(id);
    }

    function saving_jawaban() {
        var url = "ubah_jawaban.php";
        var formData = new FormData($('#form_edit_jawaban')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success
                {

                    $('#jawaban_edit').modal('hide');
                    swal("Success!", "Successfully edit", "success");
                    $('#isitabel').load('isitabel.php');

                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal("Error !", "Error edit data", "error");

            }

        });
    }

    function saving_tambah_jawaban() {
        var url = "tambah_jawaban.php";
        var formData = new FormData($('#form_tambah_jawaban')[0]);
        if ($('#pilihan_jawab').val() == '') {
            $('#tambah_jawaban').modal('hide');
            swal("Warning !", "Isi dulu bro jawabanya!!", "error");
        } else {
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {

                    if (data.status) //if success
                    {

                        $('#tambah_jawaban').modal('hide');
                        swal("Success!", "Successfully Added", "success");
                        $('#isitabel').load('isitabel.php');

                    }



                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal("Error !", "Error added data", "error");

                }

            });
        }
    }
</script>