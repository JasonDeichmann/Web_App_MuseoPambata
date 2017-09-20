ALTER TABLE `ARTIFACTS` AUTO_INCREMENT = 1;
INSERT INTO `ARTIFACTS` 
VALUES

(NULL, 'Miniature Cathedral',           1,  1,  3,  2,     '2002-11-11 11:23:00', 'Miniature version of Quiapo Church', 
'uploads/simbahan.jpg'),

(NULL, 'Old Train',                     1,  1,  4,  2,     '2002-10-11 13:13:11', 'Old trains travelling through Manila circa 1910', 
'uploads/oldtrain.jpg'),

(NULL, 'Bayani Telephones',             2,  1,  2,  1,     '2011-09-11 11:16:11', 'Telephones where bayani answer the phones', 
'uploads/telepono.jpg'),

(NULL, 'Nose Sculpture',                3,  1,  7,  1,     '2011-06-11 09:11:11', 'A sculpture of a nose', 
'uploads/nosesclp.jpg'),

(NULL, 'Butt Sculpture',                3,  1,  7,  1,     '2007-03-11 11:55:11', 'A sculpture of a butt', 
'uploads/buttsclp.jpg'),

(NULL, 'Intestine Maze',                1,  1,  5,  1,     '2009-11-11 15:11:11', 'A big maze that looks like an intestine track', 
'uploads/lginsclp.jpg'),

(NULL, 'Banana',                        3,  1,  7,  4,     '2012-12-11 10:11:11', 'Plastic version of the banana fruit', 
'uploads/bananaoj.jpg'),

(NULL, 'Cabbage',                       2,  1,  6,  4,     '2012-10-11 16:19:11', 'Plastic version of the cabbage fruit', 
'uploads/cabbageo.jpg'),

(NULL, 'Carrot',                        1,  1,  6,  4,     '2013-04-11 18:22:11', 'Plastic version of the carrot fruit', 
'uploads/carrotoj.jpg'),

(NULL, 'Corn',                          1,  1,  6,  4,     '2011-02-11 09:11:11', 'Plastic version of the corn fruit', 
'uploads/cornobjt.jpg'),

(NULL, 'Shark',                         1,  1,  1,  4,     '2011-10-11 11:55:11', 'A sculpture of the great white shark', 
'uploads/sharkscp.png'),

(NULL, 'Turtle',                        1,  1,  1,  4,     '2010-11-11 11:45:11', 'A sculpture of a sea turtle',
'uploads/turtlscp.png'),

(NULL, 'Volcano',                       2,  1,  1,  1,     '2011-11-11 16:11:11', 'A sculpture of an active volcano', 
'uploads/vulcansc.png'),

(NULL, 'Windmill',                      3,  1,  7,  2,     '2011-08-11 17:11:11', 'A sculpture of an energy-absorbing windmill', 
'uploads/wndmllsc.png'),

(NULL, 'Chinese Dolls',                 1,  1,  6,  3,     '2005-07-11 13:30:11', 'A collection of antique Chinese Dolls circa 1600', 
'uploads/chidolls.png'),

(NULL, 'Chopsticks',                    1,  1,  6,  3,     '2011-10-11 13:11:11', 'A collection of antique Chinese Chopsticks', 
'uploads/chostxoj.png'),

(NULL, 'Manila: Then and Now Images',   2,  1,  2,  1,     '1999-06-11 14:11:11', 'Images of Manila landmarks now compared to 1900 images', 
'uploads/mnlnwthi.png'),

(NULL, 'Child Artist Paintings' ,       1,  1,  2,  1,     '2000-02-11 12:59:11', 'Paintings of participating children', 
'uploads/atabspnt.png'),

(NULL, 'Roxo Corona Paintings',         1,  1,  3,  2,     '2001-01-11 11:11:11', 'A collection of Roxo Corona Paintings', 
'uploads/coronapn.png'),

(NULL, 'Marc Cosico Paintings',         1,  1,  3,  2,     '2002-01-11 11:23:24', 'A collection of Marc Cosico Paintings', 
'uploads/cosicopn.png');


-- Note
-- On Display: 1, 2, 4, 5, 9, 10, 11, 12, 14, 15, 16, 19
-- Stashed: 3, 8, 13, 17
-- Deaccession: 6, 7, 18, 20


---------------------------------------------------------------------------------------------------------------------------------------------
ALTER TABLE `FORMS` AUTO_INCREMENT = 1;
INSERT INTO `FORMS`
VALUES

