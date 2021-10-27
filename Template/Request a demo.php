<?php
/*
 Template Name: Request a demo Template
 */

get_header(); ?>
<script type="text/javascript">
	      function checkEmpty( str, tips ){
			  let s = str.trim();
			  if (s.length == 0) {
				  alert(tips);
				  return true;  
			  }
			  return false;
		    }
	
        function send2srv() {
				var firstName = document.getElementById("firstName").value;
				var lastName = document.getElementById("lastName").value;
				var company = document.getElementById("company").value;
				var jobTitle = document.getElementById("jobTitle").value;lastName
				var businessEmail = document.getElementById("businessEmail").value;
				var phoneNumber = document.getElementById("phoneNumber").value;
			    
			   
			   if (checkEmpty(firstName, 'First Name is empty') || 
				   checkEmpty(lastName,'Last Name is empty') ||
				    checkEmpty(company,'Company is empty') ||
				    checkEmpty(jobTitle,'Job title is empty') ||
				  checkEmpty(businessEmail,'Email is empty') ||
				   checkEmpty(phoneNumber,'Phone number is empty')
				  )
				{
				   return;
			   }
				var post_data = {
					"firstName" : firstName,
					"lastName" : lastName,
					"company" : company,
					"jobTitle" : jobTitle,
					"businessEmail" : businessEmail,
					"phoneNumber" : phoneNumber
				};

				$.ajax({
					type: "POST",
					url: "/send2srv",
					contentType: "application/x-www-form-urlencoded",
					data: post_data,
					dataType: "json",
					success: function (val) {
						alert(val.message);
						console.log('success');
						console.log(val);
						//var jsonobj = eval("(" + val + ")"); 
						//console.log(jsonobj);
					},
					error: function (val) {
						//var jsonobj = eval("(" + val + ")"); 
						alert(val.responseText);
						console.log('error');
						console.log(val);
						//console.log(jsonobj);
					}
				});	

        }
    </script>
<section style="width: 100%;">
			<div class="container">
					<div style="width: 100%;display: flex;justify-content: center;align-items: center;">
						<div style="width: 49%;padding-bottom: 50px;bottom-top:10px;display: flex;justify-content: space-between;flex-wrap: wrap;">
							<form style="width: 100%;padding-top: 100px;display: flex;justify-content: space-between;flex-wrap: wrap;"  action="http://wp.jaidenshannon.com/lucidum/send2srv" method="post">
								<div style="width: 48%;margin-bottom: 30px;">
									 <p>First Name*</p>
									<input style="width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="firstName" id="firstName" type="text">
								</div>
								<div style="width: 48%;margin-bottom: 30px;">
									 <p>Last Name*</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="lastName" id="lastName" type="text">
								</div>								
													
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Company *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="company" id="company" type="text">
								</div>
																
																
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Job Title *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="jobTitle" id="jobTitle" type="text">
								</div>								
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Business Email *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="businessEmail" id="businessEmail" type="text">
								</div>								
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Phone No *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="phoneNumber" id="phoneNumber" type="text">
								</div>								
								<div>
									<input style="width: 150px;height: 48px;
									background: #113F67;color: #FFFFFF;
									border-radius: 25px;" type="button" value="Request" onclick="send2srv();">
								</div>								
																
							</form>
							
						</div>
						
					</div>
					
			</div>
		</section>
    <section class="mini-banner">
        <div class="container">
            <div class="page-title">
                <h2><?php the_title(); ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url()); ?>">HOME</a><span class="farward-arrow">/</span></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
  <section class="security-section">
        <div class="container">
            <div class="flex">
                <div class="col-100">
                    <div class="security-text">
                        <h2><?php the_field('demo_heading'); ?></h2>
						<div class="cus-contact-info">
							<?php the_field('demo_content'); ?>
						</div>
                        
                    </div>
                </div>
<!--                 <div class="col-40">
                    <div class="security-image">
                        <img src="<?php the_field('demo_image'); ?>" alt="mac">
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <section class="requesting-demo" id="request-a-demo">
        <div class="flex">
            <div class="col-40">
                <div class="requesting-image" style="background-image: url(<?php the_field('demo_form_image'); ?>);">
                </div>
            </div>
            <div class="col-60">
                <div class="requesting-content">
                    <h2><?php the_field('demo_form_heading'); ?></h2>
                   <div class="requesting-form">
					        

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
