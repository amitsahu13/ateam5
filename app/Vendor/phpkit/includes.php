<?php
class segpay {
	var $strConnectTo="TEST";    //Set to SIMULATOR for the Simulator expert system, TEST for the Test Server and LIVE in the live environment
	var $strVirtualDir = "";    //Change if you have created a Virtual Directory in IIS with a different name
	/** IMPORTANT.  Set the strYourSiteFQDN value to the Fully Qualified Domain Name of your server. **
	 ** This should start http:// or https:// and should be the name by which our servers can call back to yours **
	 ** i.e. it MUST be resolvable externally, and have access granted to the Sage Pay servers **
	 ** examples would be https://www.mysite.com or http://212.111.32.22/ **
	 ** NOTE: You should leave the final / in place. **/

	//var $strYourSiteFQDN = 'http://192.168.1.142/elance';
	var $strVendorName="vikash";    /** Set this value to the Vendor Name assigned to you by Sage Pay or chosen when you applied **/
	//var $strEncryptionPassword="UT4dc2yzsNmXwYLs";    /** Set this value to the XOR Encryption password assigned to you by Sage Pay **/
	var $strCurrency="USD"; /** Set this to indicate the currency in which you wish to trade. You will need a merchant number in this currency **/
	var $strTransactionType="PAYMENT"; /** This can be DEFERRED or AUTHENTICATE if your Sage Pay account supports those payment types **/
	//var $strPartnerID=""; /** Optional setting. If you are a Sage Pay Partner and wish to flag the transactions with your unique partner id set it here. **/

	/* Optional setting.
	 ** 0 = Do not send either customer or vendor e-mails,
	 ** 1 = Send customer and vendor e-mails if address(es) are provided(DEFAULT).
	 ** 2 = Send Vendor Email but not Customer Email. If you do not supply this field, 1 is assumed and e-mails are sent if addresses are provided. **/
	//var $bSendEMail=1;
	//var $strVendorEMail="sagepay@wholesalegardenfurniture.co.uk";    /** Optional setting. Set this to the mail address which will receive order confirmations and failures **/

	//** Encryption type should be left set to AES unless you are experiencing problems and have been told by SagePay support to change it - XOR is the only other acceptable value **
	var $strEncryptionType="AES";

	/**************************************************************************************************
	 * Global Definitions for this site
	 **************************************************************************************************/

	var $strProtocol="2.23";

	/*if($strConnectTo=="LIVE")
	 $strPurchaseURL="https://live.sagepay.com/gateway/service/vspform-register.vsp";
	 elseif ($strConnectTo=="TEST")
	 $strPurchaseURL="https://test.sagepay.com/gateway/service/vspform-register.vsp";
	 else
	 $strPurchaseURL="https://test.sagepay.com/simulator/vspformgateway.asp";
	 */


	var $strPurchaseURL="https://test.sagepay.com/gateway/service/vspform-register.vsp";


	/**************************************************************************************************
	 * Useful functions for all pages in this kit
	 ***************************************************************************************************/

	//Function to redirect browser to a specific page
	function redirect($url) {
		if (!headers_sent())
		header('Location: '.$url);
		else {
			echo '<script type="text/javascript">';
			echo 'window.location.href="'.$url.'";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
			echo '</noscript>';
		}
	}

