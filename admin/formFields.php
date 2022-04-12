<?php
require_once('initialize.php');
require_login();
if(!isset($article)) die('Nothing to do');

if(isset($article->id))  {
?>
<div class="" style="padding:20px;border:1px solid #333; margin:20px auto;background:#000;color:#fff;">
    <h3>Page Info</h3>
            <h4 style="border:1px solid #fff;padding:5px;"><span style="margin:25px 25px;position:relative;">Page ID: <?php echo $article->id; ?></span> | <span style="margin:25px 25px;position:relative;">Page Views: <?php echo $article->hits; ?></span></h4>
    <table class="db_table" style="background:#000000;border:1px solid #333;color:black;width:100%;">
        <tr>
            <th>Created: </th>
            <th>Last Modified: </th>
            <th>Manage: </th>
        </tr>
        <tr style="color:white;">
            <td style="padding:5px 10px;border:1px solid #fff;"><?php echo $article->created_date; ?>  <a href="#" style="color:#fff!important;border:none!important;"><i class="fas fa-question-circle" aria-hidden="true" title="Created By <?php echo $article->author; ?>"></i></a></td>
            <td style="padding:5px 10px;border:1px solid #fff;">
                <?php if(isset($article->moddate) && $article->moddate != "") {
                echo $article->moddate;
                } else {
                    echo $article->created_date;
                }
                ?> <a href="#" style="color:#fff!important;border:none!important;"><i class="fas fa-question-circle" aria-hidden="true" title="Modified By <?php echo $article->modauthor; ?>"></i></a></td>
<td style="padding:5px 10px;border:1px solid #fff;"><a class="btn btn-sm btn-primary" href="https://kdgwebsolutions.com/<?php echo h($article->page); ?>" target="_blank" style="color:#fff!important;margin:5px 0px;"><i class="fa fa-eye" aria-hidden="true"></i> View </a> <a style="color:#fff!important;margin:8px 0px;" class="btn btn-sm btn-danger" href="index.php?page=delete&id=<?php echo h($article->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
        </tr>
    </table>
    <p>&nbsp;</p>
  </div>
<?php
}
?>
    <div class="form-group row">
        <label for="image" class="col-4 col-form-label">Article Image</label>
        <div class="col-8">
            <div class="input-group">
