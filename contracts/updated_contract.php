<?php
include_once 'partials/header.php';
// include_once 'partials/content_start.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$contract = contract($id);
$created = strtotime($contract['created_at']);
$log->info('contract:', $contract);

?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<img src="assets/kizusi-contract-top.png" alt="">
		</div>
	</div>
	<div class="row">
		<div class="col">


			<p><b>CUSTOMER NAME / HIRER:</b> <?php show_value($contract, 'c_fname');?> <?php show_value($contract, 'c_lname');?></p>
			<p><b>MOBILE NUMBER:</b> <?php show_value($contract, 'c_phone_no');?></p>
			<p><b>ADDRESS:</b> <?php show_value($contract, 'residential_address');?></p>
			<p><b>ID TYPE:</b><?php show_value($contract, 'c_id_type');?></p>
			<p><b>ID NO / PASSPORT:</b><?php show_value($contract, 'c_id_no');?></p>
			<p><b>DL NO:</b><?php show_value($contract, 'c_dl_no');?></p>
			<p><b>PHYSICAL ADRESS::</b></p>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<b><u>IDENTIFICATION OF THE RENTAL CAR</u></b>
	</div>
	<div class="row">
		<div class="col">
			<p><b>CAR MAKE:</b><?php show_value($contract, 'make');?> <?php show_value($contract, 'model');?></p>
			<p><b>PASSENGERS:</b></p>
			<p><b>REGISTRATION:</b><?php show_value($contract, 'number_plate');?></p>
			<p><b>CONDITION:</b></p>
			<p><b>START DATE:</b><?php show_value($contract, 'start_date');?></p>
			<p><b>END DATE:</b><?php show_value($contract, 'end_date');?></p>
			<p><b>START TIME:</b><?php show_value($contract, 'start_time');?></p>
			<p><b>END TIME:</b><?php show_value($contract, 'end_time');?></p>
			</div>
	</div>
	<div class="row">
		<p>
			 I FULLY UNDERSTAND THAT BY PAYMENT OF DAILY MAXIMUM LIABILITY TO THE COMPANY IS LIMITED UPTO KSHS...<?php show_numeric_value($contract, 'vehicle_excess');?>.... FOR
COLLISION AND KSHS...<?php show_numeric_value($contract, 'vehicle_excess');?>... (FOR THEFT) BEING THE EXCESS PREMIUM ON EACH AND EVERY CLAIM PAYABLE TO THE INSURANCE
COMPANY NOT WITHSTANDING PAYMENT OF THE AFOREMENTIONED RATE, I SHALL BE WHOLLY RESPONSIBLE FOR ANY DAMAGE(S)
OCCASIONED TO THE VEHICLE IF USED, OPERATED OR DRIVEN IN VIOLATION OR BREACH OF THE TERMS & CONDITIONS OF
THIS CONTRACT.
		</p>
	</div>
	<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>DATE</b></td>
					<td class="contract-td"><b>HIRER SIGNATURE</b></td>
				</tr>
				<tr>
					<td class="contract-td"><b><?php echo date("l jS \of F Y", $created); ?></b></td>
					<td class="contract-td"><img src="contracts/signatures/<?php echo $contract['signature']; ?>" alt="Signature" class="signature-img"></td>
				</tr>
			</table>
	<div class="row">
		<p>
			I FULLY UNDERSTAND THAT I AM THE AUTHORISED PERSON TO DRIVE THIS VEHICLE UNLESS OTHER DRIVERS ARE SPECIFIED ABOVE IN
THE AGREEMENT. THE VEHICLE IS HIRED FOR THE SPECIFIED PERIOD STATED IN THE AGREEMENT IF EXCEEDED THE VEHICLE WILL BE
CONSIDERED STOLEN AND THE MATTER WILL BE REPORTED TO THE POLICE WITHOUT YOUR CONCERN AS UNLAWFUL USE OF MOTOR
VEHICLE WHICH IS AN OFFENCE.
		</p>
	</div>
	<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>DATE</b></td>
					<td class="contract-td"><b>HIRER SIGNATURE</b></td>
				</tr>
				<tr>
					<td class="contract-td"><b><?php echo date("l jS \of F Y", $created); ?></b></td>
					<td class="contract-td"><img src="contracts/signatures/<?php echo $contract['signature']; ?>" alt="Signature" class="signature-img"></td>
				</tr>
			</table>
	</div>

	<div class="row">
		<p>
			Kisuzi Smartex Limited(the company)" hereby agree to let on hire the person named overleaf"(and the hirer) and the hirer hereby agrees to take
and hire themotor vehicle described overleaf together with a spare tyre, jack, wheel spanner, toolkitand accessories carried with it or xed or tted
the vehicle hereinafter called the (the vehicle) upon terms and conditions set cut overleaf and hereunder
		</p>
		<p>
			2. The period of hire shalt be as set out on the RENTAL CAR AGREEMENT and the vehicle must be returnedto the company on the date set out on the
RENTAL CAR AGREEMENT unless the period of the hire is extendedThe vehicle shall be returned to the company's premises. Extra Change ought to be
required for each extra hour that the car hirer takes.For a Saloon Car it will be Ksh 500/= for a four wheel car Ksh 500/= per hour.

		</p>
		<p>
			3. In accepting the vehicle the hirer shall be deemed to have sane himself that thevehicle is road worthy and in proper and safe condition working
order led the companyshalt not be liable to make any payment to the hirer in any way whatsoever for anyloss injury or damage sustained by the hirer
or any other party as a result of anydefect in the vehicle or any break down.
		</p>
		<p>
			4. The Hirer further agrees that
		</p>
		<p>
			a. He/She will not drive are to ensure that any authorized driver will not whilst he/she is under the inuence of alcohol, hallucinations drugs,