	/* The getToken function.                                                                                         **
	 ** NOTE: A function of convenience that extracts the value from the "name=value&name2=value2..." reply string **
	 ** Works even if one of the values is a URL containing the & or = signs.                                      	  */
	function getToken($thisString) {

		// List the possible tokens
		$Tokens = array(
    "Status",
    "StatusDetail",
    "VendorTxCode",
    "VPSTxId",
    "TxAuthNo",
    "Amount",
    "AVSCV2", 
    "AddressResult", 
    "PostCodeResult", 
    "CV2Result", 
    "GiftAid", 
    "3DSecureStatus", 
    "CAVV",
	"AddressStatus",
	"CardType",
	"Last4Digits",
	"PayerStatus");

		// Initialise arrays
		$output = array();
		$resultArray = array();

		// Get the next token in the sequence
		for ($i = count($Tokens)-1; $i >= 0 ; $i--){
			// Find the position in the string
			$start = strpos($thisString, $Tokens[$i]);
			// If it's present
			if ($start !== false){
				// Record position and token name
				$resultArray[$i]->start = $start;
				$resultArray[$i]->token = $Tokens[$i];
			}
		}

		// Sort in order of position
		sort($resultArray);
		// Go through the result array, getting the token values
		for ($i = 0; $i<count($resultArray); $i++){
			// Get the start point of the value
			$valueStart = $resultArray[$i]->start + strlen($resultArray[$i]->token) + 1;
			// Get the length of the value
			if ($i==(count($resultArray)-1)) {
				$output[$resultArray[$i]->token] = substr($thisString, $valueStart);
			} else {
				$valueLength = $resultArray[$i+1]->start - $resultArray[$i]->start - strlen($resultArray[$i]->token) - 2;
				$output[$resultArray[$i]->token] = substr($thisString, $valueStart, $valueLength);
			}

		}

		// Return the ouput array
		return $output;
	}
	function cleanInput2($strRawText, $strAllowableChars, $blnAllowAccentedChars)
	{
		$iCharPos = 0;
		$chrThisChar = "";
		$strCleanedText = "";

		//Compare each character based on list of acceptable characters
		while ($iCharPos < strlen($strRawText))
		{
			// Only include valid characters **
			$chrThisChar = substr($strRawText, $iCharPos, 1);
			if (strpos($strAllowableChars, $chrThisChar) !== FALSE)
			{
				$strCleanedText = $strCleanedText . $chrThisChar;
			}
			elseIf ($blnAllowAccentedChars == TRUE)
			{
				// Allow accented characters and most high order bit chars which are harmless **
				if (ord($chrThisChar) >= 191)
				{
					$strCleanedText = $strCleanedText . $chrThisChar;
				}
			}

			$iCharPos = $iCharPos + 1;
		}

		return $strCleanedText;
	}

	// Filters unwanted characters out of an input string based on type.  Useful for tidying up FORM field inputs
	//   Parameter strRawText is a value to clean.
	//   Parameter filterType is a value from one of the CLEAN_INPUT_FILTER_ constants.
	function cleanInput($strRawText, $filterType)
	{
		$strAllowableChars = "";
		$blnAllowAccentedChars = FALSE;
		$strCleaned = "";
		//$filterType = strtolower($filterType); //ensures filterType matches constant values
		// echo $filterType;die;
		if ($filterType == 'CLEAN_INPUT_FILTER_TEXT')
		{
			echo $strAllowableChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 .,'/\\{}@():?-_&£$=%~*+\"\n\r";
			$strCleaned = cleanInput2($strRawText, $strAllowableChars, TRUE);
		}
		elseif ($filterType == CLEAN_INPUT_FILTER_NUMERIC)
		{
			$strAllowableChars = "0123456789 .,";
			$strCleaned = cleanInput2($strRawText, $strAllowableChars, FALSE);
		}
		elseif ($filterType == CLEAN_INPUT_FILTER_ALPHABETIC || $filterType == CLEAN_INPUT_FILTER_ALPHABETIC_AND_ACCENTED)
		{
			$strAllowableChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz";
			if ($filterType == CLEAN_INPUT_FILTER_ALPHABETIC_AND_ACCENTED) $blnAllowAccentedChars = TRUE;
			$strCleaned = cleanInput2($strRawText, $strAllowableChars, $blnAllowAccentedChars);
		}
		elseif ($filterType == CLEAN_INPUT_FILTER_ALPHANUMERIC || $filterType == CLEAN_INPUT_FILTER_ALPHANUMERIC_AND_ACCENTED)
		{
			$strAllowableChars = "0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
			if ($filterType == CLEAN_INPUT_FILTER_ALPHANUMERIC_AND_ACCENTED) $blnAllowAccentedChars = TRUE;
			$strCleaned = cleanInput2($strRawText, $strAllowableChars, $blnAllowAccentedChars);
		}
		else // Widest Allowable Character Range
		{
			$strAllowableChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 .,'/\\{}@():?-_&£$=%~*+\"\n\r";
			$strCleaned = cleanInput2($strRawText, $strAllowableChars, TRUE);
		}

		return $strCleaned;
	}


	// Filters unwanted characters out of an input string based on an allowable character set.  Useful for tidying up FORM field inputs
	//   Parameter strRawText is a value to clean.
	//   Parameter "strAllowableChars" is a string of characters allowable in "strRawText" if its to be deemed valid.
	//   Parameter "blnAllowAccentedChars" accepts a boolean value which determines if "strRawText" can contain Accented or High-order characters.


	/* Base 64 Encoding function **
	 ** PHP does it natively but just for consistency and ease of maintenance, let's declare our own function **/
	function base64Encode($plain) {
		// Initialise output variable
		$output = "";

		// Do encoding
		$output = base64_encode($plain);

		// Return the result
		return $output;
	}

