<?php 
    require 'model.php';

    $peminjaman = query("SELECT peminjaman.id_peminjam, anggota.nama, peminjaman.tgl_kembali 
                         FROM peminjaman
                         JOIN anggota
                         ON peminjaman.id_anggota = anggota.id_anggota");
    
    $status = query("SELECT * FROM status");

    if(isset($_POST["submit"])) {
        if(createPengembalian($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        }
    }
?>

<?php include('../layouts/header/header.php'); ?>
    <div class="container mt-4">
        <form action="" method="post">
            <div class="mb-3 col-6">
                <label for="id_peminjaman" class="form-label">Peminjam</label>
                <select class="form-select" name="id_peminjaman" id="id_peminjaman" required>
                    <option value="" selected>Pilih Nama Peminjam</option>
                    <?php foreach($peminjaman as $peminjam): ?>
                        <option value="<?= $peminjam["id_peminjam"]; ?>" tgl_akhir_kembali="<?= $peminjam["tgl_kembali"]; ?>">
                            <?= $peminjam["nama"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="tgl_akhir_kembali" class="form-label">Tanggal Akhir Kembali</label>
                <input type="date"  name="tgl_akhir_kembali" class="form-control" id="tgl_akhir_kembali" disabled>
            </div>
            <div class="mb-3 col-6">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali Terkini</label>
                <input type="date"  name="tgl_kembali" class="form-control" id="tgl_kembali" required>
            </div>
            <div class="mb-3 col-6">
                <label for="id_status" class="form-label">Status</label>
                <select class="form-select" name="id_status" id="id_status" required>
                    <option value="" selected>Pilih status</option>
                    <?php foreach($status as $sts): ?>
                        <option value="<?= $sts["id_status"]; ?>"><?= $sts["status"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="denda" class="form-label">Denda</label>
                <input type="text"  name="denda" class="form-control" id="denda" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const peminjamSelect = document.getElementById('id_peminjaman');
            const tglAkhirInput = document.getElementById('tgl_akhir_kembali');

            peminjamSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const tglAkhirKembali = selectedOption.getAttribute('tgl_akhir_kembali');
                
                if (tglAkhirKembali) {
                    tglAkhirInput.value = tglAkhirKembali;
                    tglAkhirInput.disabled = true;
                } else {
                    tglAkhirInput.value = '';
                    tglAkhirInput.disabled = true;
                }
            });
        });
    </script>
<?php include('../layouts/footer/footer.php'); ?>
