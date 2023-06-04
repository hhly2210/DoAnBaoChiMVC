<script>
	function xoa (id) {
		fetch('/admin/api/comment/delete.php', {
			method: 'POST',
			body: JSON.stringify({commentID: id})
		})
			.then(result => {
				let table = document.getElementById('comment-list')
				if (result.status === 200) {
					napLaiTable()
				} else {
					table.tBodies[0].innerHTML = '<h3>ERROR</h3>'
				}
			})
	}

</script>