narcotics, barbiturates and any other substances impaling thedriver's conscienceness of ability to control the vehicle.The vehicle will be driven in a
skillfull manner and all trafc rules and Lawsand the provision of the Highway code shall at all time be observed and complied with.The vehicle
shall(a)not be overloaded or (b) carry more than its passengers capacityspecied on the PSV License on the windscreen

		</p>
		<p>
			b. The vehicle will be kept locked and secured when parked and every precautionwill be taken to avoid theft of it or any item in it and damages to it.
		</p>
		<p>
			c. The vehicle shall be used for social and pleasure purposes and only on all weather roads.The vehicle shall at no time be used for racing or pace
making or any nor for damage of goods for carriage charges or for carrying fare paying passengers.
		</p>
		<p>
			d. The vehicle shall not be taken out of Kenya unles authorized by the company or management
		</p>
		<p>
			e. The hirer shall promptly, and teresly pay parking and trafc nes and if he fails to do so , he shall be responsible to pay the company additional
Ksh 500/= plus each ne not paid and toindemnify the company of any less or damage it may suffer as a result of the hirer's butt.
		</p>
		<p>
			f. The hirer shall at alltimes check the oil and water levels and tyrepressure and in the event he fails to do so , he shall be responsible to reimburse
to and to indemnify the company of any loss, damage or expenses that it may suffer.Temparature gauge & engine warning lights must be respected
and and adhered to.
		</p>
		<p>
			g. Unless authorrized by the company in writing the hirer under in, any circumstances should not modify, t any extra accessories or repair the
vehicle. The company shall not be liable for any defects or damages in the vehicle.
		</p>
		<p>
			h. Notwithstanding anything herein contained ease of breakdown or an accident or damages to the vehicle asa result of willful act or gross neglect of
the hirer or the authorized driver, the Hirer shall pay the company the total cost of towing the vehicle to the company's premise and full cost of
repairing the vehicle .
		</p>
		<p>
			i. The hirer shall be responsible to pay for repair or puncture , replacing but tyres stolen or lost spare tyres , damaged or broken windscreen or
glasses, damaged rims, tools (including jack & handle), tape recorder radio, as CDI does not over these items.
		</p>
		<p>
			j. Incase of an accident(involving the vehicle), the hirer or the authorized drivershall report to the police and to the company immediately no matter
how minimal the accident is and shall supply to the company the police ofcer's name , number and the details of the police station.In no
circumstances shall liability be admitted . The hirer shall at the earliest opportunity and in any case not less than 48hrs alter the occurrence , of the
accident give a full statement in writingof how the accident occurred and ll in and sign the claim form and also provide anabstract of form duly
completed. If and when required the hirer shall make available thedriver to give any statements as may be required by the company.
		</p>
		<p>
			k. If any anti-theft devices installed in the vehicle is not utilized by the hirer , and the vehicle is stolen , the CDI will be void the hirer will be called
upon to pay the cost of the vehicle.
		</p>
		<p>
			l. In case of an accident the towing charges are bound to be paid by theHirer to company garage.
		</p>
	</div>
	<div class="row">
		<p>
			<b>5.</b>
		</p>
		<p>
			a. The insurance policy covering the has been made available to the hirer as he/she hereby acknowledges and the authorized driver shall at all times
		</p>
		<p>
			b. The vehicle is insured for Third Party Act only i.e only the liability to compensate a third party(not the driver or the passengers) when injured.It
does not include damage to the vehicle or loss by re or theft the vehicle or any material damages to any other vehicle or property the driver and the
passengers. In case of a third party injury claim , the hirer shall be responsiblethe Excess Premium 10% as stated by the company depending on the
vehicle hired.
		</p>
		<p>
			c. If the driver takes out the Coalition Damage Waiver,He/She shall be liable to pay the amount indicated for coalition damage caused to the vehicle,
damage to the vehicle by re or theft of the vehicle.
		</p>
		<p>
			d. The vehicle whether or not CDI option is exercised does not cover
		</p>
		<p>
			e. Incase of an accident or any other unprecedented occurrence that will involve the insurance , the hirer is liable to pay the total value of the car.
		</p>
	</div>
	<div class="row">
		<p><b>IMPORTANT</b></p>
		<p>(I). The hirer is bound to use the vehicle at specied place as per the contract</p>
		<p>
			(ii). In the event of a minor accident involving the client being at fault, he/she is liable to cover the cost of damage and the daily rate charges as
agreed on the contractuntil the vehicle is back and running to the compny's specications.
		</p>
		<p>
			(iii). The hirer must report to the company any inident(s) that occur while the vehicle as the company will not accept any repairs with prior
notication.
		</p>
		<p>
			(iv). The insurance cover aforesaid is available if the terms and condtions of the ; Insurance policyare complete with failure to which the hirer or the
authorized driver shall be fully responsible for damages and the cost of repair and will indemnify the ompany in respect of any loss of damagesto the
vehicle or any other claims and expenses whatsoever.
		</p>
		<p><b>PAYMENT TERMS</b></p>
		<p>
			(6). All accounts must b settled when the car is hired out in full, for the period specied for hire.And in case of an extended period the hirer is to pay
the company the total amount upon return of thevehicle. Failure to comply with this will result to added 10% charge every week for the amount
accrued for hiring
		</p>
		<p>
			(7). Besides deposit, full identication. Physical address and passport colored photo or full image ofthe hirer must be given and where required by
the company an acceptable guarantee shall be given.
		</p>
		<p>
			(8). I hereby agree to the terms and conditions of this contract and do commit to abide by them and accept fullresponsibility for the vehicle for the
entire duration of the hire.
		</p>
	</div>
</div>