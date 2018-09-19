<?php 

/**
 * 
 */
class Makepayement extends DBO {
	
	public static function init ($params = array()) {
		// data = 
			// CustomerName name
			// CustomerMsisdn phomeNumber
			// CustomerEmail email
			// Channel Network
			// Amount
			// PrimaryCallbackUrl
			// Description
			// url = https://api.hubtel.com/v1/merchantaccount/merchants/account-number/recieve/mobilemoney

		// opts = 
		// 	method - post
		// 	header - Content-type: application/json \r\n
		// 			 Accept: application/json \r\n
		// 			 Authorization: Basic base64encrypted client-info
					 // content - json_encode(data)

		// context - stream_context_create(opts)
		// result - file_get_contents(filename, false, context)
		// var_dump(result)
	}
}