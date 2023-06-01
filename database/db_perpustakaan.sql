CREATE DATABASE db_perpustakaan;
USE db_perpustakaan;

CREATE TABLE tb_buku(
id INT(9) AUTO_INCREMENT PRIMARY KEY,
judul VARCHAR(200),
pengarang VARCHAR(100),
penerbit VARCHAR(150),
tahun_terbit VARCHAR(4),
isbn VARCHAR(25),
jumlah_buku INT(3),
lokasi ENUM('Rak1','Rak2','Rak3'),
tanggal_input DATE
);

INSERT INTO tb_buku VALUES
('1',	'100 Kasus Pemrograman C#',				'Kesein Denix',		'C# Programmer',	'2015',	'022653',		'50',	'Rak1',	'2023-01-03'),
('2',	'155 Tips & Trik Populer Microsoft Excel',		'Nujeus Halexen',	'Excel Company',	'2020',	'034907',		'61',	'Rak3',	'2023-01-01'),
('3',	'41 Script PHP Siap Pakai',				'Mendi Jakson',		'PHP Company',		'2018',	'098765',		'100',	'Rak2',	'2023-01-04'),
('4',	'36 Jam Belajar Komputer Microsoft Visual',		'Arya Meduga',		'Visual Classic',	'2022',	'892532',		'20',	'Rak2',	'2023-01-19'),
('5',	'500 Kumpulan Kata Kata Mutiara',			'Kemal Fahlefi',	'Mikaraya',		'2021',	'383728',		'56',	'Rak1',	'2022-09-12')

CREATE TABLE tb_anggota(
nim INT(11) PRIMARY KEY,
nama VARCHAR(100),
tempat_lahir VARCHAR(120),
tanggal_lahir DATE,
jenis_kelamin ENUM('L','P'),
prodi VARCHAR(50)
);

INSERT INTO tb_anggota VALUES
('02022111001',	'Reza',			'Bandung',	'1993-07-19',	'L',	'TI'),
('02022111002',	'Rizal Fahmi',		'Bandung',	'1991-11-20',	'L',	'Sastra'),
('02022111003',	'Yunita Hayatun',	'Subang',	'1995-06-11',	'P',	'Sastra'),
('02022111004',	'Ai Siti',		'Tasikmalaya',	'1992-08-09',	'P',	'Akuntansi'),
('02022111005',	'Isma Hardiyanti',	'Garut',	'1993-08-25',	'P',	'MI'),
('02022111006',	'Mochamad Fahmi',	'Bandung',	'1995-08-21',	'L',	'MI'),
('02022111007',	'Edwin Zulfikar',	'Ciamis',	'1979-02-15',	'L',	'MI'),
('02022111008',	'Taufik Hidayat',	'Bandung',	'1989-05-28',	'L',	'MI'),
('02022111010',	'Vera Aryanti',		'Cimahi',	'1993-12-02',	'P',	'MI'),
('02022111011',	'Dede Dani Ramlan',	'Bandung',	'1994-03-11',	'L',	'MI')

CREATE TABLE tb_transaksi(
id INT(9) AUTO_INCREMENT PRIMARY KEY,
judul VARCHAR(200),
nim INT(11),
nama VARCHAR(100),
tanggal_pinjam VARCHAR(30),
tanggal_kembali VARCHAR(30),
STATUS VARCHAR(100)
);

INSERT INTO tb_transaksi VALUES
('1',	'100 Kasus Pemrograman C#',			'02022111001',	'Reza',			'10-12-2017',	'12-12-2017',	'Pinjam'),
('2',	'155 Tips & Trik Populer Microsoft Excel',	'02022111002',	'Rizal Fahmi',		'13-02-2019',	'15-02-2019',	'Pinjam'),
('3',	'41 Script PHP Siap Pakai',			'02022111003',	'Yunita Hayatun',	'19-01-2023',	'23-01-2023',	'Pinjam'),
('4',	'36 Jam Belajar Komputer Microsoft Visual',	'02022111004',	'Ai Siti',		'20-01-2023',	'25-01-2023',	'Pinjam'),
('5',	'500 Kumpulan Kata Kata Mutiara',		'02022111005',	'Isma Hardiyanti',	'31-12-2022',	'05-01-2023',	'Pinjam'),
('6',	'500 Kumpulan Kata Kata Mutiara',		'02022111006',	'Mochamad Fahmi',	'30-12-2023',	'06-01-2023',	'Pinjam'),
('7',	'41 Script PHP Siap Pakai',			'02022111007',	'Edwin Zulfikar',	'04-01-2023',	'10-01-2023',	'Pinjam'),
('8',	'100 Kasus Pemrograman C#',			'02022111008',	'Taufik Hidayat',	'10-02-2020',	'12-02-2020',	'Pinjam'),
('9',	'155 Tips & Trik Populer Microsoft Excel',	'02022111010',	'Vera Aryanti',		'15-03-2021',	'18-03-2021',	'Pinjam'),
('10',	'100 Kasus Pemrograman C#',			'02022111010',	'Vera Aryanti',		'28-01-2023',	'02-02-2023',	'Pinjam'),
('11',	'155 Tips & Trik Populer Microsoft Excel',	'02022111010',	'Vera Aryanti',		'29-01-2023',	'03-02-2023',	'Pinjam'),
('12',	'41 Script PHP Siap Pakai',			'02022111010',	'Vera Aryanti',		'30-01-2023',	'05-02-2023',	'Pinjam')


CREATE TABLE tb_user(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
pass VARCHAR(20),
nama VARCHAR(50),
LEVEL VARCHAR(40),
foto VARCHAR(200)
);

INSERT INTO tb_user VALUES
('1',	'admin',	'admin',	'admin',	'admin',	'avatar.png')