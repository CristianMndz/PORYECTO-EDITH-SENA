<?php

	class Conexion {

		static public function conectar() {

			try {
				$link = new PDO("mysql:host=localhost;dbname=sis_inventario", "root", "");
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar errores en PDO
				$link->exec("set names utf8");

				return $link;

			} catch (PDOException $e) {
				die("ERROR DE CONEXIÓN: " . $e->getMessage());
			}
		}
	}
