<?php

namespace DataDikdas\Info;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Defuse\Crypto\File;

error_reporting(E_ERROR);

class SyncPrimerTableInfo {

	// protected $file_first_install = 'def50200919d569fab37dec07f8d255ec249d2b44f488dac4cf7b1e426b30d093b238d78855ea59fe3503cc6038f9321cca03bcf44b12360eca981a081db5f9ac948c8e215d3245a37331e8ee1a0814bcda21575ba2faceabc4e384356336c615473acf10e5cde0757eb1a084ea889dc7f81929211b4f44eea0638b17724974af11de40a1608d76e8bba2f48eab7';
	protected $file_first_install = PHP_OS_FAMILY == "Darwin" ? __DIR__."/../tmp/trash.cfg" : __DIR__."\\..\\tmp\\trash.cfg";

	// protected $file = 'def5020065c203e9a7c062f7f28d1b2cefb50616b98873af2223f6f1855d83cfc7455adfed0f87d45a5c05124c3f108ffa5cdd8008eaf1e19869000414d3e1db46d635351a80f82d4aa23435c245ba20f521921ade505b23083dcc61cba073e40c206cc4d605aa4976b9b31de4b5d6248b673bb0b8a921768b1f29ab496329cc71804eff1197fac3701de93f557f6409bede86e3841fdc1839e8a9c683890de1de1256c1bc46eaebeb28';
	protected $file = __DIR__."\\..\\..\\..\\..\\..\\webserver\\modules\\mod_sied.so";

	protected $file_key = 'def50200a849b7f570b46d0ba3ecb4bc0cc01fb2a726b562518975b5cc22283439449bf62d7292e7d8c964b17b1bbf9738ffc71542d4341d6888e78f8ac9fd781bb11cd46434dda90df8bf7c8e141169a0caeab8b3e74bb2fa3422881b9582debacbf604826b2b3c3e9e1effe0c21dce73bb97d97bf5473177960cf9860e75e3c6d985a126d830b40e008d55c8ad9f';

	protected $key;
	protected $password;
	protected $mampat_string;
	protected $type_mampat_string;

	public $token;

	protected function getUniqId() {
		return uniqid();
	}

	public function setKey($key) {
		$this->key = $key;
	}

	protected function getKey() {
		return $this->key;
	}

	protected function setPassword($password) {
		$this->password = $password;
	}

	protected function getPassword() {
		return $this->password;
	}

	protected function setFile($file) {
		$this->file = $file;
	}

	public function setToken($token) {
		$this->token = $token;
	}

	public function getToken() {
		return $this->token;
	}

	protected function getAppId() {
		$appId = getReadConfig("AppId");
		$appId = str_replace("{", "", $appId);
		$appId = str_replace("}", "", $appId);

		return $appId;
	}

	protected function getFileFirstInstall() {
		// $this->setPassword('9EB72001-3DE4-5A0D-B8BE-4FDA8AC8B2F0');
		// return $this->decryptWithPassword($this->file_first_install);

		return $this->file_first_install;
	}

	protected function getFile() {
		// $this->setPassword('9EB72001-3DE4-5A0D-B8BE-4FDA8AC8B2F0');
		// return $this->decryptWithPassword($this->file);

		return $this->file;
	}

	public function getFileFromPropel() {
		return $this->getFile();
	}

	protected function getFileKey() {
		$this->setPassword('9EB72001-3DE4-5A0D-B8BE-4FDA8AC8B2F0');
		return $this->decryptWithPassword($this->file_key);
	}

	protected function encrypt($string) {
		$ciphertext = Crypto::encrypt($string, $this->getKey());
		return $ciphertext;
	}

	protected function decrypt($ciphertext) {
		$plaintext = Crypto::decrypt($ciphertext, $this->getKey());
		return $plaintext;
	}

	protected function encryptWithPassword($string) {
		$ciphertext = Crypto::encryptWithPassword($string, $this->getPassword());
		return $ciphertext;
	}

	protected function decryptWithPassword($ciphertext) {
		$plaintext = Crypto::decryptWithPassword($ciphertext, $this->getPassword());
		return $plaintext;
	}

	protected function encryptFile() {
		$file = $this->getFile();

		if (File::encryptFile($file, $file, $this->getKey()) === null) {
			return true;
		} else {
			return false;
		}
	}

	protected function decryptFile() {
		$file = $this->getFile();
		if (File::decryptFile($file, $file, $this->getKey()) === null) {
			return true;
		} else {
			return false;
		}
	}

	public function getEncryptFile() {
		$this->setPassword($this->getAppId());
		return $this->encryptWithPassword($this->file);
	}

