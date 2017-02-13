<?php

namespace App\Src;

use App\Config\Config;

class Member
{
	private $db;

	public function __construct()
	{
		$this->db = new Config;
	}

	public function getAll()
	{
		$query = "SELECT * FROM members WHERE deleted = 1";

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return($stmt->fetchAll($this->db::FETCH_ASSOC));
	}

	public function getDetailMember($id)
	{
		$query = "SELECT * FROM members WHERE id = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return($stmt->fetch($this->db::FETCH_ASSOC));
	}

	public function addMember($librarian_id, $name, $gender, $photo, 
			$date_expired)
	{
		$query = "INSERT INTO members (librarian_id, name, gender, photo, 
			date_expired) VALUES (:librarian_id, :name, :gender, :photo, 
			:date_expired)";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':librarian_id', $librarian_id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':photo', $photo);
		$stmt->bindParam(':date_expired', $date_expired);
		$stmt->execute();

		$this->message = "DATA BERHASIL DITAMBAHKAN";
	}

	public function updateMember($id, $librarian_id, $name, $gender, $photo, 
			$date_expired)
	{
		$query = "UPDATE members SET librarian_id = :librarian_id, 
			name = :name, gender = :gender, date_expired = :date_expired 
			WHERE id = :id";

		if (!empty($photo)) {
			$query1 = "UPDATE members SET photo = :photo WHERE id = :id";
			$stmt = $this->db->prepare($query1);
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':photo', $photo);
			$stmt->execute();
		}

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':librarian_id', $librarian_id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':date_expired', $date_expired);
		$stmt->execute();

		$this->message = "DATA BERHASIL DIUPDATE";
	}

	public function softDeleteMember($id)
	{
		$query = "UPDATE members SET deleted = 0 WHERE id = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$this->message = "DATA BERHASIL DIHAPUS";
	}

	public function hardDeleteMember($id)
	{
		$query = "DELETE FROM members WHERE id = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return($this->message = "DATA BERHASIL DIHAPUS");
	}
}