<!DOCTYPE html>
<html lang="en">
	<head>
		<style type="text/css">
			body{
				background-color: #fff;
				margin: 10px;
				font: 13px/20px normal Helvetica, Arial, sans-serif;
			}
			a{
				color: #003399;
				background-color: transparent;
				font-weight: normal;
			}
		</style>		
	</head>
	<body>
		<p>Dear <?php echo (isset($fullname)?$fullname:"");?></p>
		
		<p>Thank you for your time on the phone with me a moment ago.</p>
		
		<p>As mentioned, we will like to invite you as as our <strong>VIP</strong> to CommunicAsia/NXTAsia2018, a part of ConnecTechAsia. The event will be held from 26 – 28 June at Marina Bay Sands, Singapore. </p>
		<p>CommunicAsia joins BroadcastAsia, and the new NXTAsia, to form ConnecTechAsia – the region’s answer to the converging worlds of Telecommunications, Broadcasting and Emerging Technologies. The refreshed CommunicAsia continues to be Asia’s most established and relevant event for industry professionals in the telecommunications sector. NXTAsiais the exciting platform that showcases the latest in digital enterprise solutions and technologies for industry professionals across sectors.</p>
		
		<p><strong>Register and print out your VIP pass at <a href="https://www.connectechasia.com/exhibit-attend/visitor-registration/">https://www.connectechasia.com/exhibit-attend/visitor-registration/</a></strong></p>
		<p><strong>Enter your VIP Code*:<?php echo isset($vip_code)?$vip_code:'' ?></strong></p>
		
		<p><strong>Your VIP pass will entitle you to* </strong></p>
		<ul>			
			<li>Access to the VIP lounge with complimentary food and beverages reception.</li>
			<li>Enjoy Super Saver rates to attend the ConnecTechAsia Summit. Please contact Ms Elaine Dang at elaine.dang@ubm.com and quote your VIP code to register for the Summit.   View summit programme at <a href="https://www.connectechasia.com/the-summit/summit-programme/">https://www.connectechasia.com/the-summit/summit-programme/</a>.</li>
			<li>Arrangement of <strong>1-to-1 meetings</strong> for you to meet up with C-level executives from your selected ConnecTechAsia2018 exhibitors. </li>
		</ul>
		<p>Check out the list of exhibitors at <a href="https://www.connectechasia.com/exhibition/list-of-exhibitors/">https://www.connectechasia.com/exhibition/list-of-exhibitors/</a> .</p>
		<p>Should you have further queries, please feel free to email Ms Evelyn Tan at <a href="mailto:evelyn.tan@ubm.com">evelyn.tan@ubm.com</a>. </p>
		
		<p>We look forward to welcome you to CommunicAsia / NXTAsia2018.</p>
		
		<p>Yours sincerely</p>
		<p><?php echo (isset($telemarketer)?$telemarketer:"");?></p>
		<p>On behalf of CommunicAsia / NXTAsia2018Organiser</p>
	</body>
</html>