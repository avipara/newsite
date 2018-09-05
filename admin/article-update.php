<?php
	require_once '../includes/init.php';
	require_once '../includes/admin-check.php';
	require_once '../includes/db_connection.php';


	if(!empty($_POST)) {
		extract($_POST);

		$now = date('Y-m-d H:i:s');

		$sql = "UPDATE articles SET name = '{$name}', slug = '{$slug}', category_id = '{$category_id}', content = '{$content}', status = '{$status}', updated_at = '{$now}'";

		if(isset($published_at) && !empty($published_at)) {
			$published_at = date('Y-m-d H:i:s', strtotime($published_at));

			$sql .= ", published_at = '{$published_at}'";
		}
		else {
			if($status == 'published') {
				$sql .= ", published_at = '{$now}'";
			}
			else {
				$sql .= ", published_at = NULL";
			}
		}

		if(isset($_FILES['featured']) && !empty($_FILES['featured']) && $_FILES['featured']['error']==0) {
			$image = $_FILES['featured'];
			$ext = pathinfo($image['name'], PATHINFO_EXTENSION);
			$filename = 'article_'.date('smHYid').'_'.rand(1000, 9999).".".$ext;
			move_uploaded_file($image['tmp_name'], '../images/'.$filename);
			$sql .= ", featured_image = '{$filename}'";

			if(isset($featured_image) && !empty($featured_image)) {
				@unlink('../images/'.$featured_image);
			}
		}

		$sql .= " WHERE id = '{$id}'";

		$result = db_query($con, $sql);

		if($result) {
			$_SESSION['message'] = [
				'content' => 'New article updated.',
				'type' => 'success'
			];

			redirect('admin/articles.php');
		}
		else {
			$_SESSION['message'] = [
				'content' => 'Error while adding data. '.db_error($con),
				'type' => 'danger'
			];

			redirect('admin/articles.php');
		}
	}
	else {
		$_SESSION['message'] = [
			'content' => 'Invalid action.',
			'type' => 'danger'
		];

		redirect('admin/articles.php');
	}