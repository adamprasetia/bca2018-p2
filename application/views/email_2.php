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
		
		<p>Here is the link for pre-registration: <a href="www.ConnecTechAsia.com/visitor-registration">www.ConnecTechAsia.com/visitor-registration</a></p>
		<p>You will need to click on the link, fill up the information on the form and hit the Submit button. A confirmation email will be sent to you shortly.</p>
		<p>Here is an overview of CommunicAsia2018 / NXTAsia2018 - </p>
		<ul>			
			<li>
				<p>Date: 26 – 28 June 2018 (Tue to Thur)</p>
				<p>Venue: Basement 2 to Level 5, Marina Bay Sands Singapore</p>
			</li>
			<li>The show is Asia’s largest info-communications technology event. The show will feature around 1,200 exhibitors from around 52 countries. Key trending technologies for this year will be on 5G / SDN Broadband & Infrastructure, FTTX / Fibre Communications, SatComm, Connect Everywhere, IoT / Smart Cities, Cloud / Big Data, CyberSecurity, AI and VR/ MR/ AR.</li>
			<li>Some Key exhibitors include <strong>ABS, Alticast, AsiaSat, CDNetworks,Cryptoguard, Eutelsat,Grandstream, Hughes, IDirect, Iridium Communications, Kore Wireless, Kratos, Narda, Newtec, PCCW, SES and more</strong>View full listing of exhibitors <a href="www.connectechasia.com/exhibition/list-of-exhibitors/">www.connectechasia.com/exhibition/list-of-exhibitors/</a></li>
		</ul>
		<p>Show Websites：<a href="www.CommunicAsia.com">www.CommunicAsia.com</a>, <a href="www.NXTAsiaExpo.com">www.NXTAsiaExpo.com</a></p>
		<p>If you have further queries, please email Ms Evelyn Tan at <a href="mailto:evelyn.tan@ubm.com">evelyn.tan@ubm.com</a>. </p>
		<p>Thanks and we look forward to seeing you at CommunicAsia / NXTAsia2018.</p>
		<p>Yours sincerely,</p>
		<p><?php echo (isset($telemarketer)?$telemarketer:"");?></p>
		<p>On behalf of CommunicAsia / NXTAsia2018</p>	
	</body>
</html>