(NULL, 1,  'Stephane Shrock',           '2002-11-11 11:23:00', 'uploads/artifact1form.docx'),

(NULL, 2,  'KAYA FC Inc.',              '2002-10-11 13:13:11', 'uploads/artifact2form.docx'),

(NULL, 3,  'Museo Pambata',             '2011-09-11 11:16:11', 'uploads/artifact3form.docx'),

(NULL, 4,  'Museo Pambata',             '2011-06-11 09:11:11', 'uploads/artifact4form.docx'),

(NULL, 5,  'Museo Pambata',             '2007-03-11 11:55:11', 'uploads/artifact5form.docx'),

(NULL, 6,  'Museo Pambata',             '2009-11-11 15:11:11', 'uploads/artifact6form.docx'),

(NULL, 7,  'Andrea Pirlo',              '2012-12-11 10:11:11', 'uploads/artifact7form.docx'),

(NULL, 8,  'Internazionale FC Inc.',    '2012-10-11 16:19:11', 'uploads/artifact8form.docx'),

(NULL, 9,  'AC Milan Inc.',             '2013-04-11 18:22:11', 'uploads/artifact9form.docx'),

(NULL, 10, 'Salford City Co.',          '2011-02-11 09:11:11', 'uploads/artifact10form.docx'),

(NULL, 11, 'Guillermo Varela',          '2011-10-11 11:55:11', 'uploads/artifact11form.docx'),

(NULL, 12, 'James Rodriguez',           '2010-11-11 11:45:11', 'uploads/artifact12form.docx'),

(NULL, 13, 'Museo Pambata',             '2011-11-11 16:11:11', 'uploads/artifact13form.docx'),

(NULL, 14, 'Museo Pambata',             '2011-08-11 17:11:11', 'uploads/artifact14form.docx'),

(NULL, 15, 'Chiansu Suning FC Inc.',    '2005-07-11 13:30:11', 'uploads/artifact15form.docx'),

(NULL, 16, 'Guanzu Evergrande Co.',     '2011-10-11 13:11:11', 'uploads/artifact16form.docx'),

(NULL, 17, 'Museo Pambata',             '1999-06-11 14:11:11', 'uploads/artifact17form.docx'),

(NULL, 18, 'Museo Pambata',             '2000-02-11 12:59:11', 'uploads/artifact18form.docx'),

(NULL, 19, 'David Silva',               '2001-01-11 11:11:11', 'uploads/artifact19form.docx'),

(NULL, 20, 'Wayne Rooney',              '2002-01-11 11:23:24', 'uploads/artifact20form.docx');


---------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `DEACCESSION`
VALUES

(4,  '2017-05-17 11:00:00', 'Requested for donation to the Benguet Museum',  1, 'Donated on 2017-05-17 11:00:00'),

(5,  '2017-05-17 11:00:00', 'Reason for Disposal',                           3, 'Price: P2000.00 - Sold on 2017-05-17 11:00:00'),

(7,  '2017-05-17 11:00:00', 'Purchased by Benguet Museum',                   3, 'Price: P20.00 - Sold on 2017-05-17 11:00:00'),

(14, '2017-01-01 12:30:30', 'Owner asked for the artifact to be returned',   4, 'Returned on 2017-01-01 12:30:30');


---------------------------------------------------------------------------------------------------------------------------------------------
ALTER TABLE `TAGS` AUTO_INCREMENT = 1;
INSERT INTO `TAGS`
VALUES

(NULL, 'Painting'),

(NULL, 'Woodworking'),

(NULL, 'Fiber Glass'),

(NULL, 'Metal Work'),

(NULL, 'Pottery'),

(NULL, 'Electrical'),

(NULL, 'Sculpture'),

(NULL, 'Tailoring'),

(NULL, 'Mechanical'),

(NULL, 'Lighting'),

(NULL, 'Picture'),

(NULL, 'Glass Work'),

(NULL, 'Graphic Designing'),

(NULL, '3D Printing'),

(NULL, 'Glass Art'),

(NULL, 'Rubber Work'),

(NULL, 'Magnetic Film'),

(NULL, 'Engraving'),

(NULL, 'Flame Work'),

(NULL, 'Gardening');


---------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `ARTIFACTTAGS`
VALUES

(1, 1),  (2, 1),  (4, 1), (6, 1), (10, 1), (12, 1), (15, 1), (18, 1),

(1, 2),  (2, 2),  (4, 2), (10, 2),

(1, 3),  (6, 3),  (9, 3),