<?php
        if(!$_GET['id']) {
?>
                <input id="image" name="image" type="file" style="vertical-align:middle;height:30px;" class="form-control" aria-describedby="imageHelpBlock" required="required">
          </div>
            <span id="imageHelpBlock" class="form-text text-muted">Choose an image to set as main article image.</span>
<?php
        } else {
?>
                <input id="image" name="image" type="text" style="vertical-align:middle;height:30px;" class="form-control" aria-describedby="imageHelpBlock" value="<?php echo h($article->image); ?>" required="required">
          </div>
            <span id="imageHelpBlock" class="form-text text-muted">Enter path to an image to set as main article image.</span>
<?php
}
?>
        </div>
    </div>
    <div class="form-group row">
        <label for="img_alt" class="col-4 col-form-label">Image Alt Text</label>
        <div class="col-8">
            <div class="input-group">
                <input id="img_alt" name="img_alt" placeholder="This image shows... " type="text" aria-describedby="img_altHelpBlock" class="form-control" value="<?php echo h($article->img_alt); ?>" required="required">
            </div>
            <span id="img_altHelpBlock" class="form-text text-muted">Please enter a description of the image for ADA compliance.</span>
        </div>
    </div>
     <div class="form-group row">
        <label for="title" class="col-4 col-form-label">Article Title</label>
        <div class="col-8">
            <div class="input-group">
                <input id="title" name="title" placeholder="Please enter a title." type="text" class="form-control" aria-describedby="titleHelpBlock" value="<?php echo h($article->title); ?>" required="required">
            </div>
            <span id="titleHelpBlock" class="form-text text-muted">Please enter an seo optimized title.</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="body" class="col-4 col-form-label">Article Body</label>
        <div class="col-8">
            <textarea id="tiny" name="body" style="height:30em; width:100%;" class="form-control" aria-describedby="bodyHelpBlock"><?php echo $article->body; ?></textarea>
            <span id="bodyHelpBlock" class="form-text text-muted">Please enter the body of your article.</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="author" class="col-4 col-form-label">Choose Author</label>
        <div class="col-8">
            <select id="author" name="author" class="custom-select" aria-describedby="authorHelpBlock" required="required">
        <option value="">Please Choose</option>
    <?php foreach(Article::AUTHORS as $author) {
     ?>
      <option value="<?php echo $author; ?>" <?php if($article->author == $author) { echo 'selected'; } ?>><?php echo $author; ?></option>
    <?php } ?>
            </select>
            <span id="authorHelpBlock" class="form-text text-muted">Please choose the article author.</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="category" class="col-4 col-form-label">Article Category</label>
        <div class="col-8">
            <select id="category" name="category" class="custom-select" aria-describedby="categoryHelpBlock" required="required">
        <option value="">Please Choose</option>
    <?php foreach(Article::CATEGORIES as $category) { ?>
      <option value="<?php echo $category; ?>" <?php if($article->category == $category) { echo 'selected'; } ?>><?php echo $category; ?></option>
    <?php } ?>
       </select>
      <span id="categoryHelpBlock" class="form-text text-muted">Please choose the category</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-4 col-form-label">Meta Description</label>
    <div class="col-8">
      <textarea id="description" name="description" cols="40" rows="5" class="form-control" aria-describedby="descriptionHelpBlock"><?php echo h($article->description); ?></textarea>
      <span id="descriptionHelpBlock" class="form-text text-muted">Enter seo optimized description for the article</span>
    </div>
  </div>
    <div class="form-group row">
        <label for="active" class="col-4 col-form-label">Choose Active Status</label>
        <div class="col-8">
            <select id="active" name="active" class="custom-select" aria-describedby="activeHelpBlock" required="required">
        <option value="">Please Choose</option>
    <?php foreach(Article::ACTIVE as $active) {
     ?>
      <option value="<?php echo $active; ?>" <?php if($article->active == $active) { echo 'selected'; } ?>><?php echo $active; ?></option>
    <?php } ?>
            </select>
            <span id="activeHelpBlock" class="form-text text-muted">Choose 1 to include in rss feed and sitemap, or 0 to exclude.</span>
        </div>
    </div>
  <div class="form-group row">
    <label for="page" class="col-4 col-form-label">Page Name</label>
    <div class="col-8">
      <div class="input-group">
        <input id="page" name="page" placeholder="URI format page name" type="text" class="form-control" aria-describedby="pageHelpBlock" required="required" value="<?php echo h($article->page); ?>">
      </div>
      <span id="pageHelpBlock" class="form-text text-muted">Please enter a name for the page in the URI format.</span>
    </div>
  </div>
    <div class="form-group row">
        <label for="no_index" class="col-4 col-form-label">Choose Robots Index Status</label>
        <div class="col-8">
            <select id="no_index" name="no_index" class="custom-select" aria-describedby="no_indexHelpBlock" required="required">
        <option value="">Please Choose</option>
    <?php foreach(Article::NO_INDEX as $no_index) {
     ?>
      <option value="<?php echo $no_index; ?>" <?php if($article->no_index == $no_index) { echo 'selected'; } ?>><?php echo $no_index; ?></option>
    <?php } ?>
            </select>
            <span id="no_indexHelpBlock" class="form-text text-muted">Choose 0 to allow indexing, or 1 to disallow.</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="show_byline" class="col-4 col-form-label">Choose Byline Visibility</label>
        <div class="col-8">
            <select id="show_byline" name="show_byline" class="custom-select" aria-describedby="show_bylineHelpBlock" required="required">
        <option value="">Please Choose</option>
    <?php foreach(Article::SHOW_BYLINE as $show_byline) {
     ?>
      <option value="<?php echo $show_byline; ?>" <?php if($article->show_byline == $show_byline) { echo 'selected'; } ?>><?php echo $show_byline; ?></option>
    <?php } ?>
            </select>
            <span id="show_bylineHelpBlock" class="form-text text-muted">Shows('1') or hides('0') the article attribution information.</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="show_title" class="col-4 col-form-label">Choose Title Visibility</label>
        <div class="col-8">
            <select id="show_title" name="show_title" class="custom-select" aria-describedby="show_titleHelpBlock" required="required">
        <option value="">Please Choose</option>
    <?php foreach(Article::SHOW_TITLE as $show_title) {
     ?>
      <option value="<?php echo $show_title; ?>" <?php if($article->show_title == $show_title) { echo 'selected'; } ?>><?php echo $show_title; ?></option>
    <?php } ?>
            </select>
            <span id="show_titleHelpBlock" class="form-text text-muted">Shows('1') or hides('0') the article h1 element.</span>
        </div>
    </div>
  <div class="form-group row">
    <label for="schema_data" class="col-4 col-form-label">J4 Schema Markup</label>
    <div class="col-8">
      <textarea id="schema_data" name="schema_data" cols="40" rows="5" class="form-control" aria-describedby="schema_dataHelpBlock"><?php echo h($article->schemadata); ?></textarea>
      <span id="schema_dataHelpBlock" class="form-text text-muted">Enter the J4 Schema data.  Optional but preferred.</span>
    </div>
  </div>