	/* Base 64 decoding function **
	 ** PHP does it natively but just for consistency and ease of maintenance, let's declare our own function **/
	function base64Decode($scrambled) {
		// Initialise output variable
		$output = "";

		// Fix plus to space conversion issue
		$scrambled = str_replace(" ","+",$scrambled);

		// Do encoding
		$output = base64_decode($scrambled);

		// Return the result
		return $output;
	}


	/*  The SimpleXor encryption algorithm                                                                                **
	 **  NOTE: This is a placeholder really.  Future releases of Form will use AES or TwoFish.  Proper encryption      **
	 **  This simple function and the Base64 will deter script kiddies and prevent the "View Source" type tampering        **
	 **  It won't stop a half decent hacker though, but the most they could do is change the amount field to something     **
	 **  else, so provided the vendor checks the reports and compares amounts, there is no harm done.  It's still          **
	 **  more secure than the other PSPs who don't both encrypting their forms at all                                      */

	function simpleXor($InString, $Key) {
		// Initialise key array
		$KeyList = array();
		// Initialise out variable
		$output = "";

		// Convert $Key into array of ASCII values
		for($i = 0; $i < strlen($Key); $i++){
			$KeyList[$i] = ord(substr($Key, $i, 1));
		}

		// Step through string a character at a time
		for($i = 0; $i < strlen($InString); $i++) {
			// Get ASCII code from string, get ASCII code from key (loop through with MOD), XOR the two, get the character from the result
			// % is MOD (modulus), ^ is XOR
			$output.= chr(ord(substr($InString, $i, 1)) ^ ($KeyList[$i % strlen($Key)]));
		}

		// Return the result
		return $output;
	}


