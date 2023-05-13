<?php
	/*
  * Created by 	: Sudirman
  revised by     : kevin alnizar  jan 2020
  * Requested by	: PPA
  * Date			: 13th February 2019
  * Description  : Fitur untuk generate e-payslip.
	 */

	// get HRMS Connection
    include "assets/hrms_connection.php";

    // prma, prmb,prmc, prmd --> pengalihan
	function generateRandomString($length = 6) {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function getCurrentShowDate(){
    	$res = 25;

    	$sql = pg_query("SELECT * FROM program.show_slip_date()") or die($sql.pg_last_error());

    	$que = pg_fetch_array($sql);
    	if(!empty($que) && sizeof($que)!=0){
    		$res = $que['show_slip_date'];
    	}
    	return $res;
    }

///// FUNCTION DOWNLOAD PDF
	function generatePdf($emp_id, $attd_id, $nik){

		$sql = pg_query("WITH t AS (
	        SELECT DISTINCT p.attendance_record, p.payroll_center
	        FROM finance.payroll p
	        WHERE p.employee = ".$emp_id."
	        )
	        SELECT a.id, a.dt_start, a.dt_stop, t.payroll_center
	        FROM t
	        INNER JOIN tms.attendance_record a ON a.id = t.attendance_record
	        WHERE a.locked = true AND a.id = ".$attd_id."
	        ORDER BY a.id DESC") or die($sql.pg_last_error());

		$no_absen = pg_num_rows($sql);


		$_html = '<p style="text-align: center;">(data not found)</p>';
		if($no_absen>0) {


			// Periode Gaji
			$arr_month = ['January', 'February', 'March', 'April', 'May', 'June',
							'July', 'August', 'September', 'October', 'November', 'December'];

			$rs_sql	= pg_fetch_array($sql);
			$bulan = $arr_month[date('n', strtotime($rs_sql['dt_stop']))-1];
			$tahun = date('Y', strtotime($rs_sql['dt_stop']));
      $idpay = $rs_sql['payroll_center'];


			// // NIK, NAME, DEPT, JAB, GRADE, STATUS_KEL, INIT_DATE
			$sql4 = pg_query("
				SELECT * FROM program.employee_history_slip(CURRENT_DATE) WHERE _nik = '".$nik."'
			") or die($sql4.pg_last_error());
			$rs_sql4	= pg_fetch_array($sql4);

			/////////////////////////// MULAI HTML
				$_html = '<html>
							<head>
								<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
								<title>e-PaySlip</title>
								<link href="bootstrap/css/bootstrap-grid.css" rel="stylesheet" media="all">
								<link href="bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" media="all">
								<link href="bootstrap/css/bootstrap-grid.min.css.map" rel="stylesheet" media="all">
								<style type="text/css">
									span.cls_002{
										font-family:Arial Narrow,sans-serif;
										font-size:11px;
										color:rgb(0,0,0);
										font-weight:bold;
										font-style:normal;
										text-decoration: none
									}
									.column {
										font-family:Arial Narrow,sans-serif;
										font-size:11px;
										color:rgb(0,0,0);
										font-weight:bold;
										font-style:normal;
										text-decoration: none;
										float: left;
										width: 50%;
										padding-top: 170px;
										padding-left: 30px;
									}
									.roww {
										font-family:Arial Narrow,sans-serif;
										font-size:11px;
										color:rgb(0,0,0);
										font-weight:bold;
										font-style:normal;
										text-decoration: none;
									}
									.th-fix10 {
										width: 10px; min-width: 10px; max-width: 10px;
									}
									.th-fix15 {
										width: 15px; min-width: 15px; max-width: 15px;
									}
									.th-fix175 {
										width: 175px; min-width: 175px; max-width: 175px;
									}
									.th-fix25 {
										width: 25px; min-width: 25px; max-width: 25px;
									}
									.th-fix90 {
										width: 90px; min-width: 90px; max-width: 90px;
									}
									.th-fix195 {
										width: 195px; min-width: 195px; max-width: 195px;
									}
									.th-fix5 {
										width: 5px; min-width: 5px; max-width: 5px;
									}
									.th-fix45 {
										width: 45px; min-width: 45px; max-width: 45px;
									}
									.th-fix245 {
										width: 245px; min-width: 245px; max-width: 245px;
									}
									.page_break {
										page-break-before: always;
									}
								</style>
							</head>

							<body>';

			for ($jl=1; $jl <= 2 ; $jl++) {
				$jlh_lembaran = $jl; // 2 kalo ada rapel gaji dll

				// PENGHASILAN
				$sql2 = pg_query("SELECT set_config('payroll.self','1',true);
							SELECT * FROM finance.paycheck_query_payroll_income2(".$attd_id.", ".$emp_id.", ".
							$jlh_lembaran."::smallint, ".$idpay.");") or die($sql2.pg_last_error());

				$no1 = pg_num_rows($sql2);

				// POTONGAN
				$sql3 = pg_query("SELECT set_config('payroll.self','1',true);
								SELECT * FROM finance.paycheck_query_payroll_deduction(".$attd_id.", ".$emp_id.", ".
								$jlh_lembaran."::smallint, ".$idpay.");") or die($sql3.pg_last_error());
				$no2 = pg_num_rows($sql3);




				$total_penghasilan = 0;

				$total_potongan = 0;


			//////////////////////////////////////////////////////DATA KARYAWAN

				$_html.= '<div style="position:absolute;left:40%;margin-left:-288px;top:0px;width:210mm;height:148mm;border-style:outset;overflow:hidden">
				<div style="position:absolute;left:0px;top:0px"></div>



				<div style="position:absolute;left:40px;top:35px" class="cls_002">
					<span class="cls_002">PT CITRA TUBINDO Tbk</span>
				</div>

				<div style="position:absolute;left:190px;top:35px" class="cls_002">
					<span class="cls_002">Payslip for '.$bulan.' '.$tahun.'</span>
				</div>

				<div style="position:absolute;left:695px;top:10px" class="cls_002">
					<img src="images/Logo-citra-biru.png" width="75" height="75">
				</div>


				<div style="position:absolute;left:40px;top:55px" class="cls_002">
					<span class="cls_002">NIK</span>
				</div>
				<div style="position:absolute;left:162px;top:55px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:170px;top:55px" class="cls_002">
					<span class="cls_002">'.$nik.'</span>
				</div>



				<div style="position:absolute;left:40px;top:75px" class="cls_002">
					<span class="cls_002">Name</span>
				</div>
				<div style="position:absolute;left:162px;top:75px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:169px;top:75px" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_name'].'</span>
				</div>


				<div style="position:absolute;left:500px;top:95px" class="cls_002">
					<span class="cls_002">PTKP Status</span>
				</div>
				<div style="position:absolute;left:590px;top:95px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:600px;top:95px" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_status_kel'].'</span>
				</div>



				<div style="position:absolute;left:40px;top:95px;" class="cls_002">
					<span class="cls_002">Division/Dept.</span>
				</div>
				<div style="position:absolute;left:162px;top:95px;" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:169px;top:95px;" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_dept_long'].'</span>
				</div>



				<div style="position:absolute;left:500px;top:75px" class="cls_002">
					<span class="cls_002">Date of Join</span>
				</div>
				<div style="position:absolute;left:590px;top:75px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:600px;top:75px" class="cls_002">
					<span class="cls_002">'.date('d-M-Y', strtotime($rs_sql4['init_date'])).'</span>
				</div>



				<div style="position:absolute;left:40px;top:115px" class="cls_002">
					<span class="cls_002">Position</span>
				</div>
				<div style="position:absolute;left:162px;top:115px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:169px;top:115px" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_jab'].'</span>
				</div>



				<div style="position:absolute;left:500px;top:115px" class="cls_002">
					<span class="cls_002">Grade</span>
				</div>
				<div style="position:absolute;left:590px;top:115px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:600px;top:115px" class="cls_002">
					<span class="cls_002">-</span>
				</div>
				';
			///////////////////////////////////////////////////////// END DATA KARYAWAN

				$_html.= '<div style="position:absolute;left:30px;top:115px;margin-top: 20px;" class="cls_002">
					<span class="cls_002">...................................................................................................................................................................................................................................................</span>
				</div>

				<div style="position:absolute;left:30px;top:150px;" class="cls_002">
					<span class="cls_002">Income</span>
				</div>

				<div style="position:absolute;left:440px;top:150px;" class="cls_002">
					<span class="cls_002">Deduction</span>
				</div>

				<div style="position:absolute;left:30px;top:150px;margin-top: 10px;" class="cls_002">
					<span class="cls_002">...................................................................................................................................................................................................................................................</span>
				</div>';


			//////////////////////////////////// POTONGAN
				$_html.= '<div style="position:absolute;left:435px;top:180px;" class="cls_002">
					<table class="roww">';

				$row_kanan = 0;
				while ($rs=pg_fetch_array($sql3)){

					$_html.='<tr>
						<td class="th-fix10">'.$rs['s_bullet'].'a</td>
						<td class="th-fix175">'.$rs['s_label'].'</td>
						<td class="th-fix10" align="right">'.$rs['s_currency'].'</td>
						<td align="right" class="th-fix90">'.number_format($rs['n_amount'], 1).'</td>
					</tr>';

					$row_kanan+=1;

					$total_potongan += $rs['n_amount'];
				}

				$_html.='</table></div>';


			//////////////////////////////////// END POTONGAN

			//////////////////////////////////// PENGHASILAN

				$_html.= '<div style="position:absolute;left:30px;top:180px;" class="cls_002">
					<table class="roww" style="border-collapse: collapse;">'; // PENGHASILAN
				$row_kiri = 0;



				$i = 0;
				while ($rs=pg_fetch_array($sql2)){
					$_html.='<tr>
								<td class="th-fix10">'.$rs['s_bullet'].'</td>
								<td class="th-fix175">'.$rs['s_label'].'</td>';

					if($rs['s_extra_label'] == ""){
						$_html.= '<td class="th-fix10" style="text-align:right">&nbsp;</td>';
					} else {
						$_html.= '<td class="th-fix10" style="text-align:right">'.$rs['s_extra_label'].'</td>';
					}

					if($rs['n_ot_hours'] == ""){
						$_html.= '<td class="th-fix45">&nbsp;</td>';
					} else {
						$_html.= '<td class="th-fix25">'.$rs['n_ot_hours'].' Hrs</td>';
					}

					// TOTAL LEMBUR LOGIC
					if($rs['s_extra_label'] == "@" && $i == $no1-1){
						$_html.= '<td class="th-fix10">&nbsp;</td>
						<td class="th-fix90" align="right">&nbsp;</td></tr>';
					} elseif($i == $no1-1){
						$_html.= '<td class="th-fix10">&nbsp;</td>
						<td class="th-fix90" align="right">&nbsp;</td></tr>';
					} else {
						$_html.= '<td class="th-fix10">'.$rs['s_currency'].'</td>
						<td class="th-fix90" align="right">'.number_format($rs['n_amount'], 1).'</td></tr>';
					}


					if($rs['s_extra_label'] == "@" && $i == $no1-2){
						$_html.= '
						<tr>
							<td class="th-fix10"></td>
							<td class="th-fix175"></td>
							<td class="th-fix10" style="text-align:right">......</td>
							<td class="th-fix25">..............</td>
							<td class="th-fix10"></td>
							<td class="th-fix90"></td>

						</tr>';
					} else {

					}
					$i++;
					$total_penghasilan += $rs['n_amount'];
					$row_kiri+=1;
				} // end while



				$_html.= '</table></div>';
			//////////////////////////////////// END PENGHASILAN



			//////////////////////////////////// TOTAL PENGHASILAN
				if($row_kiri > $row_kanan){
					$jml = $row_kiri;
				} else {
					$jml = $row_kanan;
				}

				$_html.= '<div style="position:absolute;left:30px;top:180px;" class="cls_002">
					<table class="roww">'; // TOTAL PENGHASILAN

				// PERULANGAN JARAK TOTAL
				for ($b=0; $b < $jml+1; $b++) {
					$_html .= '<tr>
							<td colspan="11">&nbsp;</td>
						</tr>';
				}
				$gaji_bersih = $total_penghasilan - $total_potongan;

				$_html.='
					<tr>
						<td class="th-fix245">Total Income</td>
						<td class="th-fix10">: Rp</td>
						<td class="th-fix90" align="right">'.number_format($total_penghasilan, 1).'</td>
						<td class="th-fix45">&nbsp;</td>
						<td  class="th-fix175">Total Deduction</td>
						<td class="th-fix10">: Rp</td>
						<td align="right" class="th-fix90">'.number_format($total_potongan, 1).'</td>
					</tr>

					<tr>
						<td class="th-fix245">Net Pay</td>
						<td class="th-fix10">: Rp</td>
						<td class="th-fix90" align="right">'.number_format($gaji_bersih, 1).'</td>
						<td colspan="4"></td>
					</tr>';


				$_html.='</table></div>';
			//////////////////////////////////// END TOTAL PENGHASILAN


				$_html.='<div style="position:absolute;top:500px;left:20px;" class="cls_002">
					<span class="cls_002">Payroll</span><br>
					<span class="cls_002">(This document is generated automatically by e-Payslip)</span>
				</div>';







				// ===============
				$_html.='</div>'; //TUTUP BORDER

				$jlh_lembaran = $jl+1;
				// PENGHASILAN
				$sql2 = pg_query("SELECT set_config('payroll.self','1',true);
							SELECT * FROM finance.paycheck_query_payroll_income2(".$attd_id.", ".$emp_id.", ".
							$jlh_lembaran."::smallint, ".$idpay.");") or die($sql2.pg_last_error());

				$no1 = pg_num_rows($sql2);

				if($no1 < 2){ //KALAU ADA BONUS
					break;
				} else {
					$_html.='<div class="page_break">'; //UNTUK PAGE BREAK=

					//==========================================================
				} // ujung bonus


				// UNTUK PENUTUP BONUS
				if($jl==2){
					//==========================================================

					$_html.='</div>'; //TUTUP PAGE BREAK=
				}

				# code...
			} // ujung for lembaran



		///////////////////////////// CLOSING TAG
			$_html.= '</body></html>';
			// return 'ADA = '.$_SERVER['SERVER_NAME'].' dan '.$no2;
		}

		// LANJUTIN SENIN
		require_once("../../dompdf/dompdf_config4.inc.php");

		ini_set("memory_limit", "512M");
		ini_set("max_execution_time", "640");

		$dompdf = new DOMPDF();
		ini_set ('display_errors', 'on');
		ini_set ('log_errors', 'on');
		ini_set ('display_startup_errors', 'on');
		ini_set ('error_reporting', E_ALL);

		$dompdf->load_html($_html);
		$dompdf->set_paper("a4", "landscape");
		$dompdf->render();

		$dompdf->stream("e-PaySlip.pdf", array("Attachment" => 1));
	}
///// END FUNCTION DOWNLOAD PDF




///// FUNCTION LAIN (Gak Pake HTML BODY dan perubahan styling)
	function showSlip($emp_id, $attd_id, $nik){
		$jlh_lembaran = 1; // 2 kalo ada rapel gaji dll

		$sql = pg_query("WITH t AS (
	        SELECT DISTINCT p.attendance_record, p.payroll_center
	        FROM finance.payroll p
	        WHERE p.employee = ".$emp_id."
	        )
	        SELECT a.id, a.dt_start, a.dt_stop, t.payroll_center
	        FROM t
	        INNER JOIN tms.attendance_record a ON a.id = t.attendance_record
	        WHERE a.locked = true AND a.id = ".$attd_id."
	        ORDER BY a.id DESC") or die($sql.pg_last_error());

		$no_absen = pg_num_rows($sql);


		$_html = '<p style="text-align: center;">(data not found)</p>';
		if($no_absen>0) {


			// Periode Gaji
			$arr_month = ['January', 'February', 'March', 'April', 'May', 'June',
							'July', 'August', 'September', 'October', 'November', 'December'];

			$arr = []; //ARRAY BONUSNYA

			$rs_sql	= pg_fetch_array($sql);
			$bulan = $arr_month[date('n', strtotime($rs_sql['dt_stop']))-1];
			$tahun = date('Y', strtotime($rs_sql['dt_stop']));
      $idpay = $rs_sql['payroll_center'];

			// // NIK, NAME, DEPT, JAB, GRADE, STATUS_KEL, INIT_DATE
			$sql4 = pg_query("
				SELECT * FROM program.employee_history_slip(CURRENT_DATE) WHERE _nik = '".$nik."'
			") or die($sql4.pg_last_error());
			$rs_sql4	= pg_fetch_array($sql4);


			for ($jl=1; $jl <= 2 ; $jl++) {

				$jlh_lembaran = $jl;

				// PENGHASILAN
				$sql2 = pg_query("SELECT set_config('payroll.self','1',true);
							SELECT * FROM finance.paycheck_query_payroll_income2(".$attd_id.", ".$emp_id.", ".
							$jlh_lembaran."::smallint, ".$idpay.");") or die($sql2.pg_last_error());

				$no1 = pg_num_rows($sql2);

				// POTONGAN
				$sql3 = pg_query("SELECT set_config('payroll.self','1',true);
								SELECT * FROM finance.paycheck_query_payroll_deduction(".$attd_id.", ".$emp_id.", ".
								$jlh_lembaran."::smallint, ".$idpay.");") or die($sql3.pg_last_error());
				$no2 = pg_num_rows($sql3);

				/////////////////////////// MULAI HTML

				$_html = '<style type="text/css">
									span.cls_002{
										font-family:Arial Narrow,sans-serif;
										font-size:11px;
										color:rgb(0,0,0);
										font-weight:bold;
										font-style:normal;
										text-decoration: none
									}
									.column {
										font-family:Arial Narrow,sans-serif;
										font-size:11px;
										color:rgb(0,0,0);
										font-weight:bold;
										font-style:normal;
										text-decoration: none;
										float: left;
										width: 50%;
										padding-top: 170px;
										padding-left: 30px;
									}
									.roww {
										font-family:Arial Narrow,sans-serif;
										font-size:11px;
										color:rgb(0,0,0);
										font-weight:bold;
										font-style:normal;
										text-decoration: none;
									}
									.th-fix10 {
										width: 10px; min-width: 10px; max-width: 10px;
									}
									.th-fix15 {
										width: 15px; min-width: 15px; max-width: 15px;
									}
									.th-fix175 {
										width: 175px; min-width: 175px; max-width: 175px;
									}
									.th-fix25 {
										width: 25px; min-width: 25px; max-width: 25px;
									}
									.th-fix90 {
										width: 90px; min-width: 90px; max-width: 90px;
									}
									.th-fix195 {
										width: 195px; min-width: 195px; max-width: 195px;
									}
									.th-fix5 {
										width: 5px; min-width: 5px; max-width: 5px;
									}
									.th-fix45 {
										width: 45px; min-width: 45px; max-width: 45px;
									}
									.th-fix245 {
										width: 245px; min-width: 245px; max-width: 245px;
									}
									.th-fix210 {
										width: 210px; min-width: 210px; max-width: 210px;
									}
								</style>';


				$total_penghasilan = 0;

				$total_potongan = 0;


				//////////////////////////////////////////////////////DATA KARYAWAN

				$_html.= '<div style="position:absolute;left:0;margin-left:0px;top:0px;width:210mm;height:148mm;border-style:outset;overflow:hidden">
				<div style="position:absolute;left:0px;top:0px"></div>



				<div style="position:absolute;left:40px;top:35px" class="cls_002">
					<span class="cls_002">PT CITRA TUBINDO Tbk</span>
				</div>

				<div style="position:absolute;left:190px;top:35px" class="cls_002">
					<span class="cls_002">Payslip for '.$bulan.' '.$tahun.'</span>
				</div>


				<div style="position:absolute;left:40px;top:55px" class="cls_002">
					<span class="cls_002">NIK</span>
				</div>
				<div style="position:absolute;left:162px;top:55px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:170px;top:55px" class="cls_002">
					<span class="cls_002">'.$nik.'</span>
				</div>



				<div style="position:absolute;left:40px;top:75px" class="cls_002">
					<span class="cls_002">Name</span>
				</div>
				<div style="position:absolute;left:162px;top:75px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:169px;top:75px" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_name'].'</span>
				</div>


				<div style="position:absolute;left:500px;top:95px" class="cls_002">
					<span class="cls_002">PTKP Status</span>
				</div>
				<div style="position:absolute;left:590px;top:95px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:600px;top:95px" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_status_kel'].'</span>
				</div>



				<div style="position:absolute;left:40px;top:95px;" class="cls_002">
					<span class="cls_002">Division/Dept.</span>
				</div>
				<div style="position:absolute;left:162px;top:95px;" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:169px;top:95px;" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_dept_long'].'</span>
				</div>



				<div style="position:absolute;left:500px;top:75px" class="cls_002">
					<span class="cls_002">Date of Join</span>
				</div>
				<div style="position:absolute;left:590px;top:75px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:600px;top:75px" class="cls_002">
					<span class="cls_002">'.date('d-M-Y', strtotime($rs_sql4['init_date'])).'</span>
				</div>



				<div style="position:absolute;left:40px;top:115px" class="cls_002">
					<span class="cls_002">Position</span>
				</div>
				<div style="position:absolute;left:162px;top:115px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:169px;top:115px" class="cls_002">
					<span class="cls_002">'.$rs_sql4['_jab'].'</span>
				</div>



				<div style="position:absolute;left:500px;top:115px" class="cls_002">
					<span class="cls_002">Grade</span>
				</div>
				<div style="position:absolute;left:590px;top:115px" class="cls_002">
					<span class="cls_002">:</span>
				</div>
				<div style="position:absolute;left:600px;top:115px" class="cls_002">
					<span class="cls_002">-</span>
				</div>
				';
				///////////////////////////////////////////////////////// END DATA KARYAWAN

				$_html.= '<div style="position:absolute;left:30px;top:115px;margin-top: 20px;" class="cls_002">
					<span class="cls_002">.........................................................................................................................................................................................................................................................</span>
				</div>

				<div style="position:absolute;left:30px;top:150px;" class="cls_002">
					<span class="cls_002">Income</span>
				</div>

				<div style="position:absolute;left:440px;top:150px;" class="cls_002">
					<span class="cls_002">Deduction</span>
				</div>

				<div style="position:absolute;left:30px;top:150px;margin-top: 10px;" class="cls_002">
					<span class="cls_002">.........................................................................................................................................................................................................................................................</span>
				</div>';


				//////////////////////////////////// POTONGAN
				$_html.= '<div style="position:absolute;left:435px;top:180px;" class="cls_002">
					<table class="roww">';

				$row_kanan = 0;
				while ($rs=pg_fetch_array($sql3)){
					$_html.='<tr>
						<td class="th-fix10">'.$rs['s_bullet'].'</td>
						<td class="th-fix175">'.$rs['s_label'].'</td>
						<td class="th-fix25" align="right">'.$rs['s_currency'].'</td>
						<td align="right" class="th-fix90">'.number_format($rs['n_amount'], 1).'</td>
					</tr>';

					$row_kanan+=1;

					$total_potongan += $rs['n_amount'];
          $total_potongan2 += $rs['n_amount'];
				}

				$_html.='</table></div>';
				//////////////////////////////////// END POTONGAN

				//////////////////////////////////// PENGHASILAN

				$_html.= '<div style="position:absolute;left:30px;top:180px;" class="cls_002">
					<table class="roww" style="border-collapse: collapse;">'; // PENGHASILAN
				$row_kiri = 0;


				$i = 0;
				while ($rs=pg_fetch_array($sql2)){
					$_html.='<tr>
								<td class="th-fix10">'.$rs['s_bullet'].'</td>
								<td class="th-fix175">'.$rs['s_label'].'</td>
								<td class="th-fix10" style="text-align:right">
								'.$rs['s_extra_label'].'</td>';

					if($rs['n_ot_hours'] == ""){
						$_html.= '<td class="th-fix45">'.$rs['n_ot_hours'].'</td>';
					} else {
						$_html.= '<td class="th-fix45">'.$rs['n_ot_hours'].' Hrs</td>';
					}

					// TOTAL LEMBUR LOGIC
					if($rs['s_extra_label'] == "@" && $i == $no1-1){
						$_html.= '<td class="th-fix10">&nbsp;</td>
						<td class="th-fix90" align="right">&nbsp;</td></tr>';
					} elseif($i == $no1-1){
						$_html.= '<td class="th-fix10">&nbsp;</td>
						<td class="th-fix90" align="right">&nbsp;</td></tr>';
					} else {
						$_html.= '<td class="th-fix25">'.$rs['s_currency'].'</td>
						<td class="th-fix90" align="right">'.number_format($rs['n_amount'], 1).'</td></tr>';
					}


					if($rs['s_extra_label'] == "@" && $i == $no1-2){
						$_html.= '
						<tr>
							<td class="th-fix10"></td>
							<td class="th-fix175"></td>
							<td class="th-fix10" style="text-align:right">......</td>
							<td class="th-fix25">..............</td>
							<td class="th-fix10"></td>
							<td class="th-fix90"></td>

						</tr>';
					} else {

					}
					$i++;
					$total_penghasilan += $rs['n_amount'];
					$row_kiri+=1;
				} // end while

				$_html.= '</table></div>';
				//////////////////////////////////// END PENGHASILAN



				//////////////////////////////////// TOTAL PENGHASILAN
				if($row_kiri > $row_kanan){
					$jml = $row_kiri;
				} else {
					$jml = $row_kanan;
				}

				$_html.= '<div style="position:absolute;left:30px;top:180px;" class="cls_002">
					<table class="roww">'; // TOTAL PENGHASILAN

				// PERULANGAN JARAK TOTAL
				for ($b=0; $b < $jml+1; $b++) {
					$_html .= '<tr>
							<td colspan="11">&nbsp;</td>
						</tr>';
				}
				$gaji_bersih = $total_penghasilan - $total_potongan;

				$_html.='
					<tr>
						<td class="th-fix245">Total Income</td>
						<td class="th-fix25">: Rp</td>
						<td class="th-fix90" align="right">'.number_format($total_penghasilan, 1).'</td>
						<td class="th-fix45">&nbsp;</td>
						<td  class="th-fix175">Total Deduction</td>
						<td class="th-fix25">: Rp</td>
						<td align="right" class="th-fix90">'.number_format($total_potongan, 1).'</td>
					</tr>

					<tr>
						<td class="th-fix245">Net Pay</td>
						<td class="th-fix25">: Rp</td>
						<td class="th-fix90" align="right">'.number_format($gaji_bersih, 1).'</td>
						<td colspan="4"></td>
					</tr>';


				$_html.='</table></div>';
				//////////////////////////////////// END TOTAL PENGHASILAN

				///////////////////////////// CLOSING TAG
				$_html.='<div style="position:absolute;top:500px;left:20px;" class="cls_002">
					<span class="cls_002">Payroll</span><br>
					<span class="cls_002">(This document is generated automatically by e-Payslip)</span>
				</div>';
				///////////////////////////// END CLOSING TAG

				$_html.='</div>'; //TUTUP BORDER

				//BONUS =================================================
				$jlh_lembaran = $jl+1;

				// PENGHASILAN
				$sql2 = pg_query("SELECT set_config('payroll.self','1',true);
							SELECT * FROM finance.paycheck_query_payroll_income2(".$attd_id.", ".$emp_id.", ".
							$jlh_lembaran."::smallint, ".$idpay.");") or die($sql2.pg_last_error());

				$no1 = pg_num_rows($sql2);


				if($no1 < 2){ //KALAU ADA BONUS
					array_push($arr, $_html);
					break;
				} else {
					array_push($arr, $_html);
				}
				//=======================================================

			} //TUTUP FOR

		} // TUTUP NO ABSEN

		return $arr;
	}
///// END FUNCTION LAIN (Gak Pake HTML BODY dan perubahan styling)


?>
