<?php


/**
 * 
 */
class Reception extends Staff
{
	function __construct() {
		if (!Session::exists('user_session_access') || Session::get('user_session_access') != 'receptionist') {
			# code...
			Redirect::to('login');
		}
	}

	public function getClientInfo($rid) {
		return self::get('clients', array('id' => $rid));
	}

	public function checkIn($id) {
		return self::update('reservation', array('id' => $id), array('check_in' => 1, 'check_in_date' => date('Y-m-d')));
	}

	public function checkOut($user, $room) {
		return self::update('reservation', array('id' => $id), array('check_out' => 1, 'check_out_date' => date('Y-m-d')));
	}

	public function getCheckedIns() {
		return self::get('reservation', array('check_in' => 1, 'check_out' => 0));
	}

	public function getCheckInPay($rid) {
		$ret = count(self::get('client_payments', array('reservation' => $rid))) ? (array) self::get('reservation_payments', array('reservation' => $rid)) : array();
		return Utility::addArr($ret, 0, 'amount');
	}

	public function addBill($params) {
		return self::insert('reception_billing', $params);
	}

	public function addClientPayment($params) {
		return self::insert('client_payments', $params);
	}

	public function getReservationInvoice($rid) {
		$inv = array();
		$total = array();
		$r = new Reservation;
		$total['booking'] = $r->getPrice($rid);
		$arr = self::get('reception_billing', array('reservation' => $rid));
		$arr2 = self::get('client_payments', array('reservation' => $rid));
		$c1 = count($arr);
		$c2 = count($arr2);
		$i = $j = 0;
		while ($i != $c1 || $j != $c2) {
			# code...
			if ($i == $c1) {
				# code...
				if ($j == $c2) {
					# code...
					$i = $c1;
					$j = $c2;
					break;
				} else {
					$total[] = $arr2[$j];
				}
				$j++;
			}
			if ($j == $c2) {
				# code...
				if ($i == $c1) {
					# code...
					$i = $c1;
					$j = $c2;
					break;
				} else {
					$total[] = $arr[$i];
				}
				$i++;
			}
			if ($i != $c1 && $j != $c2) {
				# code...
				if (strtotime($arr[$i]->time_added) <= strtotime($arr2[$j]->time_added)) {
					# code...
					$total[] = $arr[$i];
					$i++;
				} else {

					$total[] = $arr2[$j];
					$j++;
				}
			}

		}
		return json_encode($total);
	}

	public function mailInvoice($rid) {
		
	}

}