(1, 4),  (4, 4),  (7, 4), (16, 4), (18, 4),

(1, 5),  (4, 5),  (7, 5), (16, 5), (18, 5),

(1, 6),  (4, 6),  (6, 6), (7, 6), (10, 6), (16, 6), (18, 6),

(1, 7),  (14, 7),

(1, 8),  (14, 8),

(1, 9),  (14, 9),

(1, 10), (14, 10),

(1, 11), (4, 11), (7, 11), (16, 11), (18, 11),

(1, 12), (4, 12), (7, 12), (16, 12), (18, 12),

(1, 13), (4, 13), (6, 13), (7, 13), (9, 13), (10, 13), (16, 13), (18, 13),

(1, 14), (2, 14), (4, 14), (9, 14), 

(8, 15),

(2, 16), (4, 16), (5, 16), (18, 16),

(2, 17), (4, 17), (9, 17), (11, 17), (12, 17), (18, 17),

(1, 18), (2, 18), (9, 18), (12, 18), 

(1, 19), (2, 19), (9, 19), (12, 19), 

(1, 20), (2, 20), (9, 20), (12, 20);

---------------------------------------------------------------------------------------------------------------------------------------------
ALTER TABLE `EMPLOYEES` AUTO_INCREMENT = 1;
INSERT INTO `EMPLOYEES`
VALUES

(NULL, 'Vince McMahon',     1, '9999-01-01 09:00:00', '9999-01-01 17:00:00', '09123456789', 'vince_daboss@hotmail.com.eut'),

(NULL, 'John Cena',         2, '9999-01-01 09:00:00', '9999-01-01 13:00:00', '09123456789', 'word_is_life@hotmail.com.eut'),

(NULL, 'Roman Reigns',      2, '9999-01-01 09:00:00', '9999-01-01 13:00:00', '09123456789', 'bigdog69@hotmail.com.eut'),

(NULL, 'Dwayne Johnson',    2, '9999-01-01 12:00:00', '9999-01-01 17:00:00', '09123456789', 'therock_brahmabull@hotmail.com.eut'),

(NULL, 'Steve Austin',      2, '9999-01-01 12:00:00', '9999-01-01 17:00:00', '09123456789', 'asswhoopping316@hotmail.com.eut'),

(NULL, 'Hulk Hogan',        2, '9999-01-01 12:00:00', '9999-01-01 17:00:00', '09123456789', 'therealamerican666@hotmail.com.eut'),

(NULL, 'Hunter Helmsley',   3, '9999-01-01 09:00:00', '9999-01-01 17:00:00', '09123456789', 'the_game@hotmail.com.eut'),

(NULL, 'Shawn Michaels',    4, '9999-01-01 09:00:00', '9999-01-01 13:00:00', '09123456789', 'the_sexy_boy@hotmail.com.eut'),

(NULL, 'Chyna Helmsley',    4, '9999-01-01 12:00:00', '9999-01-01 17:00:00', '09123456789', 'chingchong@hotmail.com.eut'),

(NULL, 'Stephanie McMahon', 4, '9999-01-01 12:00:00', '9999-01-01 17:00:00', '09123456789', 'game_player@hotmail.com.eut');


---------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `EMPLOYEETAGS`
VALUES

(1, 2),     (8, 2),     (9, 2),     (14, 2),    (19, 2), 

(2, 3),     (3, 3),     (4, 3),     (5, 3),     (20, 3), 

(6, 4),     (7, 4),     (10, 4),    (11, 4),    (12, 4), 

(1, 5),     (6, 5),     (16, 5),    (17, 5),    (18, 5), 

(2, 6),     (11, 6),    (13, 6),    (15, 6),    (18, 6);


---------------------------------------------------------------------------------------------------------------------------------------------
ALTER TABLE `ACCOUNTS` AUTO_INCREMENT = 1;
INSERT INTO `ACCOUNTS`
VALUES

(1, 'admin',         'admin',            1),

(2, 'user',         'user',       2),

(3, 'bigdog69',             'theshield4ever',   2),

(4, 'therock_brahmabull',   't00thfairy',       2),

(5, 'asswhoopping316',      'theringmast3r',    2),

(6, 'therealamerican',      'ihat3nigg4s',      2),

(7, 'maintenance',             'maintenance',        3);


---------------------------------------------------------------------------------------------------------------------------------------------
ALTER TABLE `OUTSOURCING` AUTO_INCREMENT = 1;
INSERT INTO `OUTSOURCING`
VALUES

(1, 'Deichmenn Industries'),

