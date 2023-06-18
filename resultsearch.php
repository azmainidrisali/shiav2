<?php
/* Template Name: Result searchsss */
get_header();
?> 




<div class="container mt-5">
    <h2>Search Admissions</h2>
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
      <div class="form-group">
        <label for="rollNumber">Roll Number:</label>
        <input type="text" class="form-control" id="rollNumber" name="rollNumber" placeholder="Enter Roll Number">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>

    

<?php
get_footer();