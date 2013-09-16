<html>
<head>
</head>
<body>
<?php

		$system = $_POST['system'];
		$numsystem = count($system);
		
		
		//$sys = 'sys'.$i;
		//$$sys = $system[0][0];
		//echo $$sys;
		
		
		$text_serviceid = $_SESSION['serviceid'];
		

	//assign text variables from POST
		$text_dor = $_POST['dor'];
		$text_dos = $_POST['dos'];
		$text_cname = $_POST['cname'];
		$text_address = $_POST['address'];
		$text_city = $_POST['city'];
		$text_phone = $_POST['phone'];
		$text_reason = $_POST['reason'];
		$text_technician = $_POST['techncian'];
		$text_stime = $_POST['stime'];
		$text_atime = $_POST['atime'];
		$text_ctime = $_POST['ctime'];
		$text_ttime = $_POST['ttime'];
		$text_description = $_POST['description'];
		$text_recommendations = $_POST['recommendations'];
		$text_environmental = $_POST['environmental'];
		$text_pma = $_POST['pma'];
		$text_overtime = $_POST['overtime'];
		$text_r_recovered = $_POST['r_recovered'];
		$text_r_installed = $_POST['r_installed'];

	//create new DOMDocument
		$dom = new DOMDocument("1.0");
	
	//create header header("Content-Type:text/plain");
		
	
	//create root element
		$root = $dom->createElement("serviceticket");
		$dom->appendChild($root);
	
	
	//create child element
		$dor = $dom->createElement('dor');
		$root->appendChild($dor);
		
			$_dor = $dom->createTextNode($text_dor);
			$dor->appendChild($_dor);
			

		$dos = $dom->createElement('dos');
		$root->appendChild($dos);
			
			$_dos = $dom->createTextNode($text_dos);
			$dos->appendChild($_dos);

		$cname = $dom->createElement('cname');
		$root->appendChild($cname);
			
			$_cname = $dom->createTextNode($text_cname);
			$cname->appendChild($_cname);

		$address = $dom->createElement('address');
		$root->appendChild($address);
		
			$_address = $dom->createTextNode($text_address);
			$address->appendChild($_address);
		

		$city = $dom->createElement('city');
		$root->appendChild($city);
		
			$_city = $dom->createTextNode($text_city);
			$city->appendChild($_city);
		

		$phone = $dom->createElement('phone');
		$root->appendChild($phone);
		
			$_phone = $dom->createTextNode($text_phone);
			$phone->appendChild($_phone);
		

		$reason = $dom->createElement('reason');
		$root->appendChild($reason);
		
			$_reason = $dom->createTextNode($text_reason);
			$reason->appendChild($_reason);

		$technician = $dom->createElement('technician');
		$root->appendChild($technician);
		
			$_technician = $dom->createTextNode($text_technician);
			$technician->appendChild($_technician);
		

		$stime = $dom->createElement('stime');
		$root->appendChild($stime);
		
			$_stime = $dom->createTextNode($text_stime);
			$stime->appendChild($_stime);
		

		$atime = $dom->createElement('atime');
		$root->appendChild($atime);
		
			$_atime = $dom->createTextNode($text_atime);
			$atime->appendChild($_atime);
		

		$ctime = $dom->createElement('ctime');
		$root->appendChild($ctime);
		
			$_ctime = $dom->createTextNode($text_ctime);
			$ctime->appendChild($_ctime);
		
		$ttime = $dom->createElement('ttime');
		$root->appendChild($ttime);
		
			$_ttime = $dom->createTextNode($text_ttime);
			$ttime->appendChild($_ttime);
		
		
		$serviceid = $dom->createElement('serviceid');
		$root->appendChild($serviceid);
		
			$_serviceid = $dom->createTextNode($text_serviceid);
			$serviceid->appendChild($_serviceid);
		
		
		$description = $dom->createElement('description');
		$root->appendChild($description);
		
			$_description = $dom->createTextNode($text_description);
			$description->appendChild($_description);
		
		
		$recommendations = $dom->createElement('recommendations');
		$root->appendChild($recommendations);
		
			$_recommendations = $dom->createTextNode($text_recommendations);
			$recommendations->appendChild($_recommendations);
		
		
		$environmental = $dom->createElement('environmental');
		$root->appendChild($environmental);
		
			$r_recovered = $dom->createElement('r_recovered');
			$environmental->appendChild($r_recovered);
				$_r_recovered = $dom->createTextNode($text_r_recovered);
				$r_recovered->appendChild($_r_recovered);
			
			$r_installed = $dom->createElement('r_installed');
			$environmental->appendChild($r_installed);
				$_r_installed = $dom->createTextNode($text_r_installed);
				$r_installed->appendChild($_r_installed);
		
		
		$pma = $dom->createElement('pma');
		$root->appendChild($pma);
		
			$_pma = $dom->createTextNode($text_pma);
			$pma->appendChild($_pma);
		
		
		$overtime = $dom->createElement('overtime');
		$root->appendChild($overtime);
		
			$_overtime = $dom->createTextNode($text_overtime);
			$overtime->appendChild($_overtime);
	
	

	/*
		foreach ($productarray as $pa) {
		
			$products = $dom->createElement('products');
			$root->appendChild($products);	
			
				$qty = $dom->createElement('qty');
				$products->appendChild($qty);
				
					$text_qty = $dom->createTextNode($pa[$i][0]);
					$qty->appendChild($text_qty);
				
				$descrip = $dom->createElement('descrip');
				$products->appendChild($descrip);
				
					$text_descrip = $dom->createTextNode($pa[$i][1]);
					$descrip->appendChild($text_descrip);
				
				$price = $dom->createElement('price');
				$products->appendChild($price);
				
					$text_price = $dom->createTextNode($pa[$i][2]);
					$price->appendChild($text_descrip);
					
					
				$total = $dom->createElement('total');
				$products->appendChild($total);
				
					$text_total = $dom->createTextNode($pa[$i][3]);
					$total->appendChild($text_total);
		}
	
	
		*/	
	foreach ($system as $sys) {
		
			
		$newsys = $dom->createElement('system');
		$root->appendChild($newsys);
			$_newsys = $dom->createTextNode($sys[0]);
			$newsys->appendChild($_newsys);
		
		
		
			$cooling = $dom->createElement('cooling');
			$newsys->appendChild($cooling);
		
		
				$ctype = $dom->createElement('ctype');
				$cooling->appendChild($ctype);
				
					$_ctype = $dom->createTextNode($sys[1]);
					$ctype->appendChild($_ctype);
				
					
				$cmake = $dom->createElement('cmake');
				$cooling->appendChild($cmake);
				
					$_cmake = $dom->createTextNode ($sys[2]);
					$cmake->appendChild($_cmake);
				
				$cmodel = $dom->createElement('cmodel');
				$cooling->appendChild($cmodel);
				
					$_cmodel = $dom->createTextNode ($sys[3]);
					$cmodel->appendChild($_cmodel);
				
				$cserial = $dom->createElement('cserial');
				$cooling->appendChild($cserial);
				
					$_cserial = $dom->createTextNode ($sys[4]);
					$cserial->appendChild($_cserial);
			
			$heating = $dom->createElement('heating');
			$newsys->appendChild($heating);
			
				$htype = $dom->createElement('htype');
				$heating->appendChild($htype);
				
					$_htype = $dom->createTextNode ($sys[5]);
					$htype->appendChild($_htype);
				
				$hmake = $dom->createElement('hmake');
				$heating->appendChild($hmake);
				
					$_hmake = $dom->createTextNode ($sys[6]);
					$hmake->appendChild($_hmake);
				
				$hmodel = $dom->createElement('hmodel');
				$heating->appendChild($hmodel);
				
					$_hmodel = $dom->createTextNode ($sys[7]);
					$hmodel->appendChild($_hmodel);
				
				$hserial = $dom->createElement('hserial');
				$heating->appendChild($hserial);
				
					$_hserial = $dom->createTextNode ($sys[8]);
					$hserial->appendChild($_hserial);
				
				$hstripheat = $dom->createElement('hstripheat');
				$heating->appendChild($hstripheat);
				
					$_hstripheat = $dom->createTextNode ($sys[9]);
					$hstripheat->appendChild($_hstripheat);
				
		
		}

	$payment = $dom->createElement('payment');
	$root->appendChild($payment);

	$dom->save('fuckers.xml'); 

?>

</body>
</html>