(2, 'Harambebe Trading Company'),

(3, 'Bayong Incorporated'),

(4, 'Keintite Corporation'),

(5, 'FSM Corporation');


---------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `OUTSOURCINGTAGS`
VALUES

(1, 1),     (8, 1),     (9, 1),     (14, 1),    (19, 1), 

(1, 2),     (8, 2),     (9, 2),     (14, 2),    (19, 2), 

(2, 3),     (3, 3),     (4, 3),     (5, 3),     (20, 3), 

(6, 4),     (7, 4),     (10, 4),    (11, 4),    (12, 4), 

(1, 5),     (6, 5),     (16, 5),    (17, 5),    (18, 5);


---------------------------------------------------------------------------------------------------------------------------------------------
ALTER TABLE `REPAIRSCHEDULES` AUTO_INCREMENT = 1;
INSERT INTO `REPAIRSCHEDULES`
VALUES

(NULL, 1, 1, '2017-08-14 09:00:00', '2017-08-15 18:00:00', 'Broken glass',           NULL, 1, 2),

(NULL, 2, 1, '2017-08-14 09:00:00', '2017-08-21 18:00:00', 'Seat has a hole',        NULL, 2, 4),

(NULL, 3, 1, '2017-08-14 09:00:00', '2017-09-15 18:00:00', 'Sunken buttons',         NULL, 3, 3),


(NULL, 4, 2, '2017-08-14 09:00:00', '2017-08-15 18:00:00', 'Worn-out paint',         NULL, 1, 6),

(NULL, 5, 2, '2017-08-14 09:00:00', '2017-08-21 18:00:00', 'Worn-out paint',         NULL, 2, 2),

(NULL, 6, 2, '2017-08-14 09:00:00', '2017-09-15 18:00:00', 'Broken lights',          NULL, 3, 5),


(NULL, 12, 3, '2017-08-05 09:00:00', '2017-08-15 18:00:00', 'Worn-out paint',        NULL, 3, 3),

(NULL, 13, 3, '2017-08-14 09:00:00', '2017-08-15 18:00:00', 'Lights not working',    NULL, 1, 6),

(NULL, 14, 3, '2017-08-14 09:00:00', '2017-08-21 18:00:00', 'Rotor blade is torn',   NULL, 2, 4),

(NULL, 15, 3, '2017-08-14 09:00:00', '2017-09-15 18:00:00', 'Torn arms',             NULL, 3, 1),


(NULL, 1,  4, '2017-01-12 09:00:00', '2017-01-15 18:00:00', 'Broken glass',           '2017-01-15 18:00:00', 2, 3),

(NULL, 1,  4, '2017-03-09 09:00:00', '2017-03-11 18:00:00', 'Broken glass',           '2017-03-12 18:00:00', 2, 4),

(NULL, 1,  4, '2017-04-14 09:00:00', '2017-04-16 18:00:00', 'Broken glass',           '2017-04-16 18:00:00', 2, 3),

(NULL, 2,  4, '2017-01-03 09:00:00', '2017-01-05 18:00:00', 'Broken lights',          '2017-01-05 18:00:00', 2, 4),

(NULL, 2,  4, '2017-04-13 09:00:00', '2017-04-15 18:00:00', 'Broken lights',          '2017-04-15 18:00:00', 2, 5),

(NULL, 2,  4, '2017-05-13 09:00:00', '2017-05-25 18:00:00', 'Broken steps',           '2017-04-27 18:00:00', 3, 5),

(NULL, 3,  4, '2017-03-05 09:00:00', '2017-03-06 18:00:00', 'Disconnected handle',    '2017-03-07 18:00:00', 1, 2),

(NULL, 3,  4, '2017-04-17 09:00:00', '2017-04-28 18:00:00', 'No audio',               '2017-04-25 18:00:00', 3, 2),

(NULL, 4,  4, '2017-06-02 09:00:00', '2017-06-13 18:00:00', 'Broken stand',           '2017-02-11 18:00:00', 3, 2),

(NULL, 5,  4, '2017-02-01 09:00:00', '2017-02-09 18:00:00', 'Broken stand',           '2017-02-10 18:00:00', 2, 3),

(NULL, 5,  4, '2017-03-21 09:00:00', '2017-03-31 18:00:00', 'Broken stand',           '2017-03-30 18:00:00', 3, 5),

(NULL, 5,  4, '2017-04-14 09:00:00', '2017-04-24 18:00:00', 'Broken stand',           '2017-02-24 18:00:00', 2, 3),

