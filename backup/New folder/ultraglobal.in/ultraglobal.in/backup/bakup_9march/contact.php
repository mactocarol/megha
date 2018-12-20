<?php include 'header.php';?>
<?php
				
				if(isset($_REQUEST['contact']))
				{
				
				$Name=$_REQUEST['name'];
				$Email_Address=$_REQUEST['email'];
				$city=$_REQUEST['city'];
				$comment=$_REQUEST['comment'];
				$message="Name: ".$_REQUEST['name']."<br>Email: ".$_REQUEST['email']."<br>City: ".$_REQUEST['city']."<br>Message: ".$_REQUEST['comment'];
				 
			$to='prktechneha@gmail.com';
            $subject='Contact Us';
            $cleanedFrom="contact@mactosys.com";
            $headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: ". strip_tags($cleanedFrom) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				mail($to,$subject,$message,$headers);
				 ?>
				 <script>window.location="contact.php?msg=success";</script>
				 <?php }
				
				 ?>

     <div class="hadding fadeInLeft">
	 <?php if(isset($_REQUEST['msg'])) { ?>	
     <center><h1> Thank You For Contact Us </h1></center>   
	 <?php }?>
  		<h2 class="top-h2"> Ultra Global </h2>
		<p class="top-p">Contact Us</p>
 	</div><!---hadding close---> 
    
    
	<div class="wrapper">
    	<div class="inner">
			 <div class="enquiry fadeInRight">
            	<h3>Enquiry &amp; Feedback</h3>
            	<form id="change_form" method="post" action="contact.php">
                	<li>
            			<input type="text" class="con_text" name="name"  id="name" placeholder="Name"/>
                    	<input type="text" class="con_text" name="email" id="email" placeholder="Email"/>
                    	<input type="text" class="con_text" name="city" placeholder="City"/>
                    </li>
                    <textarea class="con_text1" name="comment" placeholder="Comment"></textarea>
                <input type="submit" class="con_submit"  name="contact"  value="Submit" />
            	</form>        
            </div><!--enquiry close-->
            
        	<div class="add fadeInLeft">
            	<h3>Do you have query? Tell Us</h3>
            	<li><strong>Address :</strong> MG Road, Indore</li>
                <li><strong>Mobile :</strong>  +91-98264-29171 </li>
                <li><strong>Customer Care :</strong> info@ultraglobal.in </li>
               
            </div><!--add close-->
            
            <div class="map fadeInDown">
            	<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://web.archive.org/web/20160315083910if_/https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Shagun+Arcade,+Indore,+Madhya+Pradesh&amp;aq=0&amp;oq=Shagun&amp;sll=22.7491575,75.8952528&amp;sspn=0.17828,0.338173&amp;ie=UTF8&amp;hq=TriFid+Research,&amp;hnear=Indore,+Madhya+Pradesh&amp;t=m&amp;ll=22.7491575,75.8952528&amp;spn=0.006295,0.030719&amp;output=embed"></iframe><br/><small><a href="https://web.archive.org/web/20160315083910/https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Shagun+Arcade,+Indore,+Madhya+Pradesh&amp;aq=0&amp;oq=Shagun&amp;sll=22.7491575,75.8952528&amp;sspn=0.17828,0.338173&amp;ie=UTF8&amp;hq=TriFid+Research,&amp;hnear=Indore,+Madhya+Pradesh&amp;t=m&amp;ll=22.7491575,75.8952528&amp;spn=0.006295,0.030719" style="color:#0000FF;text-align:left"></a></small>
            </div><!--map close-->
            

        </div><!--inner close-->
    </div><!--wrapper close--> 
<script>
 jQuery.validator.addMethod("numbers", function (value, element) {
    return this.optional(element) || /^(\d+|\d+,\d{1,2})$/.test(value);
}, "Only numbers allow");
  var jvalidate = $("#change_form").validate({
	  ignore: [],
                rules: {                                                                 
                        'name': {
                                required: true,
                                minlength: 3,
                                maxlength: 30
								//lettersonly: true
                         },
						 'email': {
                                required: true,
                                minlength: 6,
                                maxlength: 70,
								email: true
						 },
						 'comment': {
                                required: true,
                                minlength: 3,
                                maxlength: 100
								//lettersonly: true
                         },
						 'city': {
                                required: true,
                                minlength: 3,
                                maxlength: 100
								//lettersonly: true
                         }
                        },
						
 messages: {
           }
  					
                });    
</script>	
<?php include 'footer.php';?>