<script>
	function xoa (id) {
		fetch('/admin/api/contact/delete.php', {
			method: 'POST',
			body: JSON.stringify({contactID: id})
		})
			.then(result => {
				let table = document.getElementById('contact-list')
				if (result.status === 200) {
					napLaiTable()
				} else {
					table.tBodies[0].innerHTML = '<h3>ERROR</h3>'
				}
			})
	}

</script>