(NULL, 5,  4, '2017-06-01 09:00:00', '2017-06-11 18:00:00', 'Broken stand',           '2017-06-12 18:00:00', 2, 4),

(NULL, 5,  4, '2017-07-17 09:00:00', '2017-07-28 18:00:00', 'Broken stand',           '2017-02-26 18:00:00', 3, 4),

(NULL, 6,  4, '2017-02-01 09:00:00', '2017-02-03 18:00:00', 'Broken light',           '2017-02-04 18:00:00', 2, 1),

(NULL, 6,  4, '2017-02-06 09:00:00', '2017-02-11 18:00:00', 'Unattached foam',        '2017-02-10 18:00:00', 2, 1),

(NULL, 6,  4, '2017-02-14 09:00:00', '2017-02-20 18:00:00', 'Unattached foam',        '2017-02-20 18:00:00', 2, 2),

(NULL, 6,  4, '2017-03-02 09:00:00', '2017-03-08 18:00:00', 'Unattached foam',        '2017-03-07 18:00:00', 2, 6),

(NULL, 6,  4, '2017-05-01 09:00:00', '2017-05-07 18:00:00', 'Unattached foam',        '2017-05-07 18:00:00', 2, 5),

(NULL, 6,  4, '2017-05-08 09:00:00', '2017-05-14 18:00:00', 'Unattached foam',        '2017-05-14 18:00:00', 2, 3),

(NULL, 6,  4, '2017-05-19 09:00:00', '2017-05-25 18:00:00', 'Unattached foam',        '2017-05-24 18:00:00', 2, 1),

(NULL, 6,  4, '2017-07-08 09:00:00', '2017-07-14 18:00:00', 'Unattached foam',        '2017-07-14 18:00:00', 2, 4),

(NULL, 7,  4, '2017-02-08 09:00:00', '2017-02-09 18:00:00', 'Split',                  '2017-02-10 18:00:00', 1, 2),

(NULL, 7,  4, '2017-05-15 09:00:00', '2017-05-16 18:00:00', 'Contains holes',         '2017-05-16 18:00:00', 1, 3),

(NULL, 8,  4, '2017-04-08 09:00:00', '2017-04-09 18:00:00', 'Contains holes',         '2017-04-09 18:00:00', 1, 1),
 
(NULL, 9,  4, '2017-05-09 09:00:00', '2017-05-10 18:00:00', 'Contains holes',         '2017-05-10 18:00:00', 1, 1),

(NULL, 10, 4, '2017-06-13 09:00:00', '2017-06-14 18:00:00', 'Split',                  '2017-06-14 18:00:00', 1, 1),

(NULL, 11, 4, '2017-06-09 09:00:00', '2017-06-20 18:00:00', 'Broken stand',           '2017-06-19 18:00:00', 3, 1),

(NULL, 12, 4, '2017-04-10 09:00:00', '2017-04-13 18:00:00', 'Worn out paint',         '2017-06-15 18:00:00', 2, 6),

(NULL, 13, 4, '2017-02-10 09:00:00', '2017-02-18 18:00:00', 'Broken lights',          '2017-02-16 18:00:00', 2, 5),

(NULL, 14, 4, '2017-01-13 09:00:00', '2017-01-19 18:00:00', 'Rotor not spinning',     '2017-01-22 18:00:00', 2, 3),

(NULL, 15, 4, '2017-03-09 09:00:00', '2017-03-10 18:00:00', 'Torn leg',               '2017-03-12 18:00:00', 1, 4),

(NULL, 15, 4, '2017-03-22 09:00:00', '2017-03-24 18:00:00', 'Torn leg',               '2017-03-24 18:00:00', 2, 1),

(NULL, 15, 4, '2017-07-09 09:00:00', '2017-07-11 18:00:00', 'Torn head',              '2017-06-14 18:00:00', 2, 1),

(NULL, 16, 4, '2017-05-13 09:00:00', '2017-05-17 18:00:00', 'Worn out paint',         '2017-05-16 18:00:00', 2, 1),

(NULL, 17, 4, '2017-02-11 09:00:00', '2017-02-15 18:00:00', 'Broken frame',           '2017-02-15 18:00:00', 2, 5),

(NULL, 17, 4, '2017-05-13 09:00:00', '2017-05-14 18:00:00', 'Torn picture',           '2017-05-14 18:00:00', 1, 1),

(NULL, 18, 4, '2017-07-20 09:00:00', '2017-07-25 18:00:00', 'Broken Mount',           '2017-07-25 18:00:00', 2, 5),

