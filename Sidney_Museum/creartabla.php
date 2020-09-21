<?php 

include"database.php"; 

$conn=$conexion; 

 

if ($conn->connect_error) { 

    die("Connection failed: " . $conn->connect_error); 

}  

 

$sql= "CREATE TABLE `T_Users2` ( 

  `ID` int(11) NOT NULL, 

  `NAME` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL, 

  `TYPE` int(11) NOT NULL, 

  `PASS` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL, 

  `MAIL` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL, 

  `SALT` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL, 

  `DATE` date NOT NULL DEFAULT current_timestamp() 

) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Usernames and Passwords'; 

 

ALTER TABLE `T_Users2` 

  ADD PRIMARY KEY (`ID`), 

  ADD UNIQUE KEY `MAIL` (`MAIL`); 

 

ALTER TABLE `T_Users2` 

  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT 

"; 

 

if ($conn->multi_query($sql) === TRUE) { 

    echo "Users table created."; 

} else { 

    echo "Error creating table: " . $conn->error; 

} 

 

$conn->close(); 

 

?> 