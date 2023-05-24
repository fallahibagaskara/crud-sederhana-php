$(document).ready(function () {
    // Mengisi data pada modal edit
    $('.edit-btn').click(function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var nim = $(this).data('nim');
        var program_studi = $(this).data('program_studi');

        $('#edit-id').val(id);
        $('#edit-nama').val(nama);
        $('#edit-nim').val(nim);
        $('#edit-program_studi').val(program_studi);

        $('#editModal').modal('show');
    });

    // Mengisi data pada modal hapus
    $('.delete-btn').click(function () {
        var id = $(this).data('id');
        $('#delete-id').val(id);

        $('#deleteModal').modal('show');
    });
});