(NULL, 19, 4, '2017-03-10 09:00:00', '2017-03-15 18:00:00', 'Broken Mount',           '2017-03-16 18:00:00', 2, 4),

(NULL, 20, 4, '2017-05-07 09:00:00', '2017-05-11 18:00:00', 'Broken Frame',           '2017-05-12 18:00:00', 2, 1),


(NULL, 14, 5, '2017-02-02 09:00:00', '2017-02-09 18:00:00', 'Rotor not spinning',    NULL, 2, 4),

(NULL, 6,  5, '2017-05-14 09:00:00', '2017-06-01 18:00:00', 'Broken teeth',          NULL, 3, 5),

(NULL, 14, 5, '2017-05-23 09:00:00', '2017-06-01 18:00:00', 'Rotor not spinning',    NULL, 2, 4);       


-------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `REPAIRDETAILS`
VALUES

(1, 4, NULL),

(2, NULL, 3),

(3, 2, NULL),


(4, 5, NULL),

(5, 2, NULL),

(6, NULL, 4),


(7, 5, NULL), (7, 2, NULL),

(8, NULL, 4),

(9, NULL, 3),

(10, NULL, 2),


(11, NULL, 4), (12, NULL, 4), (13, NULL, 4), 

(14, 4, NULL), (15, 4, NULL), (16, NULL, 3),

(17, 2, NULL), (18, 5, NULL),

(19, NULL, 3),

(20, NULL, 3), (21, NULL, 3), (22, NULL, 3), (23, NULL, 3), (24, NULL, 3),

(25, NULL, 4), (26, 2, NULL), (27, 2, NULL), (28, 2, NULL), (29, 2, NULL), (30, 2, NULL), (31, 2, NULL), (32, 2, NULL), 

(33, 5, NULL), (34, 5, NULL), 

(35, 5, NULL), 

(36, 5, NULL), 

(37, 5, NULL), 

(38, NULL, 3),

(39, 2, NULL), (39, 9, NULL),

(40, 4, NULL), (40, 8, NULL),

(41, 5, NULL), (41, 2, NULL), (41, 10, NULL),

(42, NULL, 1), (43, NULL, 1), (44, NULL, 2),

(45, 2, NULL), (45, 9, NULL),

(46, 6, NULL), (46, 8, NULL), (47, NULL, 4),

(48, NULL, 3),

(49, NULL, 3),

(50, 6, NULL), (49, 8, NULL),


(51, 5, NULL), (50, 10, NULL),

(52, 5, NULL),

(53, 5, NULL), (52, 10, NULL);


------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `REPAIRREMARKS`
VALUES

(11, 1, 'On-time'), (12, 2, 'Late'), (13, 1, 'On-time'), 

(14, 1, 'On-time'), (15, 1, 'On-time'), (16, 2, 'Late'),

(17, 2, 'Late'), (18, 1, 'On-time'),

(19, 1, 'On-time'),

(20, 2, 'Late'), (21, 1, 'On-time'), (22, 1, 'On-time'), (23, 2, 'Late'), (24, 1, 'On-time'),

(25, 2, 'Late'), (26, 1, 'On-time'), (27, 1, 'On-time'), (28, 1, 'On-time'), (29, 1, 'On-time'), (30, 1, 'On-time'), (31, 2, 'Late'), (32, 1, 'On-time'), 

(33, 2, 'Late'), (34, 1, 'On-time'), 

(35, 1, 'On-time'), 

(36, 1, 'On-time'), 

(37, 1, 'On-time'), 

(38, 2, 'Late'),

(39, 2, 'Late'),

(40, 2, 'Late'),

(41, 2, 'Late'),

(42, 2, 'Late'), (43, 1, 'On-time'), (44, 2, 'Late'),

(45, 1, 'On-time'),

(46, 1, 'On-time'), (47, 1, 'On-time'),

(48, 1, 'On-time'),

(49, 2, 'Late'),

(50, 2, 'Late'),


(51, 3, 'Cancelled'),

(52, 3, 'Cancelled'),

(53, 3, 'Cancelled');


------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `TALLY`
VALUES
(1),(2),(3),(4),(5),(6),(7),(8),(9),(10),
(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),
(21),(22),(23),(24),(25),(26),(27),(28),(29),(30),(31);


------------------------------------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `TALLYMONTH`
VALUES
(1),(2),(3),(4),(5),(6),(7),(8),(9),(10),
(11),(12);