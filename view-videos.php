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
		
			<h2 class="text-center mt-3">Vidoer:</h2>
				<!-- Start video container -->
		<div class="row d-flex justify-content-around mt-3">
				
				<!--Showing all videos -->
				<div class="col-xl-4 col-sm-12 mb-3">
					<?php
				require_once( 'database-connect/dbcon.php' );

				$sql = 'SELECT id as vid, title, description, location FROM ss_videos ORDER BY id DESC';
				$stmt = $link->prepare($sql);
				$stmt->bind_result($vid, $title, $description, $location);
				$stmt->execute();
				while ($stmt->fetch()) {
				 echo "<div >";
				 echo "<video src='".$location."' controls width='320px' height='200px' >";
				 echo "</div>";
		 		  }
					?>
					
			<div class="col">
			
			</div>
			<div class="category-item col-xl-3 col-sm-12">

				<h2 class="d-inline">
					<?= $title ?>
				</h2>
				<div class="delete d-inline float-right">
					<form action="" method="post">
						<input type="hidden" name="cid" value="<?=$vid?>">
						<div class="delete-img">
							<input type="image" src="images/delete-img.png" title="Delete" width="20" height="20" alt="Delete">
						</div>
					</form>
				</div>
				<p>
					<?= $description ?>
				</p>
				
			</div>
			<div class="col"></div>

			<?php

			//echo "Titel: " . $row[ "title" ] . "<br>" . "Beskrivelse: " . $row[ "description" ]. "<br>" . " Forhåndsvisning: " . $row[ "thumbnail" ] . "<br>".PHP_EOL;
			


			$link->close();
			?>





				</div>
			</div>


			
			
			<?php
		if(isset($_SESSION['role'])){
				?>
			<!--add new video-->
			<div class="row">
			<h2 class="mx-auto mt-3">Tilføj ny video</h2>
		</div>
		<div class="row">
			<div class="mx-auto">
				<form class="mt-3" method="post" action="create-video.php" autocomplete="off" enctype="multipart/form-data">
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
  <input type="file" name="video_title" accept="video/mp4" class="custom-file-input" id="customFile" required>
  <label class="custom-file-label" for="customFile">Vælg video (.mp4)</label>
</div>
					<br>
					<input class="btn btn-primary btn-block" name="btnaddvideo" type="submit" value="Tilføj">
				</form>
			</div>
		</div>
			
		<?php
			}
		else {
			
		}
		?>
			<?php
			include 'includes/footer.php';
		?>
		</div>
</body>
</html>