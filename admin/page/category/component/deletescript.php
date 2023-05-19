<script>
	function xoa (id) {
		fetch('/admin/category/delete.php', {
			method: 'POST',
			body: JSON.stringify({catID: id})
		})
			.then(result => {
				let table = document.getElementById('category-list')
				if (result.status === 200) {
					napLaiTable()
				} else {
					table.tBodies[0].innerHTML = '<h3>ERROR</h3>'
				}
			})
	}

</script>