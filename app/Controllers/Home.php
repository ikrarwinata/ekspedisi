<?php

namespace App\Controllers;

use App\Models\Admin_model;
use App\Models\Kurir_model;
class Home extends BaseController
{
    protected $maxLoginAttemps = 3;
    protected $maxCaptchaAttemps = 3;
	
	protected function onLoad(){
	}
	
	public function index($rdr = NULL)
	{
		$rdr = ($rdr == NULL ? urldecode($this->request->getGetPost("redirect")) : urldecode($rdr));
		if($rdr!=NULL){
			return redirect()->to("/".base64_decode($rdr));
		}

		return $this->login();
	}

	public function isBlocked()
	{
		if (session()->has("isBlocked")) {
			if ((session('blockTime') + session('blockTimeout')) <= strtotime("now")) {
				session()->remove("captchaAttemps");
				session()->remove("isBlocked");
				session()->remove("blockTime");
				session()->remove("blockTimeout");
				return FALSE;
			} else {
				view("blocked");
				return TRUE;
			}
		}

		return FALSE;
	}

	protected function loginAttemps()
	{
		$result = 0;
		if (session()->has("loginAttemps")) $result = session("loginAttemps");
		if ($result == NULL || $result <= 0) $result = 0;
		return $result;
	}

	protected function captchaAttemps()
	{
		$result = 0;
		if (session()->has("captchaAttemps")) $result = session("captchaAttemps");
		if ($result == NULL || $result <= 0) $result = 0;
		return $result;
	}

	public function login()
	{
		if ($this->isBlocked()) return FALSE;
		if ($this->captchaAttemps() > $this->maxCaptchaAttemps) {
			return $this->blockIp();
		}
		if ($this->loginAttemps() > $this->maxLoginAttemps) {
			return $this->reCaptcha();
		}
		$username = $this->request->getPost('pos_username');
		if ($username != NULL) {
			$kurirM = new Kurir_model();
			$adminM = new Admin_model();
			$res = $kurirM->getRowBy("username", $username);
			$res2 = $adminM->getRowBy("username", $username);
			$res3 = $superadminM->getRowBy("username", $username);
			if ($res) {
				$data = [
					"login" => $res->username,
					"login_name" => $res->nama,
					"loginAttemps" => 0,
				];
				session()->set($data);
				return view("login_password");
			} else if ($res2) {
				$data = [
					"login" => $res2->username,
					"login_name" => $res2->nama,
					"loginAttemps" => 0,
				];
				session()->set($data);
				return view("login_password");
			} else if ($res3) {
				$data = [
					"login" => $res3->username,
					"login_name" => $res3->nama,
					"loginAttemps" => 0,
				];
				session()->set($data);
				return view("login_password");
			} else {
				session()->setFlashdata('ci_login_flash_message', "Upsss.... username tidak ditemukan");
				session()->setFlashdata('ci_login_flash_message_type', "text-danger");
			}
			session()->set("loginAttemps", $this->loginAttemps() + 1);
			if ($this->loginAttemps() >= $this->maxLoginAttemps) return $this->reCaptcha();
		};
		return view("login");
	}

	public function login_auth()
	{
		if (!session()->has("login")) return $this->login();
		if ($this->isBlocked()) return FALSE;
		if ($this->captchaAttemps() >= $this->maxCaptchaAttemps) return $this->blockIp();
		if ($this->loginAttemps() > $this->maxLoginAttemps) return $this->reCaptcha();
		$password = $this->request->getPost('pos_password');

		if ($password != NULL) {
			$kurirM = new Kurir_model();
			$adminM = new Admin_model();
			$kurir = $kurirM->where(['username' => session("login"), 'password' => md5($password)])->first();
			$admin = $adminM->where(['username' => session("login"), 'password' => md5($password)])->first();
			$superadmin = $superadminM->where(['username' => session("login"), 'password' => md5($password)])->first();
			if ($kurir) {
				session()->set("loginAttemps", 0);
				$sessData = [];
				$sessData["level"] = "kurir";
				foreach ($kurir as $key => $value) {
					$sessData[$key] = $value;
				}
				session()->set($sessData);
				return redirect()->to("/kurir/Dashboard");
			} else if ($admin) {
				session()->set("loginAttemps", 0);
				$sessData = [];
				$sessData["level"] = "administrator";
				foreach ($admin as $key => $value) {
					$sessData[$key] = $value;
				}
				session()->set($sessData);
				return redirect()->to("/administrator/Dashboard");
			} else if ($superadmin) {
				session()->set("loginAttemps", 0);
				$sessData = [];
				$sessData["level"] = "superadministrator";
				foreach ($superadmin as $key => $value) {
					$sessData[$key] = $value;
				};
				session()->set($sessData);
				return redirect()->to("/superadministrator/Dashboard");
			} else {
				session()->setFlashdata('ci_password_flash_message', "Passowrd yang anda masukan salah");
				session()->setFlashdata('ci_password_flash_message_type', 'text-danger');
			}
			session()->set("loginAttemps", $this->loginAttemps() + 1);
			if ($this->loginAttemps() >= $this->maxLoginAttemps) return $this->reCaptcha();
		};
		return view("login_password");
	}

