<!DOCTYPE html>
<html>
  <head>
    <title>Send Email</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-8" style="margin:0 auto; float:none;">
          <h3 align="center">Send Email</h3>
          <br />
          <?php

          if($this->session->flashdata("message"))
          {
            echo "
            <div class='alert alert-success'>
              ".$this->session->flashdata("message")."
            </div>
            ";
          }
          ?>
          <h4 align="center">Programmer Register Here</h4>
          <br />          
          <form method="post" action="<?php echo base_url(); ?>sendemail/send" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Enter Name</label>
                  <input type="text" name="name" placeholder="Enter Name" class="form-control" required />
                </div>
                <div class="form-group">
                  <label>Enter Address</label>
                  <textarea name="address" placeholder="Enter Address" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                  <label>Enter Email Address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required />
                </div>
                <div class="form-group">
                  <label>Select Programming Language</label>
                  <select name="programming_languages[]" class="form-control" multiple required style="height:150px;">
                    <option value=".NET">.NET</option>
                    <option value="Android">Android</option>
                    <option value="ASP">ASP</option>
                    <option value="Blackberry">Blackberry</option>
                    <option value="C">C</option>
                    <option value="C++">C++</option>
                    <option value="COCOA">COCOA</option>
                    <option value="CSS">CSS</option>
                    <option value="DHTML">DHTML</option>
                    <option value="Drupal">Drupal</option>
                    <option value="Flash">Flash</option>
                    <option value="HTML">HTML</option>
                    <option value="HTML 5">HTML 5</option>
                    <option value="IPAD">IPAD</option>
                    <option value="IPHONE">IPHONE</option>
                    <option value="Java">Java</option>
                    <option value="Java Script">Java Script</option>
                    <option value="Joomla">Joomla</option>
                    <option value="LAMP">LAMP</option>
                    <option value="Linux">Linux</option>
                    <option value="MAC OS">MAC OS</option>
                    <option value="Magento">Magento</option>
                    <option value="MySQL">MySQL</option>
                    <option value="Oracle">Oracle</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Perl">Perl</option>
                    <option value="PHP">PHP</option>
                    <option value="Ruby on Rails">Ruby on Rails</option>
                    <option value="Salesforce.com">Salesforce.com</option>
                    <option value="SEO">SEO</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Select Year of Experience</label>
                  <select name="experience" class="form-control" required>
                    <option value="">Select Experience</option>
                    <option value="0-1 years">0-1 years</option>
                    <option value="2-3 years">2-3 years</option>
                    <option value="4-5 years">4-5 years</option>
                    <option value="6-7 years">6-7 years</option>
                    <option value="8-9 years">8-9 years</option>
                    <option value="10 or more years">10 or more years</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Enter Mobile Number</label>
                  <input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control" pattern="\d*" required />
                </div>
                <div class="form-group">
                  <label>Select Your Resume</label>
                  <input type="file" name="resume" accept=".doc,.docx, .pdf" required />
                </div>
                <div class="form-group">
                  <label>Enter Additional Information</label>
                  <textarea name="additional_information" placeholder="Enter Additional Information" class="form-control" required rows="8"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group" align="center">
              <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>