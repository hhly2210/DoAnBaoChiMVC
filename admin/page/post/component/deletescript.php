<script>
	function xoa (id) {
		fetch('/admin/api/post/delete.php', {
			method: 'DELETE',
			body: JSON.stringify({postID: id})
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
	function duyet (id) {
		fetch('/admin/api/post/verify_status.php', {
			method: 'POST',
			body: JSON.stringify({postID: id})
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