	//** Wrapper function do encrypt an encode based on strEncryptionType setting **
	function encryptAndEncode($strIn) {

		if ($this->strEncryptionType=="XOR")
		{
			//** XOR encryption with Base64 encoding **
			return base64Encode(simpleXor($strIn,$this->strEncryptionPassword));
		}
		else
		{
			//** AES encryption, CBC blocking with PKCS5 padding then HEX encoding - DEFAULT **

			//** use initialization vector (IV) set from $strEncryptionPassword
			$strIV = $this->strEncryptionPassword;
			 
			//** add PKCS5 padding to the text to be encypted
			$strIn = $this->addPKCS5Padding($strIn);
				
			//** perform encryption with PHP's MCRYPT module
			$strCrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->strEncryptionPassword, $strIn, MCRYPT_MODE_CBC, $strIV);

			//** perform hex encoding and return
			return "@" . bin2hex($strCrypt);
		}
	}


	//** Wrapper function do decode then decrypt based on header of the encrypted field **
	function decodeAndDecrypt($strIn) {

		$strEncryptionPassword = $this->strEncryptionPassword;

		if (substr($strIn,0,1)=="@")
		{
			//** HEX decoding then AES decryption, CBC blocking with PKCS5 padding - DEFAULT **

			//** use initialization vector (IV) set from $strEncryptionPassword
			$strIV = $this->strEncryptionPassword;
			 
			//** remove the first char which is @ to flag this is AES encrypted
			$strIn = substr($strIn,1);
			 
			//** HEX decoding
			$strIn = pack('H*', $strIn);
			 
			//** perform decryption with PHP's MCRYPT module

			return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $strEncryptionPassword, $strIn, MCRYPT_MODE_CBC, $strIV);
		}
		else
		{
			//** Base 64 decoding plus XOR decryption **
			return simpleXor(base64Decode($strIn),$strEncryptionPassword);
		}
	}


	//** PHP's mcrypt does not have built in PKCS5 Padding, so we use this
	function addPKCS5Padding($input)
	{
		$blocksize = 16;
		$padding = "";

		// Pad input to an even block size boundary
		$padlength = $blocksize - (strlen($input) % $blocksize);
		for($i = 1; $i <= $padlength; $i++) {
			$padding .= chr($padlength);
		}
		 
		return $input . $padding;
	}

	// Inspects and validates user input for a name field. Returns TRUE if input value is valid as a name field.
	//   Parameter "strInputValue" is the field value to validate.
	//   Parameter "returnedResult" sets a result to a value from the list of field validation constants beginning with "FIELD_".
	function isValidNameField($strInputValue, &$returnedResult)
	{
		$strAllowableChars = " ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-.'&\\";
		$strInputValue = trim($strInputValue);
		$returnedResult = validateString($strInputValue, $strAllowableChars, TRUE, TRUE, 20, -1);
		if ($returnedResult == FIELD_VALID) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	// Inspects and validates user input for an Address field.
	//   Parameter "blnIsRequired" specifies whether "strInputValue" must have a non-null and non-empty value.
	function isValidAddressField($strInputValue, $blnIsRequired, &$returnedResult )
	{
		$strAllowableChars = " 0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-.',/\\()&:+\n\r";
		$strInputValue = trim($strInputValue);
		$returnedResult = validateString($strInputValue, $strAllowableChars, TRUE, $blnIsRequired, 100, -1);

		if ($returnedResult == FIELD_VALID) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	// Inspects and validates user input for a City field.
	function isValidCityField($strInputValue, &$returnedResult)
	{
		$strAllowableChars = " 0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-.',/\\()&:+\n\r";
		$strInputValue = trim($strInputValue);
		$returnedResult = validateString($strInputValue, $strAllowableChars, TRUE, TRUE, 40, -1);

		if ($returnedResult == FIELD_VALID) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	// Inspects and validates user input for a Postcode/zip field.
	function isValidPostcodeField($strInputValue, &$returnedResult)
	{
		$strAllowableChars = " 0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-";
		$strInputValue = trim($strInputValue);
		$returnedResult = validateString($strInputValue, $strAllowableChars, FALSE, TRUE, 10, -1);

		if ($returnedResult == FIELD_VALID) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	// Inspects and validates user input for an email field.
	function isValidEmailField($strInputValue, &$returnedResult)
	{
		// The allowable e-mail address format accepted by the SagePay gateway must be RFC 5321/5322 compliant (see RFC 3696)
		$sEmailRegExpPattern = '/^[a-z0-9\xC0-\xFF\!#$%&amp;\'*+\/=?^_`{|}~\*-]+(?:\.[a-z0-9\xC0-\xFF\!#$%&amp;\'*+\/=?^_`{|}~*-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[a-z]{2,3}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum|at|coop|travel)$/';
		$strInputValue = trim($strInputValue);
		$returnedResult = validateStringWithRegExp($strInputValue, $sEmailRegExpPattern, FALSE);

		if ($returnedResult == FIELD_VALID) {
			return TRUE;
		} else{
			return FALSE;
		}
	}


	// Inspects and validates user input for a phone field.
	function isValidPhoneField($strInputValue, &$returnedResult)
	{
		$strAllowableChars = " 0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-()+";
		$strInputValue = trim($strInputValue);
		$returnedResult = validateString($strInputValue, $strAllowableChars, FALSE, FALSE, 20, -1);

		if ($returnedResult == FIELD_VALID) {
			return TRUE;
		} else{
			return FALSE;
		}
	}


	// A generic function used to inspect and validate a string from user input.
	//   Parameter "strInputValue" is the value to perform validation on.
	//   Parameter "strAllowableChars" is a string of characters allowable in "strInputValue" if its to be deemed valid.
	//   Parameter "blnAllowAccentedChars" accepts a boolean value which determines if "strInputValue" can contain Accented or High-order characters.
	//   Parameter "blnIsRequired" accepts a boolean value which specifies whether "strInputValue" must have a non-null and non-empty value.
	//   Parameter "intMaxLength" accepts an integer which specifies the maximum allowable length of "strInputValue". Set to -1 for this to be ignored.
	//   Parameter "intMinLength" specifies the miniumum allowable length of "strInputValue". Set to -1 for this to be ignored.
	//   Returns a result from one of the field validation constants that begin with "FIELD_"
	function validateString($strInputValue, $strAllowableChars, $blnAllowAccentedChars, $blnIsRequired, $intMaxLength, $intMinLength)
	{
		if ($blnIsRequired == TRUE && strlen($strInputValue) == 0)
		{
			return FIELD_INVALID_REQUIRED_INPUT_VALUE_MISSING;
		}
		elseif (($intMaxLength != -1) && (strlen($strInputValue) > $intMaxLength))
		{
			return FIELD_INVALID_MAXIMUM_LENGTH_EXCEEDED;
		}
		elseif ($strInputValue != cleanInput2($strInputValue, $strAllowableChars, $blnAllowAccentedChars))
		{
			return FIELD_INVALID_BAD_CHARACTERS;
		}
		elseif (($blnIsRequired == TRUE) && (strlen($strInputValue) < $intMinLength))
		{
			return FIELD_INVALID_MINIMUM_LENGTH_NOT_MET;
		}
		elseif (($blnIsRequired == FALSE) && (strlen($strInputValue) > 0) && (strlen($strInputValue) < $intMinLength))
		{
			return FIELD_INVALID_MINIMUM_LENGTH_NOT_MET;
		}
		else
		{
			return FIELD_VALID;
		}
	}


	// A generic function to inspect and validate a string from user input based on a Regular Expression pattern.
	//   Parameter "strInputValue" is the value to perform validation on.
	//   Parameter "strRegExPattern" is a Regular Expression string pattern used to validate against "strInputValue".
	//   Parameter "blnIsRequired" accepts a boolean value which specifies whether "strInputValue" must have a non-null and non-empty value.
	//   Returns a result from one of the field validation constants that begin with "FIELD_"
	function validateStringWithRegExp($strInputValue, $strRegExPattern, $blnIsRequired)
	{
		if ($blnIsRequired == TRUE && strlen($strInputValue) == 0)
		{
			return FIELD_INVALID_REQUIRED_INPUT_VALUE_MISSING;
		}
		elseif (strlen($strInputValue) > 0)
		{
			if (preg_match($strRegExPattern, $strInputValue)) {
				return FIELD_VALID;
			} else {
				return FIELD_INVALID_BAD_FORMAT;
			}
		}
		else
		{
			return FIELD_VALID;
		}
	}


	// Maps a Field Validation constant value to a string representing a user friendly validation error message.
	//   Parameter "strFieldLabelName" is the display name of the form field to use in the returned message.
	function getValidationMessage($fieldValidationCode, $strFieldLabelName)
	{
		$strReturn = "";

		switch ($fieldValidationCode)
		{
			case FIELD_INVALID_BAD_CHARACTERS:
				$strReturn = "Please correct " . $strFieldLabelName . " as it contains disallowed characters.";
				break;
			case FIELD_INVALID_BAD_FORMAT:
				$strReturn = "Please correct " . $strFieldLabelName . " as the format is invalid.";
				break;
			case FIELD_INVALID_MINIMUM_LENGTH_NOT_MET:
				$strReturn = "Please correct " . $strFieldLabelName . " as the value is not long enough.";
				break;
			case FIELD_INVALID_MAXIMUM_LENGTH_EXCEEDED:
				$strReturn = "Please correct " . $strFieldLabelName . " as the value is too long.";
				break;
			case FIELD_INVALID_REQUIRED_INPUT_VALUE_MISSING:
				$strReturn = "Please enter a value for " . $strFieldLabelName . " where requested below.";
				break;
			case FIELD_INVALID_REQUIRED_INPUT_VALUE_NOT_SELECTED:
				$strReturn = "Please select a value for " . $strFieldLabelName . " where requested below.";
				break;
		}

		return $strReturn;
	}

	function requestPost($url, $data){
		// Set a one-minute timeout for this script
		set_time_limit(60);

		// Initialise output variable
		$output = array();

		// Open the cURL session
		$curlSession = curl_init();

		// Set the URL
		curl_setopt ($curlSession, CURLOPT_URL, $url);
		// No headers, please
		curl_setopt ($curlSession, CURLOPT_HEADER, 0);
		// It's a POST request
		curl_setopt ($curlSession, CURLOPT_POST, 1);
		// Set the fields for the POST
		curl_setopt ($curlSession, CURLOPT_POSTFIELDS, $data);
		// Return it direct, don't print it out
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1);
		// This connection will timeout in 30 seconds
		curl_setopt($curlSession, CURLOPT_TIMEOUT,30);
		//The next two lines must be present for the kit to work with newer version of cURL
		//You should remove them if you have any problems in earlier versions of cURL
		curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 1);

		//Send the request and store the result in an array

		$rawresponse = curl_exec($curlSession);
		//Store the raw response for later as it's useful to see for integration and understanding
		pr($rawresponse);die;
		$_SESSION["rawresponse"]=$rawresponse;

		//Split response into name=value pairs
		$response = split(chr(10), $rawresponse);
		// Check that a connection was made
		if (curl_error($curlSession)){
			// If it wasn't...
			$output['Status'] = "FAIL";
			$output['StatusDetail'] = curl_error($curlSession);
		}

		// Close the cURL session
		curl_close ($curlSession);

		// Tokenise the response
		for ($i=0; $i<count($response); $i++){
			// Find position of first "=" character
			$splitAt = strpos($response[$i], "=");
			// Create an associative (hash) array with key/value pairs ('trim' strips excess whitespace)
			$output[trim(substr($response[$i], 0, $splitAt))] = trim(substr($response[$i], ($splitAt+1)));
		} // END for ($i=0; $i<count($response); $i++)

		// Return the output
		return $output;


	}


}
?>