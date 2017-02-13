<?php

namespace App\Src;

use App\Config\Config;

class Librarian
{
	private $db;
	public $message;

	public function __construct()
	{
		$this->db = new Config();
	}

	public function is_login()
	{
		if (isset($_SESSION['login'])) {
			return true;
		}

	}

	public function login($uname, $pass)
	{
		$query = "SELECT id, user_id, name, username, password FROM librarian 
			WHERE username = :username";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':username', $uname);
		$stmt->execute();
		$row = $stmt->fetch($this->db::FETCH_ASSOC);

		if ($stmt->rowCount() > 0) {
			if ($row['username'] == $uname && $row['password'] == $pass) {

				$_SESSION['login'] = [
					'id'		=>	$row['id'],
					'user_id'	=>	$row['user_id'],
					'username' 	=>	$row['username'],
				];

				header('Location: ../');

			} else {
				$this->message = "MOHON MAAF, PASSWORD SALAH";
			}
		} else {
			$this->message = "MOHON MAAF, USERNAME BELUM TERDAFTAR";
		}
	}

	public function addLibrarian($name, $gender, $username, $password, 
			$phone_number, $address)
	{
		$query = "INSERT INTO librarian (name, gender, username, password, 
			phone_number, address) VALUES (:name, :username, :password, 
			:phone_number, :address)";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':phone_number', $phone_number);
		$stmt->bindParam(':address', $address);
		$stmt->execute();

		$this->message = "DATA BERHASIL DITAMBAHKAN";
	}

	public function updateLibrarian($id, $name, $gender, $username, $password, 
			$phone_number, $address)
	{
		$query = "UPDATE librarian SET name = :name, gender = :gender, 
			username = :username, password = :password, 
			phone_number = :phone_number, address = :address WHERE id = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':phone_number', $phone_number);
		$stmt->bindParam(':address', $address);
		$stmt->execute();

		$this->message = "DATA BERHASIL DIUPDATE";
	}

	public function softDeleteLib($id)
	{
		$query = "UPDATE librarian SET deleted = 0 WHERE id = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$this->message = "DATA BERHASIL DIHAPUS";
	}

	public function hardDeleteLib($id)
	{
		$query = "DELETE FROM librarian WHERE id = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $this->message = "DATA BERHASIL DIHAPUS";
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
		unset($_SESSION['login']);
		return true;
	}
}