	public function reCaptcha()
	{
		if ($this->captchaAttemps() >= $this->maxCaptchaAttemps) return $this->blockIp();
		$captchainput = $this->request->getPost('captcha');
		if ($captchainput != NULL) {
			$captchainput = str_replace(" ", "", $captchainput);
			if ($captchainput == session("captcha")) {
				session()->set("loginAttemps", 0);
				session()->set("captchaAttemps", $this->captchaAttemps() + 1);
				session()->remove("captcha");
				return redirect()->to('/Home/login');
			}
		}
		$randText = "";
		for ($i = 0; $i < 4; $i++) {
			$type = mt_rand(1, 4);
			switch ($type) {
				case 1:
					$randText .= mt_rand(0, 9); // Angka
					break;
				case 2:
					$randText .= chr(mt_rand(65, 90)); // Alfabet
					break;
				case 3:
					$randText .= chr(mt_rand(97, 122)); // Kapital Alfabet
					break;
				case 4:
					$randText .= chr(mt_rand(65, 90)); // Alfabet
					break;
				default:
					$randText .= mt_rand(0, 9); // Angka
					break;
			}
		}
		session()->set("captcha", $randText);
		return view("captcha");
	}

	public function captchaImage()
	{
		$captchaText = str_split(session("captcha"), 1);
		$imgHeight = 80;
		$imgWidth = 274;
		$listFont = [
			'fonts/EVAGR.5ANDE.otf',
			'fonts/ThanksBunnyFree.otf',
		];

		$baseImg = imagecreate($imgWidth, $imgHeight);
		imagecolorallocate($baseImg, 69, 179, 157); // base color

		$bgR = mt_rand(100, 180);
		$bgG = mt_rand(100, 180);
		$bgB = mt_rand(100, 180);
		$R = abs(255 - $bgR);
		$G = abs(255 - $bgG);
		$B = abs(255 - $bgB);
		$noise_color = imagecolorallocate($baseImg, $R, $G, $B);
		for ($i = 0; $i < ($imgWidth * $imgHeight) / 3; $i++) {
			imagefilledellipse($baseImg, mt_rand(0, $imgWidth), mt_rand(0, $imgHeight), 3, rand(2, 5), $noise_color);
		}
		imagecolorallocate($baseImg, 240, 240, 240); // overlay
		$maxTol = mt_rand(-75, 75);
		$minTol = 35;
		if ($maxTol >= 0) {
			if ($maxTol <= $minTol) $maxTol = $minTol;
		} else {
			if ($maxTol >= ($minTol * -1)) $maxTol = $minTol * -1;
		}
		$R += $maxTol;
		$G += $maxTol;
		$B += $maxTol;
		$textColor = imagecolorallocate($baseImg, $R, $G, $B);
		$font = $listFont[mt_rand(0, (count($listFont) - 1))];
		$lastX = mt_rand(23, 33);
		foreach ($captchaText as $key => $value) {
			$fontSize = mt_rand(27, 34);
			$angle = mt_rand(-40, 40);
			$lastX += abs($angle) * 0.30;
			imagefttext($baseImg, $fontSize, $angle, $lastX, mt_rand(45, 67), $textColor, $font, $value);
			$lastX += $fontSize + mt_rand(15, 30);
		}
		header("Content-type: image/png");
		imagepng($baseImg);
		imagedestroy($baseImg);
	}

	private function blockIp()
	{
		if (session("isBlocked") <> '') {
			if (session('blockTime') != NULL && session('blockTimeout') != NULL) {
				$this->clearSession();
				return $this->login();
			}
		}
		session()->set("captchaAttemps", 0);
		session()->set("isBlocked", $this->input->ip_address());
		session()->set("blockTime", strtotime("now"));
		session()->set("blockTimeout", 21600);
		session()->remove("captcha");
		$this->clearSession();
		return $this->login();
	}

	private function clearSession()
	{
		session()->remove("login");
		session()->remove("login_name");
		session()->remove("level");
		$kurirM = new Kurir_model();
		$adminM = new Admin_model();
		session()->remove($kurirM->getFields());
		session()->remove($adminM->getFields());
		return TRUE;
	}

	public function logout()
	{
		$this->clearSession();
		return redirect()->to("/Home/login");
	}
}
