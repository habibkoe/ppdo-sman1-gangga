<?php foreach ($master_kelas as $kelas) : ?>
    <div class="col-lg-3" style="cursor: pointer;">
        <div class="box wow fadeInLeft">
            <div class="icon"><i class="fa fa-bar-chart"></i></div>
            <h4 class="title"><?= $kelas['nama'] ?></h4>
            <p class="description">
                Kapasitas: <?= $kelas['daya_tampung'] ?> siswa
                Terisi: <?= $jml_siswa_pada_kelas[$kelas['id']] ?> siswa
                <br>
                <button class="btn btn-outline-primary btn-xs" onclick="pilihSiswa(<?= $kelas['id'] ?>)">+</button>
                <button class="btn btn-outline-info btn-xs" onclick="showSiswa(<?= $kelas['id'] ?>)">Lihat</button>
            </p>
        </div>
    </div>
<?php endforeach; ?>