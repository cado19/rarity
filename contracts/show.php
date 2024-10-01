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
		<div class="row d-flex justify-content-between">
			<div class="logo"><img src="assets/kizusi-logo.jpg" class="logo-img" alt="Logo"></div>


			<div class="contact">
				<b>Address</b>: KIPRO CENTRE, WESTLANDS NAIROBI, KENYA <br>
				<b>Tel</b>: 2547262390101, 254716281045 254733390101 <br>
				<b>Email</b>: bookings@kizusismartex.co.ke <br>
				<b>Website</b>: https://www.kizusiismartex.com <br>
			</div>
		</div>

		<div class="row mt-3">
			<table class="table">
				<tr>
					<td class="contract-td"><em>CONTRACT No.</em></td>
					<td class="contract-td">4</td>
				</tr>
			</table>
		</div>

		<div class="row">
			<h3>HIRER DETAILS</h3>
			<table class="table">
				<tr>
					<th>HIRER'S NAME</th>
					<th>HIRER'S ID No.</th>
					<th>HIRER'S DL No</th>
					<th>HIRER'S PHONE No</th>
				</tr>
				<tr>
					<td class="contract-td"><?php echo $contract['c_fname']; ?> <?php echo $contract['c_lname']; ?></td>
					<td class="contract-td"><?php echo $contract['c_id_no']; ?></td>
					<td class="contract-td"></td>
					<td class="contract-td">254<?php echo $contract['c_phone_no']; ?></td>
				</tr>


			</table>
		</div>

		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>AREA OF USE</b><em>(Where the hirer intends to use the car)</em></td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
		</div>

		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>HIRER EMAIL</b></td>
					<td class="contract-td"><b>HIRER HOME ADDRESS</b></td>
				</tr>
				<tr>
					<td class="contract-td"><?php echo $contract['c_email']; ?></td>
					<td class="contract-td" colspan="2"><?php echo $contract['residential_address']; ?></td>
				</tr>
				<tr>
					<td class="contract-td"><b>HIRER OFFICE No</b></td>
					<td class="contract-td"><b>HIRER OFFICE ADDRESS</b></td>
				</tr>
				<tr>
					<td class="contract-td">NA</td>
					<td class="contract-td" colspan="2">NA</td>
				</tr>
			</table>
		</div>

		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td">Below are the authorized drivers for this rental. The rental company reserves the right to update the authorized driver until the end of the contract period</td>
				</tr>
			</table>
		</div>

		<div class="row">
			<table class="table">
				<tr>
					<th>DRIVER NAME</th>
					<th>DRIVER ID No.</th>
					<th>DRIVER DL No</th>
					<th>DRIVER PHONE No</th>
				</tr>
				<tr>
					<td class="contract-td"><?php echo $contract['first_name']; ?> <?php echo $contract['last_name']; ?></td>
					<td class="contract-td"><?php echo $contract['id_no']; ?></td>
					<td class="contract-td"></td>
					<td class="contract-td">254<?php echo $contract['phone_no']; ?></td>
				</tr>
			</table>
		</div>


		<div class="row">
			<h3>VEHICLE DETAILS AND PRICING</h3>
			<table class="table">
				<tr>
					<td class="contract-td">For all vehicles rented on behalf of an organisation, the organization listed below will the primary entity (Lessee) in contract with the rental company</td>
				</tr>
			</table>
		</div>
		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>CAR MAKE</b></td>
					<td class="contract-td"><b>CAR MODEL</b></td>
					<td class="contract-td"><b>CAR No</b></td>
				</tr>
				<tr>
					<td class="contract-td"><?php echo $contract['model']; ?></td>
					<td class="contract-td"><?php echo $contract['make']; ?></td>
					<td class="contract-td"><?php echo $contract['number_plate']; ?></td>
				</tr>
			</table>
		</div>
		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>CAR CHECKED IN AT (PICK UP)</b></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td class="contract-td"><b>CAR CHECKED OUT AT (DROP OFF)</b></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td class="contract-td"><em>Note: Return Dates listed here are eligible for extension upon hirer request and rental company consent</em></td>
				</tr>
			</table>
		</div>
		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>DATE OUT (CAR LEAVES)</b></td>
					<td class="contract-td"><b>TIME OUT (CAR LEAVES)</b></td>
					<td class="contract-td"><b>DATE IN (CAR RETURN)</b></td>
					<td class="contract-td"><b>TIME OUT (CAR RETURN)</b></td>
				</tr>
				<tr>
					<td class="contract-td"><?php echo $contract['start_date']; ?></td>
					<td class="contract-td">00:00 AM</td>
					<td class="contract-td"><?php echo $contract['end_date']; ?></td>
					<td class="contract-td">00:00 AM</td>
				</tr>
			</table>
		</div>

		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><em>Note: Prices listed are indicative as per initial dates set and may change based on extension or rental company details. More details in Article 3 and 4</em></td>
				</tr>
			</table>
		</div>
		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>PRICE PER DAY (KSH)</b></td>
					<td class="contract-td"><b>TOTAL PRICE DUE (KSH) <em>(INDICATIVE)</em></b></td>
					<td class="contract-td"><b>VEHICLE EXCESS (KSH)</b></td>
				</tr>
				<tr>
					<td class="contract-td">KSH <?php echo number_format($contract['daily_rate']); ?>/-</td>
					<td class="contract-td">KSH <?php echo number_format($contract['total']); ?>/-</td>
					<td class="contract-td">KSH <?php echo number_format($contract['vehicle_excess']); ?>/-</td>
				</tr>
			</table>
		</div>

			<div class="row">
				<h3>MANDATORY VEHICLE INSPECTION</h3>
				<table class="table">
					<tr>
						<td class="contract-td">
							Prior to signing this contract, the undersigned and a representative of the car hire company have conducted a mandatory inspection of the vehicle’s engine,
							interior, exterior and boot. The undersigned also confirms that the vehicle has no outstanding fines. The inspection will happen through either a checklist walkthrough, photo submissions or video submissions between the undersigned and the car hire company’s representative. All noted damages will be clearly indicated.
							I the undersigned am Hiring Car No. _<?php echo $contract['number_plate'] ?>__ in good condition and I am liable to pay any damage caused to this car up to KSH ____<?php echo number_format($contract['vehicle_excess']); ?>/-______________ and any fines accrued during use of the vehicle.
						</td>
					</tr>
				</table>
			</div>

		<div class="row">
			<h3>STATUTORY DECLARATION</h3>
			<table class="table">
				<tr>
					<td class="contract-td">
						I declare the Motor Vehicle will be used for legal purposes only. I am not under 23 years old nor over 70 years old. I do not suffer any physical infirmity, defective vision, or defective hearing which is likely to affect my driving ability.
					</td>
					<td class="contract-td">
						I FURTHER DECLARE to the best of my knowledge and belief that:
						a) the above answers and statements are true whether or not completed in my
							own hand
					</td>
				</tr>
			</table>
		</div>


		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>SIGNATURE SHOULD GO SOMEWHERE HERE BUT ON THE RIGHT SIDE</b></td>
					<td class="contract-td"><img src="contracts/signatures/<?php echo $contract['signature']; ?>" alt="Signature" class="signature-img"></td>
				</tr>
			</table>
		</div>

		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td">
						 have not been convicted during the last five years of any offense for careless or
						 reckless of dangerous driving.
						 I have held a driving license for at least two years and is current, valid, and free
						 from endorsement.
						 In connection with Motor Insurance no insurer at any time has: declined my
						 proposal; required in and increased premiums or imposed Special Conditions
						 refused to renew my policy or cancelled my policy.
					</td>
					<td class="contract-td">
						b) the motor vehicle will not be used for the carriage of passengers for hire or
						reward
						c) the motor vehicle will not be used to carry more than the number of
						passengers declared
						d) My driving license and ID or passport or Alien Certificate has been
						examined by the Car Hire operator
						e) The motor vehicle will only be driven by the persons who have completed a
						declaration form
						I undertake that this Declaration shall be the basis of the contract with the
						insurers and shall be deemed incorporated in the existing policy of insurance
						quoted.
					</td>
				</tr>
			</table>
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
			<table class="table">
				<tr>
					<td class="contract-td">
						 FULLY UNDERSTAND THAT I AM THE AUTHORIZED PERSON TO DRIVE THIS VEHICLE UNLESS OTHER DRIVERS ARE SPECIFIED ABOVE
						IN THE AGREEMENT. THE VEHCILE IS HIRED FOR THE STATED PERIOD AND AREA OF USE ABOVE AND IF EXCEEDED VEHICLE IS CONSIDERED STOLEN AND
						REPORTED TO THE POLICE AS UNLAWFUL USE OF MOTOR VEHICLE CAUSING OFFENSE
					</td>
				</tr>
			</table>
		</div>


		<div class="row">
			<table class="table">
				<tr>
					<td class="contract-td"><b>DATE</b></td>
					<td class="contract-td"><b>HIRER SIGNATURE</b></td>
					<td class="contract-td"><b>CAR HIRE COMPANY REPRESENTATIVE</b></td>
				</tr>
				<tr>
					<td class="contract-td"><b><?php echo date("l jS \of F Y", $created); ?></b></td>
					<td class="contract-td"><b><img src="contracts/signatures/<?php echo $contract['signature']; ?>" alt="Signature" class="signature-img"></b></td>
					<td class="contract-td"><b>SIMON KIBE</b></td>
				</tr>
			</table>
		</div>

		<div class="row">
			<h3 class="text-center">GENERAL CONDITIONS</h3>
			<table class="table">
				<tr>
					<td class="contract-td">
						<p>
							The Car Hire Company (Lessor) which is <u>KISUZI SMARTEX LIMITED</u> rents (or hires)
							to the Lessee or Hirer whose signature and vehicle settled appears prior to this page
							of this Rental Contract. The Lessee or Hirer accepts and agrees to observe the
							terms and conditions stated on both sides of this rental contract and on Otto’s
							website which can be viewed at https://www.otto.rentals/.
						</p>
						<p>
							<h5>Article 1: USE OF THE VEFHICLE</h5>
							On pain of being excluded from insurance coverage, the Lessee or Hirer agrees not
							to permit the vehicle to be driven by anyone other than himself or persons
							approved by the Car Hire Company. They undertake the vehicle will not be used:
							<ol>
								<li style="list-style: lower-alpha;">For the paid carriage of passengers and in races.</li>
								<li style="list-style: lower-alpha;">To push or tow any vehicle or any trailer.</li>
								<li style="list-style: lower-alpha;">By anyone under the influence of alcohol or drugs</li>
								<li style="list-style: lower-alpha;"> For illegal purposes or carriage of goods.</li>
								<li style="list-style: lower-alpha;">
									While overloading, for example, carrying more passengers than permitted by the
									registration papers.
								</li>
								<li style="list-style: lower-alpha;">
									 In addition, the vehicle may be driven only by persons designated below, subject
									to the lessor's prior authorization that such a person be at least 23 years old and less
									than 70 years old and has a regular driver's license for at least two years
								</li>
								<li style="list-style: lower-alpha;">
									The Lessee or Hirer undertakes to keep the said vehicle closed and locked when
									not in use, keeping in his possession the vehicle's papers, which shall in no case be
									left in the vehicle. The Lessee or Hirer further agrees to make use of the anti-theft
									device whenever leaving the car parked.
								</li>
								<li style="list-style: lower-alpha;">
									The Lessee or Hirer shall in no event assign, mortgage, or pledge this contract,
									the vehicle, its equipment, or to us or treat the same in any way detrimental to the
									lessor.
								</li>
							</ol>
							Any infraction of these undertakings empowers the lessor to demand the return of
							the vehicle forthwith.
						</p>

						<p>
							<h5>Article 2: CONDITION OF THE VEHICLE</h5>
							The Lessee or Hirer acknowledges that the received vehicle is in proper operating
							condition and clean. The five tires are in good condition without punctures.
							In the event of damage to any of them by any cause other than normal wear, the
							Lessee or Hirer agrees to replace the same forthwith or at his expense with a tire of
							the same dimension and in equivalent state of wear. The trip recorder and
							connector shall not be tampered with. If the recorder fails to operate for any reason,
							the Lessee or Hirer will have to pay the kilometric allowance calculated based on
							500 kilometers per day without prejudice or be prosecuted for fraudulent use.

						</p>
						<p>
							<h5>Article 3: PREPAYMENT EXTENSION</h5>
							The rental price and the rental repayment are determined by applicable rate lists
							The Lessee or Hirer and each article 1 above agree to participate as assumed in the
							benefit of the Motorcar insurance policy, a copy of which is available to the Lessee
							or Hirer at the Lessor's main business establishment. Such policy covers injury to
							the third parties according to the applicable regulations in the country in which the
							vehicle is registered.
							The Lessee or Hirer hereby approves the said policy and undertakes to observe the
							terms and conditions thereof. The Lessee or Hirer further agrees to take all
							necessary steps to protect the interests of the lessor or its insurance company in
							case of an accident during the term of this rental Contract and, in particular:
							<ol>
								<li style="list-style: lower-alpha;">
									To report to the Car Hire Company in 24 hours of any accident, theft, or fire,
									even partial. And concurrently to the police and bodily injury or theft.
								</li>
								<li style="list-style: lower-alpha;">
									To include in this report the circumstances, date, place, and time of the accident,
									the name of such owner's insurance company, and the number of the policy.
								</li>
								<li style="list-style: lower-alpha;">
									To attach to such report available police or bailiffs report.
								</li>
								<li style="list-style: lower-alpha;">
									In any event to discuss liability, deal or settle with parties relevant to the
									accident carried clothing or other articles not recovered.
								</li>
							</ol>
							The vehicle insured only for the rental period shown on the prior page. Therefore,
							unless an extension is agreed to, declines all responsibilities for an accident that the
							Lessee or Hirer may have caused and for which he alone shall be responsible.
							The Car Hire company declines all responsibilities for objects left in the vehicle
							during the rental period.
							The damage resulting from bad conditions during the use of the vehicle, for
							example, poor or uneven roads, will be borne by the Lessee or Hirer.
							The Car Hire Company declines responsibilities for injury to third parties or
							damage to the vehicle which the Lessee or Hirer may cause during the rental period
							if he has willfully supplied the Car Hire Company. with false information as to his
							identity, address, or validity of Driver's License. In that case, the Lessee or Hirer is
							not covered by the insurance policy.
							There may be provided for the benefit of the passengers, including the driver,
							individual insurance the limits of which are fixed in the insurance policy held by
							the Car Hire Company and stipulated in the applicable rate list
						</p>
					</td>
					<td class="contract-td">
						and payable in advance. Holders of credit cards approved by the Car Hire
						Company are eligible for extension of the rental within the special limits of the
						credit card presented. In any case, prepayment may not serve to extend the rental.
						If the Lessee or Hirer wishes to keep the vehicle for a period beyond the agreed
						original times, and in order to obviate disputes, he shall, after obtaining the Car
						Hire Company’s approval, pay at once the rental charge for the current period or
						will be liable to prosecution for misappropriation of the vehicle and breach of trust.
						The Lessee or Hirer must return the vehicle to the rental agent on the specified date
						in the rental agreement. Return of the vehicle by the Lessee or Hirer to the rental
						agent must be done at the designated location as one terminates the contract.

						<p>
							<h5>Article 4: PAYMENTS</h5>
							Anyone whose reference appears on the billing area on the prior page commits
							themselves to pay all the charges.

							<ol>
								<li style="list-style: lower-alpha;">
									A (Kilometric) charge calculated at the rates stipulated on the basis of the
									number of kilometers traveled by the said vehicle during the rental period. The
									number of kilometers traveled at the term of this rental Contract shall be that
									shown on the trip recorder installed in the said vehicle by the manufacturer.
								</li>
								<li style="list-style: lower-alpha;">
									The additional charge for interest, if any, or if said vehicle is left at a place other
									than stipulated, without Lessor's written consent, a kilometric allowance or lump
									sum stated in the applicable rate list.

								</li>
								<li style="list-style: lower-alpha;">
									The rental time charges, the special Accident Insurance premiums, and the
									reverse side of this contract
								</li>
								<li style="list-style: lower-alpha;">
									A sum limited to the applicable rate list for the repair of possible damages
									caused to the vehicle if the Lessee or Hirer did not agree to pay the charge due in
									case of reduction of the deductible. This acceptance is materialized by lessor's
									initials in the box provided for such purpose on the reverse side thereof.
								</li>
								<li style="list-style: lower-alpha;">
									 All direct and indirect taxes and assessments payable on the rental's premium
									 charges and allowance specified in paragraphs a, b, and c.
								</li>
								<li style="list-style: lower-alpha;">
									Upon demand for payments, the payments of the sum due pursuant to this
									contract by the Lessee or Hirer to the lessor shall be paid within 48 hours. Default
									to which, as well as the amount in principal and the recoverable costs, the Lessee
									or Hirer shall have to pay contractual interest of two percent (2%) per month.
								</li>
								<li style="list-style: lower-alpha;">
									 Any and all fines, charges, costs, and fees for any and all the infringements of
									traffic, parking, or other laws of which the vehicle, the Lessee or Hirer, or the
									Lessor's responsible during the term of this contract, except, however, for
									infringements resulting from the fault of the Lessor's part.
								</li>
								<li style="list-style: lower-alpha;">
									Payment shall be made via the Otto online car rental marketplace Platform or
									the Otto Rental Management Platform with offline payments declared
								</li>
								<li style="list-style: lower-alpha;"></li>
								<li style="list-style: lower-alpha;"></li>
							</ol>

						</p>

						<p>
							<h5>Article 5: INSURANCE</h5>
						</p>

						<p>
							<h5>Article 6: MAINTENANCE AND REPAIR</h5>
							Normal mechanical wear is for account of the Car Hire Company. If the vehicle
							should be laid up, the repairs may be made only with the written agreement and
							according to the instructions of the Car Hire Company and they must be covered
							by a receipted and itemized bill, which replaced defective parts must be presented.
						</p>

						<p>
							<h5>Article 7: PETROL AND OIL</h5>
							The petrol is for the Lessee or Hirer's account. The Lessee or Hirer must make a
							standing check of the oil and water levels, as well as the gearbox level. He must
							present the receipt of the bill to obtain reimbursement.
						</p>

						<p>
							<h5>Article 8: LIABILITY</h5>
							The Lessee or Hirer or approved drivers are criminally liable for infringements
							committed by them while driving the vehicle, as provided by the Highway code.
						</p>

						<p>
							<h5>Article 9: CONTRACT VALIDITY</h5>
							No amendments to the terms and conditions of this contract are valid unless
							reduced to writing and validated by the lessor
						</p>

						<p>
							<h5>Article 10: SETTLEMENT OF DISPUTES</h5>
							It is understood and agreed that any disputes or claims arising under this agreement
							shall be subjected to the sole jurisdiction of the Courts of Kenya
						</p>

						<p>
							<h5>ARTILCE 11: VEHCILE REPLACEMENT</h5>
							The Lessor (Car Hire Company) reserves the right to replace the car issued with a
							similar car
						</p>

						<p>
							<h5>Article 12: DATA SHARING</h5>
							It is You hereby consent to the collection and storage of your data for purposes of
							this agreement in accordance with the Data Protection Act. You further consent to
							your anonymized data being shared with Otto for purposes of aggregation to
							improve the Otto platform and services and other related purposes
						</p>
					</td>
				</tr>
			</table>
		</div>


