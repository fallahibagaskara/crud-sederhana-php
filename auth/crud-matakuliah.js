$(document).ready(function () {
    // Mengisi data pada modal edit
    $('.edit-btn').click(function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var kode = $(this).data('kode');
        var deskripsi = $(this).data('deskripsi');

        $('#edit-id').val(id);
        $('#edit-nama').val(nama);
        $('#edit-kode').val(kode);
        $('#edit-deskripsi').val(deskripsi);

        $('#editModal').modal('show');
    });

    // Mengisi data pada modal hapus
    $('.delete-btn').click(function () {
        var id = $(this).data('id');
        $('#delete-id').val(id);

        $('#deleteModal').modal('show');
    });
});