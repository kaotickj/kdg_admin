<?php
require_once('initialize.php');
require_login();
    // Get requested ID
    $id = $_GET['id'] ?? false;
    if(!$id) {
        redirect_to('?page=viewArts');
    }
    $article = Article::find_by_id($id);
    if(!$article) {
        redirect_to(url_for('?page=viewArts'));
    }

    if(is_post_request()){
        // Update record using post parameters
        $args = [];
        $args['title'] = $_POST['title'] ?? NULL;
        $args['category'] = $_POST['category'] ?? NULL;
        $args['image'] = $_POST['image'] ?? NULL;
        $args['author'] = $_POST['author'] ?? NULL;
        $args['description'] = $_POST['description'] ?? NULL;
        $args['img_alt'] = $_POST['img_alt'] ?? NULL;
        $args['body'] = $_POST['body'] ?? NULL;
        $args['active'] = $_POST['active'] ?? NULL;
        $args['page'] = $_POST['page'] ?? NULL;
        $args['show_title'] = $_POST['show_title'] ?? NULL;
        $args['show_byline'] = $_POST['show_byline'] ?? NULL;
        $args['no_index'] = $_POST['no_index'] ?? NULL;
        $args['schemadata'] = $_POST['schemadata'] ?? NULL;
        $args['moddate'] = date("D, j M Y G:i:s T") ?? NULL;
        $args['modauthor'] = $_SESSION['name'] ?? NULL;

        $article->merge_attributes($args);
        $article->save();

        $result = false;
        if($result === true) {
            $_SESSION['message'] = "The article was updated successfully.";
            redirect_to(url_for('?page=viewSinglePage&id=' . $id));
        } else {
        // show errors
        }

    } else {

      // display the form

    }
?>

<p>&nbsp;</p>
<h2><i class="fa fa-file-text" aria-hidden="true"></i> Edit Page <small><a href="index.php?page=viewArts" class="btn btn-sm btn-primary" style="position:relative;float:right;"><span style="font-size:1em;"><i class="fa fa-eye" aria-hidden="true"></i> View Page List </span></a></small></h2>

<form action="" method="POST">
<?php include 'formFields.php'; ?>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>&nbsp;&nbsp;<button type="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
    </div>
  </div>
</form>