<script>
	function xoa (id) {
		fetch('/admin/user/delete.php', {
			method: 'POST',
			body: JSON.stringify({adminID: id})
		})
			.then(result => {
				let table = document.getElementById('user-list')
				if (result.status === 200) {
					napLaiTable()
				} else {
					table.tBodies[0].innerHTML = '<h3>ERROR</h3>'
				}
			})
	}

</script>