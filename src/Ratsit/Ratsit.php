<?php 

namespace Ratsit;

class Ratsit
{
	public static $service;
	public static $apiKey;
	public static $packages;
	protected $queryString;

	/**
     * Generate url for the request
     * 
     * @param $code (personal number)
     * @return url and token
     */
	public function buildUrl( $code )
	{
		try
		{
			if( is_numeric( $code ) && !empty( $code ) )
			{
				$this->queryString = 'token=' . Ratsit::$apiKey . '&packages=' . Ratsit::$packages . '&pnr=' . $code;
			}
			else
			{
				throw new ApiException( 'Invalid querystring.');  
			}
		}
		catch( ApiException $e )  
		{  
			echo $e->getMessage();
		} 

	}


	/**
     * Get the response from Ratsit
     * 
     * @return response
     */
	public function response()
	{
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, 'https://www.ratsit.se:7443/ratsvc/apipackageservice.asmx/'. Ratsit::$service );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POST, true );

		$data = array(
		    'Host' 		     => ' www.ratsit.se',
		    'Content-Type'   => ' application/x-www-form-urlencoded',
		    'Content-Length' => ' length',
		);

		curl_setopt( $ch, CURLOPT_HTTPHEADER, $data );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $this->queryString );

		$response = curl_exec( $ch );
		curl_close( $ch );
		
		return $response;		
	}


	/**
     * Search by personal number
     * 
     * @param $code (personal number)
     * @return personaldata
     */
	public function searchPerson( $code )
	{
		try
		{
			if( $code )
			{
				$this->buildUrl( $code );
				$xmlResponse = simplexml_load_string( $this->response() );
				$data = array();

				foreach( $xmlResponse as $personData ) 
				{
					$personInfo 	= (array) $personData->PersonInformation;
					$personnational = (array) $personData->NationalRegistration;
					$personData 	= array_merge( $personInfo, $personnational );
				}

				return $personData;
			}
			else
			{
				throw new ApiException( 'No personal code added.');  
			}
		}
		catch( ApiException $e )  
		{  
			echo $e->getMessage();
		} 
	}
}

// Empty Exception class
class ApiException extends \Exception{};
