<?php
$url_web = $_SERVER['HTTP_HOST'];
if ($url_web == 'crm.cilaf.vn') {
	# code...
} else {
}



// --------------------------------------------------
switch ($components) {

	case "khachhang":
		require_once CONTROLS . "khachhang.php";
		break;
	case "CCV":
		require_once CONTROLS . "CCV.php";
		break;
	case "DangNhap":
		require_once CONTROLS . "dangnhap.php";
		break;
	default:
		if (isset($_POST['submit_login'])) {
			$msdn = $_POST['msdn'];
			$matkhau = $_POST['matkhau'];
			if (count(_check_matkhau($msdn, $matkhau)) == 1) {
				foreach (_check_matkhau($msdn, $matkhau) as $r) {
					$msdv = $r->msdv;
					$tendv = $r->tendv;
					$hoten = $r->hoten;
					$loainv = $r->loainv;
					setcookie("msdv", $msdv, time() + 30758400, "/");
					setcookie("tendv", $tendv, time() + 30758400, "/");
					setcookie("hoten", $hoten, time() + 30758400, "/");
					setcookie("msdn", $msdn, time() + 30758400, "/");
					setcookie("loainv", $loainv, time() + 30758400, "/");
					header('Location:index.html');
				}
			}
		}

		$filename = "home";
		break;
}
