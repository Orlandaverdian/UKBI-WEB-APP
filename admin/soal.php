<?php
session_start();
require "../koneksi.php";
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<div class="row">
    <div class="col-sm-12 text-center">
        <div id="timer">00:00</div>
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            <strong>Aturan Main : </strong> Soal dan jawaban akan tampil secara acak. setiap jawaban benar maka anda mendapat point +4 dan setiap jawaban salah anda mendapat point -1.
        </div>

        <h1 class="mt-3">Score Anda : <div id="nilai">0</div>
        </h1>

        <?php
        $no = 1;
        $soal = mysqli_query($con, "SELECT * from tbl_soal ORDER BY RAND() LIMIT 30");

        while ($row = mysqli_fetch_assoc($soal)) : ?>

            <?php
            $jawaban = mysqli_query($con, "SELECT * from tbl_jawaban WHERE id_soal = '" . $row["id"] . "' ORDER BY RAND()  "); ?>

            <form id="form_jawab_<?= $no; ?>" method="POST" action="hasil.php">
                <p class="fs-5"><?= $no; ?>. <?= $row['soal']; ?></p>

                <div class="kotak">
                    <?php
                    $total = mysqli_num_rows($jawaban);
                    while ($rowjwb = mysqli_fetch_assoc($jawaban)) :

                        if ($total == 4) {
                            $abjad = 'A';
                        } elseif ($total == 3) {
                            $abjad = 'B';
                        } elseif ($total == 2) {
                            $abjad = 'C';
                        } else {
                            $abjad = 'D';
                        }
                    ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="id" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="sementara" value="0">
                                <div class="input-group">
                                    <span class="input-group-addon"><input class="cursor" type="radio" id="jawaban_<?= $no; ?>" name="jawaban" value="<?= $rowjwb['pilihan_jawab'] ?>"></span>
                                    <input type="text" class="form-control ms-3" value="<?= $abjad . '. ' . $rowjwb['pilihan_jawab'] ?>" readonly>

                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->

                    <?php $total--;
                    endwhile; ?>
                </div>

                <br>
                <button id="btn_pilih_<?= $no; ?>" class="btn btn-lg btn-success">Pilih</button>

            </form>

            <script>
                $("#form_jawab_<?php echo $no; ?>").submit(function() {

                    var next = '<?php echo $no + 1; ?>';
                    if (!$("#jawaban_<?= $no; ?>:checked").val()) {
                        swal({
                            title: "Hello.. !",
                            text: "Pilih dulu jawabannya bro..!!",
                            imageUrl: '../assets/img/warn.png'
                        });
                        return false;
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            success: function(data) {
                                var myarr = data.split('/');
                                if (myarr[0] == 'jawaban anda benar, anda dapat 4 point') {
                                    swal({
                                        title: "Benar !",
                                        text: myarr[0],
                                        imageUrl: '../assets/img/up.png'
                                    });
                                } else {
                                    swal({
                                        title: "Salah !",
                                        text: myarr[0],
                                        imageUrl: '../assets/img/down.png'
                                    });
                                }
                                $('#nilai').text(myarr[1]);
                                $('#form_jawab_<?php echo $no; ?>').hide();
                                $('#form_jawab_' + next).show();

                                return false;
                            }
                        });
                        return false;
                    }


                });
            </script>
            <script>
                // timer
                var timer;
                var timeRemaining;

                function countdownTimer(duration, display) {
                    var timer = duration,
                        minutes, seconds;
                    timerInterval = setInterval(function() {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        display.textContent = minutes + ":" + seconds;

                        if (timer < 50) {
                            document.getElementById("timer").style.color = "red";
                        }
                        if (--timer < 0) {
                            // Countdown selesai
                            clearInterval(timerInterval);
                            // Tambahkan logika setelah countdown selesai di sini
                            display.textContent = "waktu anda habis";
                            document.getElementById("timer").style.color = "white";
                            direct();
                        }
                    }, 1000);
                }

                function direct() {
                    $('#kontenku').load('times_up.php');
                }

                // Menggunakan countdownTimer
                var fiveMinutes = 360 * 10, // Mengatur durasi countdown (dalam detik)
                    display = document.querySelector('#timer');

                countdownTimer(fiveMinutes, display);
            </script>

        <?php
            $no++;

        endwhile;


        for ($i = 2; $i <= 10; $i++) {  ?>
            <script>
                $('#form_jawab_<?= $i; ?>').hide()
            </script>
        <?php } ?>

    </div>

</div>