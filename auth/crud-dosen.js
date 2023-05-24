$(document).ready(function () {
    // Mengisi data pada modal edit
    $('.edit-btn').click(function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var nidn = $(this).data('nidn');
        var jenjang_pendidikan = $(this).data('jenjang_pendidikan');

        $('#edit-id').val(id);
        $('#edit-nama').val(nama);
        $('#edit-nidn').val(nidn);
        $('#edit-jenjang_pendidikan').val(jenjang_pendidikan);

        $('#editModal').modal('show');
    });

    // Mengisi data pada modal hapus
    $('.delete-btn').click(function () {
        var id = $(this).data('id');
        $('#delete-id').val(id);

        $('#deleteModal').modal('show');
    });
});