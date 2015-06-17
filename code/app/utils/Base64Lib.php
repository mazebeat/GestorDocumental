<?php namespace App\Util;

	/**
	 * Class Functions
	 * @package App\Util
	 */
/**
 * Class Base64Lib
 * @package App\Util
 */
Class Base64Lib{
	/**
	 * @type array
	 */
	private $allowedExts;

	function __construct($allowedExts=array("gif","jpeg","jpg","png","txt","pdf","doc","rtf","docx","xls","xlsx")){
		$this->allowedExts=$allowedExts;
	}

	/**
	 * @param string $base64_txtFile
	 * @param string $output_file
	 * @return bool
	 */
	public static function txtToPdf($base64_txtFile='base64pdf.txt',$output_file='test.pdf'){
		$pdf_base64=public_path().$base64_txtFile;

		try{
			if(!\File::isFile($pdf_base64)){
				return false;
			}else{
				if($pdf_base64_handler=fopen($pdf_base64,'r')){
					$pdf_content=fread($pdf_base64_handler,filesize($pdf_base64));
					fclose($pdf_base64_handler);
					$pdf_decoded=base64_decode($pdf_content);
					$pdf=fopen($output_file,'w');
					fwrite($pdf,$pdf_decoded);
					fclose($pdf);

					return true;
				}
			}

			return false;
		}catch(Illuminate\Filesystem\FileNotFoundException $ex){
			return $ex;
		}
	}

	/**
	 * @param string $base64_string
	 * @param string $output_file
	 * @return bool
	 */
	public static function base64ToPdf($base64_string='',$output_file='test.pdf'){
		$pdf_decoded=base64_decode($base64_string);

		try{
			if($pdf=fopen($output_file,'w')){
				fwrite($pdf,$pdf_decoded);
				fclose($pdf);

				return true;
			}

			return false;
		}catch(Illuminate\Filesystem\FileNotFoundException $ex){
			return $ex;
		}
	}

	/**
	 * @param $input_file
	 * @return mixed
	 */
	public static function getMimeType($input_file){
		try{
			if(\File::exists($input_file)){
				return \File::file($input_file)->getMimeType();
			}

			return false;
		}catch(Illuminate\Filesystem\FileNotFoundException $ex){
			return $ex;
		}
	}

	/**
	 * @param $input_file
	 * @return mixed
	 */
	public static function getExtension($input_file){
		try{
			if(\File::exists($input_file)){
				return \File::extension($input_file);
			}

			return false;
		}catch(Illuminate\Filesystem\FileNotFoundException $ex){
			return $ex;
		}
	}

	public static function getRemoteFile($url){
		try{
			$contents=File::getRemote($url);
			if($contents===false){
				return false;
			}

			return $contents;
		}catch(Illuminate\Filesystem\FileNotFoundException $ex){
			return $ex;
		}
	}

	/**
	 * @param $base64_string
	 * @param $output_file
	 * @return bool
	 */
	function base64_to_jpeg($base64_string,$output_file){
		try{
			if($ifp=fopen($output_file,"wb")){

				$data=explode(',',$base64_string);

				fwrite($ifp,base64_decode($data[1]));
				fclose($ifp);

				return true;
			}

			return false;
		}catch(Illuminate\Filesystem\FileNotFoundException $ex){
			return $ex;
		}
	}

	/**
	 * @param $type
	 * @param $file
	 * @return string
	 */
	function getEncodedVideoString($type,$file){
		return 'data:video/'.$type.';base64,'.base64_encode(file_get_contents($file));
	}

	/**
	 * @param $type
	 * @param $file
	 * @return string
	 */
	function getEncodedImageString($type,$file){
		return 'data:image/'.$type.';base64,'.base64_encode(file_get_contents($file));
	}

	/**
	 * @param $type
	 * @param $file
	 * @return string
	 */
	function getEncodedAudioString($type,$file){
		return 'data:audio/'.$type.';base64,'.base64_encode(file_get_contents($file));
	}
}