<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/_meta'); ?>
	<?php $this->load->view('partials/_css'); ?>
	<style>
		html,
		body {
			height: 100%;
			overflow: hidden;
		}

		.content-wrapper {
			flex: 1;
			display: flex;
			flex-direction: column;
			overflow: hidden;
		}

		main {
			flex: 1;
			overflow-y: auto;
			padding: 1.5rem;
		}
	</style>
</head>

<body class="h-screen flex bg-gray-50">
	<?php $this->load->view('partials/_kepala_sidebar'); ?>
	<div id="content-wrapper" class="content-wrapper flex-1 flex flex-col overflow-hidden">
		<?php $this->load->view('partials/_header_kepala'); ?>
		<main class="flex-1 overflow-y-auto p-6 md:p-10">
			<?php $this->load->view('pages/kepala/pengajuan/detail'); ?>
		</main>
	</div>
	<?php $this->load->view('partials/_scripts'); ?>
</body>

</html>