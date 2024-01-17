<?= $this->extend('user/templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Tambah Pengadaan Barang</h1>

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <div class="row">
        <div class="col-12">

            <div class="card shadow">
                <div class="card-header">
                    <a href="/user/pengadaan">&laquo; Kembali ke daftar pengadaan barang</a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/user/simpanPengadaan') ?> " method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input name="nama_barang" type="text" class="form-control form-control-user <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="input-nama_barang" placeholder="Nama Barang" value="<?= old('nama_barang'); ?>" />
                                    <div id="nama_barangFeedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="spesifikasi">Spesifikasi Barang</label>
                                    <input name="spesifikasi" type="text" class="form-control form-control-user <?= ($validation->hasError('spesifikasi')) ? 'is-invalid' : ''; ?>" id="input-spesifikasi" placeholder="Nama Barang" value="<?= old('spesifikasi'); ?>" />
                                    <div id="spesifikasiFeedback" class="invalid-feedback">
                                        <?= $validation->getError('spesifikasi'); ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="jumlah">Jumlah Barang</label>
                                    <input name="jumlah" type="number" class="form-control form-control-user <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="input-jumlah" placeholder="jumlah" value="<?= old('jumlah'); ?>" />
                                    <div id="tipeFeedback" class="invalid-feedback">
                                        <?= $validation->getError('jumlah'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_periode">Pilih Tahun</label>
                                    <select name="tahun_periode" class="form-control form-control-user <?= ($validation->hasError('tahun_periode')) ? 'is-invalid' : ''; ?>" id="input-tahun_periode">
                                        <option value="" disabled selected>Pilih Tahun</option>
                                        <?php
                                        $startYear = 2010;
                                        $endYear = 2050;

                                        for ($year = $endYear; $year >= $startYear; $year--) {
                                            echo "<option value=\"$year\">" . $year . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <div id="tipeFeedback" class="invalid-feedback">
                                        <?= $validation->getError('tahun_periode'); ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Nama Pengaju Permintaan Barang</label>
                                    <div class="form-check">
                                        <input class="form-check-input anonym" type="radio" name="nama_pengaju" id="nama_pengaju1" value="anonym" checked>
                                        <label class="form-check-label" for="nama_pengaju1">
                                            <span class="text-gray-800">Samarkan (anonym)</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nama_pengaju" id="nama_pengaju2" value="2">
                                        <label class="form-check-label" for="nama_pengaju2">
                                            <span class="text-gray-800">Gunakan nama sendiri</span>
                                        </label>
                                    </div>
                                    <input type="text" class="form-control nama_pengaju" name="nama_pengaju" value="<?= user()->username; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alasan_pengadaan">Jelaskan lebih rinci Alasan pengadaan</label>
                                    <textarea name="alasan_pengadaan" id="alasan_pengadaan" cols="30" rows="13" class="form-control <?= $validation->hasError('alasan_pengadaan') ? 'is-invalid' : ''; ?>"><?= old('alasan_pengadaan'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alasan_pengadaan'); ?>
                                    </div>
                                </div>



                            </div>
                            <button class="btn btn-block btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>
<?= $this->section('additional-js'); ?>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $($this).remove();
        })

    }, 3000);
    // Saat radio button berubah
    $('input[type=radio]').click(function() {
        if ($(this).hasClass('anonym')) {
            $('.nama_pengaju').val('anonym').hide();
        } else {
            $('.nama_pengaju').show();
        }
    });
</script>
<?= $this->endSection(); ?>