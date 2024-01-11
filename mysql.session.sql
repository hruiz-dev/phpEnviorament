

CREATE TABLE LEKUA (
    pisua TINYINT UNSIGNED,
    gela VARCHAR(15),
    mahaia CHAR(2),
    PRIMARY KEY(pisua, gela, mahaia),
    INDEX(pisua),
    INDEX(gela),
    INDEX(mahaia)
) ENGINE = InnoDB;


CREATE TABLE IKASLEAK (
    kodea SMALLINT UNSIGNED PRIMARY KEY,
    izena VARCHAR(20),
    abizena VARCHAR(40),
    adina TINYINT UNSIGNED,
    irakaslea CHAR(9),
    pisua TINYINT,
    gela VARCHAR(15),
    mahaia CHAR(2) ,
    FOREIGN KEY (irakaslea) REFERENCES IRAKASLEAK(NAN),
    FOREIGN KEY (mahaia) REFERENCES LEKUA(mahaia),
    FOREIGN KEY (pisua) REFERENCES LEKUA(pisua),
    FOREIGN KEY (gela) REFERENCES LEKUA(gela) 
) ENGINE = InnoDB;


CREATE TABLE MATRIKULATU (
    ikaslea SMALLINT UNSIGNED,
    ikasgaia CHAR(4),
    PRIMARY KEY (ikaslea,ikasgaia),
    FOREIGN KEY (ikaslea) REFERENCES IKASLEAK(kodea),
    FOREIGN KEY (ikasgaia) REFERENCES IKASGAIAK(kodea) 
) ENGINE = InnoDB;



INSERT INTO IRAKASLEAK VALUES 
("23456789A", "Ane", "Mendia", "Calle Mayor 10", "Bilbao", 2500.00, 35),
("34567890B", "Jon", "Alkorta", "Avenida Libertad 20", "Donostia", 2200.00, 42),
("45678901C", "Iñaki", "Garmendia", "Calle Nueva 30", "Tolosa", 2300.00, 38),
("56789012D", "Miren", "Arriaga", "Calle Vieja 40", "Pamplona", 2400.00, 29),
("67890123E", "Arantxa", "Etxeberria", "Plaza Euskadi 50", "Bilbao", 2100.00, 47),
("78901234F", "Patxi", "Lopez", "Calle Sol 60", "Donostia", 2050.00, 53),
("89012345G", "Maialen", "Izagirre", "Calle Luna 70", "Tolosa", 2150.00, 31),
("90123456H", "Aitor", "Otxoa", "Calle Estrella 80", "Pamplona", 2250.00, 44),
("01234567J", "Nerea", "Bengoetxea", "Calle Cometa 90", "Bilbao", 2350.00, 36),
("12345678K", "Unai", "Zabala", "Calle Planeta 100", "Donostia", 2450.00, 39);

INSERT INTO IKASGAIAK VALUES 
("M101", "Matemáticas", 1),
("F102", "Física", 2),
("Q103", "Química", 3),
("B104", "Biología", 4),
("G105", "Geografía", 5),
("H106", "Historia", 6),
("L107", "Lengua", 7),
("I108", "Inglés", 8),
("E109", "Euskera", 9),
("A110", "Arte", 10);

INSERT INTO LEKUA VALUES 
(1, "101A", "01"),
(2, "102B", "02"),
(3, "103C", "03"),
(4, "104D", "04"),
(5, "105E", "05"),
(6, "106F", "06"),
(7, "107G", "07"),
(8, "108H", "08"),
(9, "109I", "09"),
(10, "110J", "10");

INSERT INTO IKASLEAK VALUES 
(1001, "Leire", "Martinez", 20, "23456789A", 1, "101A", "01"),
(1002, "Markel", "Gonzalez", 21, "34567890B", 2, "102B", "02"),
(1003, "Uxue", "Fernandez", 22, "45678901C", 3, "103C", "03"),
(1004, "Gorka", "Lopez", 23, "56789012D", 4, "104D", "04"),
(1005, "Amaia", "Sanchez", 24, "67890123E", 5, "105E", "05"),
(1006, "Iker", "Garcia", 25, "78901234F", 6, "106F", "06"),
(1007, "Nahia", "Silva", 26, "89012345G", 7, "107G", "07"),
(1008, "Jon", "Moreno", 27, "90123456H", 8, "108H", "08"),
(1009, "Ainhoa", "Prieto", 28, "01234567J", 9, "109I", "09"),
(1010, "Unax", "Vidal", 29, "12345678K", 10, "110J", "10");

INSERT INTO MATRIKULATU VALUES 
(1001, "M101"),
(1002, "F102"),
(1003, "Q103"),
(1004, "B104"),
(1005, "G105"),
(1006, "H106"),
(1007, "L107"),
(1008, "I108"),
(1009, "E109"),
(1010, "A110");