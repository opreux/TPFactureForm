INSERT INTO client (id, ncli, nom, adresse, localite, cat, compte) VALUES
(1,'B062',	'GOFFIN',	'72, r. de la Gare',	'Namur',	'B2',	-3200.00),
(2,'B112',	'HANSENNE',	'23, r. Dumont',	'Poitiers',	'C1',	1250.00),
(3,'B332',	'MONTI',	'112, r. Neuve',	'Genève',	'B2',	0.00),
(4,'B512',	'GILLET',	'14, r. de l''Eté',	'Toulouse',	'B1',	-8700.00),
(5,'C003',	'AVRON',	'8, ch. de la Cure',	'Toulouse',	'B1',	-1700.00),
(6,'C123',	'MERCIER',	'25, r. Lemaître',	'Namur',	'C1',	-2300.00),
(7,'C400',	'FERARD',	'65, r. du Tertre',	'Poitiers',	'B2',	350.00),
(8,'D063',	'MERCIER',	'201, bvd du Nord',	'Toulouse',	NULL,	-2250.00),
(9,'F010',	'TOUSSAINT',	'5, r. Godefroid',	'Poitiers',	'C1',	0.00),
(10,'F011',	'PONCELET',	'17, Clôs des Erables',	'Toulouse',	'B2',	0.00),
(11,'F400',	'JACOB',	'78, ch. du Moulin',	'Bruxelles',	'C2',	0.00),
(12,'K111',	'VANBIST',	'180, r. Florimont',	'Lille',	'B1',	720.00),
(13,'K729',	'NEUMAN',	'40, r. Bransart',	'Toulouse',	NULL,	0.00),
(14,'L422',	'FRANCK',	'60, r. de Wépion',	'Namur',	'C1',	0.00),
(15,'S127',	'VANDERKA',	'3, av. des Roses',	'Namur',	'C1',	-4580.00),
(16,'S712',	'GUILLAUME',	'14a, ch. des Roses',	'Paris',	'B1',	0.00);

INSERT INTO commande (id, ncom, ncli_id, datecom) VALUES
(1,'30178',	12,	'2015-12-21'),
(2,'30179',	7,	'2015-12-22'),
(3,'30182',	15,	'2015-12-23'),
(4,'30184',	7,	'2015-12-23'),
(5,'30185',	10,	'2016-01-02'),
(6,'30186',	7,	'2016-01-02'),
(7,'30188',	4,	'2016-01-03');

INSERT INTO produit (id,npro, libelle, prix, qstock) VALUES
(1,'CS262',	'CHEV. SAPIN 200x6x2',	75,	45),
(2,'CS264',	'CHEV. SAPIN 200x6x4',	120,	2690),
(3,'CS464',	'CHEV. SAPIN 400x6x4',	220,	450),
(4,'PA45',	'POINTE ACIER 45 (1K)',	105,	580),
(5,'PA60',	'POINTE ACIER 60 (1K)',	95,	134),
(6,'PH222',	'PL. HETRE 200x20x2',	230,	782),
(7,'PS222',	'PL. SAPIN 200x20x2',	185,	1220);


INSERT INTO detail (id, ncom_id, npro_id, qcom) VALUES
(1,1	,	3,	25),
(2,2	,	1,	60),
(3,2	,	5,	20),
(4,3	,	5,	30),
(5,4	,	3,	120),
(6,4	,	4,	20),
(7,5	,	3,	260),
(8,5	,	5,	15),
(9,5	,	7,	600),
(10,6	,	4,	3),
(11,7	,	3,	180),
(12,7	,	4,	22),
(13,7	,	5,	70),
(14,7	,	6,	92);

INSERT INTO "post" ("id", "slug", "title", "excerpt", "content") VALUES
(1,	'post-1',	'Message de début',	'Bonjour',	'Bonjour à tout le monde'),
(2,	'post-2',	'Message de fin',	'Au revoir',	'Au revoir à tous');