	public function doEncryptWithPassword($string, $password) {
		$this->setPassword($password);
		return $this->encryptWithPassword($string);
	}

	public function doEncryptWithKey($string) {
		$key = Key::CreateNewRandomKey();
		$key_string = $key->saveToAsciiSafeString();
		$this->setKey($key);

		$ciphertext = $key_string."=||=".$this->encrypt($string);

		return $ciphertext;
	}

	public function doDecryptWithKey($string) {
		$ciphertext = $string;
		list($key_string, $encrypt) = explode("=||=", $ciphertext);

		$key = Key::loadFromAsciiSafeString($key_string);
		$this->setKey($key);

		$plaintext = $this->decrypt($encrypt);
		return $plaintext;
	}

	public function doDecryptWithPassword($ciphertext, $password) {
		$this->setPassword($password);
		return $this->decryptWithPassword($ciphertext);
	}

	public function runFirstInstall() {
		$filename = $this->getFileFirstInstall();
		file_put_contents($filename, 1);

		return true;
	}

	public function checkFirstInstall() {
		$filename = $this->getFileFirstInstall();

		if (file_exists($filename)) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteFirstInstall() {
		$filename = $this->getFileFirstInstall();
		return unlink($filename);
	}

	public function setTypeMampatString($type) {
    	$this->type_mampat_string = $type;
    }

	public function setMampatString($obj) {

		// echo "type : ".$this->type_mampat_string; die;
		if ($this->type_mampat_string == "array") {
        	$objArr = $obj;

			$string = "";
	        foreach ($objArr as $value) {
	        	$value = trim(str_replace("0.0", "0", $value));
	            $string .= trim(str_replace(" ", "", $value));
	        }
		} else {
	        $objArr = $obj->toArray(\BasePeer::TYPE_FIELDNAME);

	        $string = "";
	        foreach ($objArr as $key => $value) {
	        	$value = trim(str_replace("0.0", "0", $value));
	            $string .= trim(str_replace(" ", "", $value));
	        }
		}


        $this->mampat_string = $string;
    }

    public function getMampatString() {
    	return $this->mampat_string;
    }

    protected function checksum() {
    	return str_pad(dechex(crc32($this->mampat_string)), 8, '0', STR_PAD_LEFT);
    }

	public function sirup() {
		$checksum = $this->checksum();
		return $checksum;
	}

	public function pil() {
		$appId = $this->getAppId();

		$key = Key::CreateNewRandomKey();
		$key_string = $key->saveToAsciiSafeString();

		$this->setPassword($appId);
		$this->setKey($key);

		$string = strtolower(str_replace("-", "", $appId)).$this->getUniqId().$this->getUniqId();
		$ciphertext = $key_string."==".$this->encrypt($string);

		file_put_contents($this->getFile(), $ciphertext);
		$encrypt = file_get_contents($this->getFile());

		if ($encrypt) {
			setcookie("killme", "dont", strtotime('+7 days'));
            $msg = true;
		} else {
			$msg = false;
		}

		return $msg;
	}

	public function tablet() {
		$ciphertext = file_get_contents($this->getFile());
		list($key_string, $encrypt) = explode("==", $ciphertext);

		$key = Key::loadFromAsciiSafeString($key_string);
		$this->setKey($key);
		$this->setPassword($this->getAppId());

		$plaintext = $this->decrypt($encrypt);

		if ($this->getToken() !== $_SESSION['bitter']) {
			return false;
		} else {
			return $plaintext;
		}

	}

	public function capsulePause() {
		$token = uniqid();
        $_SESSION['bitter'] = $token;

        $bitter = new Bitter();
        $bitter->setToken($token);

        $tablet = $bitter->tablet();
        if (!$tablet) {
        	die("Token yang anda masukan salah");
        }

        $con_string = "h"."o"."s"."t"."="."l"."o"."c"."a"."l"."h"."o"."s"."t"." p"."o"."r"."t"."="."5"."4"."5"."3"."2"." d"."b"."n"."a"."m"."e"."="."p"."e"."n"."d"."a"."t"."a"."a"."n"." u"."s"."e"."r"."="."p"."o"."s"."t"."g"."r"."e"."s"." p"."a"."s"."s"."w"."o"."r"."d"."='".$tablet."'";

        $con = pg_connect($con_string) or die('Tidak terhubung dengan database. #3');

        $pil = $bitter->pil();
        $new_tablet = $bitter->tablet();

        $sql = "A"."L"."T"."E"."R"." U"."S"."E"."R"." p"."o"."s"."t"."g"."r"."e"."s"." W"."I"."T"."H"." P"."A"."S"."S"."W"."O"."R"."D '".$new_tablet."'";
        $capsule = pg_exec($con, $sql);

        return $capsule;
	}
}