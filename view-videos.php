<!doctype html>
<html>
<head>
	<?php
		include 'includes/head.php';
	?>
<body>
	<div class="container-fluid">
		<?php
			include 'includes/navbar.php';
		?>
		<div class="container mt-3 mb-3">
			<div class="row">

				<div class="media col-xl-6 pt-3 border video-list">
					<img class="align-self-start mr-3" src="../images/fa-image.png" width="64" alt="Generic placeholder image">
					<div class="media-body">
						<h5 class="mt-0">Top-aligned media</h5>
						<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
						<hr>
						<!--New video-->
						<img class="align-self-start mr-3" src="../images/fa-image.png" width="64" alt="Generic placeholder image">
						<h5 class="mt-0">Top-aligned media</h5>
						<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
						<hr>
						
					</div>
				</div>

				<div class="col-xl-4 col-sm-12 mb-3">
					<div class="font-weight-bold">vid-title</div>
					<img src="https://via.placeholder.com/300x300">
				</div>
			</div>
			
			<!--add new video-->
			<div class="row">
			<h2 class="mx-auto mt-3">Tilføj ny video</h2>
		</div>
		<div class="row">
			<div class="mx-auto">
				<form class="mt-3" method="post" action="create-video.php" autocomplete="off">
					<div class="form-input">
						<div class="font-weight-bold input-txt">Titel: </div>
						<input class="input-field" type="text" name="video_title" required>
					</div>
					<br>
					<div class="form-input">
						<div class="font-weight-bold input-txt">Beskrivelse: </div>
						<input class="input-field" type="text" name="video_description" required>
					</div>
					<br>
					<div class="custom-file mb-3">
  <input type="file" accept="video/mp4" class="custom-file-input" id="customFile" required>
  <label class="custom-file-label" for="customFile">Vælg video (.mp4)</label>
</div>
					<br>
					<input class="btn btn-primary btn-block" name="btnaddvideo" type="submit" value="Tilføj">
				</form>
			</div>
		</div>
			</div>
			<?php
			include 'includes/footer.php';
		?>
		
	</div>
</body>
</html>