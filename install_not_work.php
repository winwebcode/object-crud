<?php
require_once config.php;

createTable('klient',
  'family varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  name varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  otestvo varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  telefon varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  birthdate varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  ID_klient int(10) COLLATE utf8_unicode_ci NOT NULL'
  );

createTable('user',
  'login text NOT NULL,
  password text NOT NULL,
  user_id int(11) NOT NULL');

?>