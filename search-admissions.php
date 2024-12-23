<?php
/* Template Name: Result search */
get_header();
?> 


<div class="container mt-5">
  <h2>Search Result</h2>
  <?php
    if (isset($shiacomputeroption['PublicResultSearch'])) {
        $get_PublicResultSearch_id = $shiacomputeroption['PublicResultSearch']; // Get the selected page ID

        if ($get_PublicResultSearch_id) {
            $get_PublicResultSearch_link = get_permalink($get_PublicResultSearch_id); // Get the permalink of the selected page
        }
    }
  ?>

  <div class="container mt-5">      

    <form method="get" action="<?php echo($get_PublicResultSearch_link) ?>">
      <div class="form-group">
        <label for="rollNumber">Roll Number:</label>
        <input type="text" class="form-control" id="rollNumber" name="rollNumber" placeholder="Enter Roll Number">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <h3></h3>

    <?php
      if (isset($_GET['rollNumber'])) {
        $rollNumber = sanitize_text_field($_GET['rollNumber']);
      
        $args = array(
          'post_type' => 'admissions',
          'meta_query' => array(
            'relation' => 'AND', // Combining multiple meta queries
            array(
                'key' => 'custom_roll_number',
                'value' => $rollNumber,
                'compare' => '='
            ),
            array(
                'relation' => 'AND', // Combining multiple conditions within this OR meta query
                array(
                    'key' => 'Stuent_result_register',
                    'value' => '',
                    'compare' => '!=' // Check if the value is not empty
                ),
                array(
                    'key' => 'certificate_issue_register',
                    'value' => '',
                    'compare' => '!=' // Check if the value is not empty
                ),
            )
        )
        
        );
      
        $query = new WP_Query($args);
      
        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            ?>
              <div class="main-body">

              <?php require_once(get_template_directory(). '/publicCertificate.php'); ?>
                <form method="post" enctype="multipart/form-data" id="pdfForm">
                    <div class="form-group">
                        <input type="hidden" type="text" id="contentText" name="RollNumber" rows="4" value="<?php $custom_roll_number = get_post_meta(get_the_ID(), 'custom_roll_number', true); echo $custom_roll_number; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="RegistrationNumber" rows="4" value="<?php $custom_serial_number = get_post_meta(get_the_ID(), 'custom_serial_number', true); echo $custom_serial_number; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="SerialNumber" rows="4" value="<?php $student_certificate_serial_number = get_post_meta(get_the_ID(), 'student_certificate_serial_number', true); echo $student_certificate_serial_number; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="IssueDate" rows="4" value="<?php $certificate_issue_register = get_post_meta(get_the_ID(), 'certificate_issue_register', true); echo $certificate_issue_register; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="CertificateHolderName" rows="4" value="<?php $student_name = get_post_meta(get_the_ID(), 'student_Name_register', true); echo $student_name; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="FathersName" rows="4" value="<?php $student_Fathers_name_register = get_post_meta(get_the_ID(), 'student_Fathers_name_register', true); echo $student_Fathers_name_register; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="MothersName" rows="4" value="<?php $student_mothers_name_register = get_post_meta(get_the_ID(), 'student_mothers_name_register', true); echo $student_mothers_name_register; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="CourseName" rows="4" value="<?php $student_select_course_register = get_post_meta(get_the_ID(), 'student_select_course_register', true); echo $student_select_course_register; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="Institutename" rows="4" value="Shia Computer traning Center"></input>
                        <input type="hidden" type="text" id="contentText" name="heldForm" rows="4" value="<?php $student_seassion_start_register = get_post_meta(get_the_ID(), 'student_seassion_start_register', true); echo $student_seassion_start_register; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="HeldformTo" rows="4" value="<?php $student_seassion_End_register = get_post_meta(get_the_ID(), 'student_seassion_End_register', true); echo $student_seassion_End_register; ?>"></input>
                        <input type="hidden" type="text" id="contentText" name="Grade" rows="4" value="<?php $Stuent_result_register = get_post_meta(get_the_ID(), 'Stuent_result_register', true); echo $Stuent_result_register; ?>"></input>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-primary btn-sm" name="pub_generate_pdf" value="Download Certificate">
                    </div>
                </form>



                <div class="row gutters-sm">
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                        <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());?>
                          <img src="<?php echo $thumbnail_url ?>" alt="Admin" class="rounded-circle" width="150">
                          <div class="mt-3">
                            <h4><?php the_title(); ?></h4>
                            <p class="text-muted font-size-sm">Roll Number: <?php echo get_post_meta(get_the_ID(), 'custom_roll_number', true); ?></p> 
                            <p class="text-muted font-size-sm">Registration Number: <?php echo get_post_meta(get_the_ID(), 'custom_serial_number', true); ?></p> 
                          </div>
                        </div>
                      </div>
                    </div>  
                  </div>
                  <div class="col-md-8">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <?php echo get_post_meta(get_the_ID(), 'student_Name_register', true); ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Roll Number</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                          <?php echo get_post_meta(get_the_ID(), 'custom_roll_number', true); ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Registration Number</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                          <?php echo get_post_meta(get_the_ID(), 'custom_serial_number', true); ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Grade Point</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <?php echo get_post_meta(get_the_ID(), 'Stuent_result_register', true); ?>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Center name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            Shia Computer Traning Center
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <style>
                  @font-face {
                      font-family: 'E111agio';
                      src: url('https://app.shiacomputer.com/wp-content/themes/shiav2/customfonts/eia111/e111psto.ttf');
                  }

                  .certificate-wrapper {
                      background: #fff;
                      margin: 20px auto;
                      position: relative;
                      text-align: center;
                      width: 1000px;
                      /* Set a fixed width for the wrapper */
                      height: 700px;
                      /* Set a fixed height for the wrapper */
                  }

                  .certificate-image {
                      width: 100%;
                      height: auto;
                  }

                  .text {
                      position: absolute;
                      font-weight: bold;
                  }

                  .roll-no {
                      top: 177px;
                      left: 862px;
                      font-size: 13px;
                  }

                  .reg-no {
                      top: 204px;
                      left: 864px;
                      font-size: 13px;
                  }

                  .publish-date {
                      top: 211px;
                      left: 377px;
                      font-size: 13px;
                  }

                  .name1 {
                      top: 299px;
                      left: 494px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .name2 {
                      top: 340px;
                      left: 450px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .name3 {
                      top: 375px;
                      left: 451px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .course {
                      top: 413px;
                      left: 572px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .institute {
                      top: 449px;
                      left: 448px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .institute-id {
                      top: 185px;
                      left: 368px;
                      font-size: 13px;
                  }

                  .start-date {
                      top: 486px;
                      left: 385px;
                      font-size: 13px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .end-date {
                      top: 487px;
                      left: 567px;
                      font-size: 13px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .grade {
                      top: 486px;
                      left: 869px;
                      font-family: "E111agio";
                      font-size: 23px;
                      color: #53555c;
                  }

                  .logo {
                      top: 578px;
                      left: 290px;
                      font-family: arial;
                      font-weight: bold;
                      font-size: 13px;
                      height: 75px;
                      width: 100px;
                  }
                  .qr-code {
                      position: absolute;
                      bottom: 44px;
                      right: 316px;
                      transform: translate(0, 0); /* Reset the translation on larger screens */
                  }

                  @media screen and (max-width: 768px) {
                      .qr-code {
                          position: absolute;
                          bottom: 44px;
                      right: 316px;
                          transform: translate(0, 0); /* Reset the translation on smaller screens */
                      }
                  }

              </style>

                

              <div class="certificate-wrapper" style="background: #fff;margin: 20px auto;position: relative;text-align: center;">
                <img src="https://app.shiacomputer.com/wp-content/uploads/2023/07/Certificatggge-shia-scaled.jpg" alt="pic" class="certificate-image">
                  
                <p class="text roll-no"><?php echo get_post_meta(get_the_ID(), 'custom_roll_number', true);?></p>
                <p class="text reg-no"><?php echo get_post_meta(get_the_ID(), 'custom_serial_number', true);?></p>
                <p class="text publish-date"><?php echo get_post_meta(get_the_ID(), 'certificate_issue_register', true);?></p>
                <p class="text name1"><?php echo get_post_meta(get_the_ID(), 'student_Name_register', true);?></p>
                <p class="text name2"><?php echo get_post_meta(get_the_ID(), 'student_Fathers_name_register', true);?></p>
                <p class="text name3"><?php echo get_post_meta(get_the_ID(), 'student_mothers_name_register', true);?></p>
                <p class="text course"><?php echo get_post_meta(get_the_ID(), 'student_select_course_register', true);?></p>
                <p class="text institute">Shia Computer Training Center</p>
                <p class="text institute-id"><?php echo get_post_meta(get_the_ID(), 'student_certificate_serial_number', true);?></p>
                <p class="text start-date" ><?php echo get_post_meta(get_the_ID(), 'student_seassion_start_register', true);?></p>
                <p class="text end-date" ><?php echo get_post_meta(get_the_ID(), 'student_seassion_End_register', true);?></p>
                <p class="text grade"><?php echo get_post_meta(get_the_ID(), 'Stuent_result_register', true);?></p>
                <?php
                    $custom_roll_number = get_post_meta(get_the_ID(), 'custom_roll_number', true);
                    $qrCodeURL = 'https://app.shiacomputer.com/result-search/?rollNumber=' . $custom_roll_number;
                    $qrCodeImage = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($qrCodeURL);
                    ?>
                    <img src="<?php echo $qrCodeImage; ?>" alt="QR Code" class="certificateImg qr-code" width="96">
                
              </div>

              <script>
                // Get the initial content of the <h1> element
                var initialDate = document.getElementById('date-heading').textContent;

                // Extract the individual date components
                var parts = initialDate.split('-');
                var year = parts[0];
                var month = parts[1];
                var day = parts[2];

                // Reformat the date as DD-MM-YYYY
                var formattedDate = day + '-' + month + '-' + year;

                // Set the formatted date as the new content of the <h1> element
                document.getElementById('date-heading').textContent = formattedDate;

              </script>
                

            <?php
          }
        } else {
         ?>
         
          <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Sorry</h4>
            <p>We understand you're looking for specific results. Please note that the results you're seeking have not been published or approved as of yet. We appreciate your patience and assure you that as soon as they are available, we will make them accessible to you.

Should you encounter any difficulties in your search or have any inquiries, please do not hesitate to reach out to us. Our dedicated support team is here to assist you.</p>
            <hr>
            <p class="mb-0">Thank you for your understanding.</p>
          </div>
         
         <?php
        }
      
        wp_reset_postdata();
        } else {
            echo '<p>No results found.</p>';
        }
    ?>

  </div>

    

<?php
get_footer();