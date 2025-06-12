<div class="flex space-x-2">
	<a href="<?= site_url('admin/news/edit/' . $id) ?>"
		class="text-blue-600 hover:text-blue-900"
		title="Edit">
		<i class="fas fa-edit"></i>
	</a>

	<form action="<?= site_url('admin/news/delete/' . $id) ?>" method="post" class="inline">
		<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
			value="<?= $this->security->get_csrf_hash(); ?>" />
		<input type="hidden" name="_method" value="DELETE">
		<button type="button"
			onclick="confirmDelete(this)"
			class="text-red-600 hover:text-red-900 ml-2"
			title="Hapus">
			<i class="fas fa-trash"></i>
		</button>
	</form>
</div>

<script>
	function confirmDelete(button) {
		Swal.fire({
			title: 'Anda yakin?',
			text: "Data yang dihapus tidak dapat dikembalikan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Ya, hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				button.closest('form').submit();
			}
		});
	}
</script>