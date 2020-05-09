/* SELECT * FROM scheduling2.scheduledtimes; */

ALTER TABLE scheduling2.scheduledtimes;
	INSERT INTO scheduling2.scheduledtimes
	VALUES ('1', 'Monday', 'Wednesday', NULL, '8:00 AM', '10:00 AM', '8:00 AM', '9:00 AM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('2', 'Tuesday', 'Thursday', 'Saturday', '8:00 AM', '10:00 AM', '8:00 AM', '9:00 AM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('3', 'Monday', 'Wednesday', 'Friday', '10:00 AM', '12:00 PM', '9:00 AM', '10:00 AM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('4', 'Tuesday', 'Thursday', NULL, '10:00 AM', '12:00 PM', '9:00 AM', '11:00 AM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('5', 'Saturday', NULL, NULL, '9:00 AM', '1:00 PM', NULL, NULL, NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('6', 'Monday', 'Wednesday', 'Friday', '12:00 PM', '2:00 PM', '10:00 AM', '12:00 PM', '10:00 AM', '11:00 AM');

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('7', 'Tuesday', 'Wednesday', 'Friday', '12:00 PM', '2:00 PM', '11:00 AM', '12:00 PM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('8', 'Thursday', NULL, NULL, '11:00 AM', '4:00 PM', NULL, NULL, NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('9', 'Monday', 'Friday', 'Saturday', '2:00 PM', '4:00 PM', '12:00 PM', '2:00 PM', '1:00 PM', '2:00 PM');

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('10', 'Monday', 'Wednesday', NULL, '4:00 PM', '7:00 PM', '4:00 PM', '6:00 PM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('11', 'Monday', 'Wednesday', NULL, '7:00 PM', '9:00 PM', '6:00 PM', '8:00 PM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('12', 'Tuesday', 'Thursday', NULL, '2:00 PM', '4:00 PM', '4:00 PM', '6:00 PM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('13', 'Monday', 'Wednesday', NULL, '4:00 PM', '7:00 PM', '4:00 PM', '6:00 PM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('14', 'Monday', 'Wednesday', NULL, '7:00 PM', '9:00 PM', '6:00 PM', '8:00 PM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('15', 'Tuesday', 'Thursday', NULL, '2:00 PM', '4:00 PM', '4:00 PM', '6:00 PM', NULL, NULL);

	INSERT INTO scheduling2.scheduledtimes
	VALUES ('16', 'Tuesday', 'Thursday', NULL, '2:00 PM', '4:00 PM', '4:00 PM', '6:00 PM', NULL, NULL);
SELECT * FROM scheduling2.scheduledtimes; 

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE scheduling2.sectiondetails;
	INSERT INTO scheduling2.sectiondetails
	VALUES (1, 'F1202', 'CSC101');

	INSERT INTO scheduling2.sectiondetails
	VALUES (2, 'F1202', 'CSC101');

	INSERT INTO scheduling2.sectiondetails
	VALUES (3, 'F1202', 'CSC101');

	INSERT INTO scheduling2.sectiondetails
	VALUES (4, 'F1202', 'CSC101');

	INSERT INTO scheduling2.sectiondetails
	VALUES (5, 'F1202', 'CSC101');

	INSERT INTO scheduling2.sectiondetails
	VALUES (6, 'F1202', 'CSC350');

	INSERT INTO scheduling2.sectiondetails
	VALUES (7, 'F1202', 'CSC350');

	INSERT INTO scheduling2.sectiondetails
	VALUES (8, 'F1202', 'CSC350');

	INSERT INTO scheduling2.sectiondetails
	VALUES (9, 'F1202', 'CSC211');

	INSERT INTO scheduling2.sectiondetails
	VALUES (10, 'F1202', 'CSC211');

	INSERT INTO scheduling2.sectiondetails
	VALUES (11, 'F1202', 'CIS100');

	INSERT INTO scheduling2.sectiondetails
	VALUES (12, 'F1202', 'CIS495');

	INSERT INTO scheduling2.sectiondetails
	VALUES (13, 'M1209', 'CSC211');

	INSERT INTO scheduling2.sectiondetails
	VALUES (14, 'M204', 'CSC101');

	INSERT INTO scheduling2.sectiondetails
	VALUES (15, 'M1218', 'CIS100');

	INSERT INTO scheduling2.sectiondetails
	VALUES (16, 'M305', 'CIS495');
SELECT * FROM scheduling2.sectiondetails; 


ALTER TABLE scheduling2.coursedetails;
	INSERT INTO scheduling2.coursedetails
	VALUES ('CSC101', 2, 2);

	INSERT INTO scheduling2.coursedetails
	VALUES ('CSC350', 3, 2);

	INSERT INTO scheduling2.coursedetails
	VALUES ('CSC211', 3, 2);

	INSERT INTO scheduling2.coursedetails
	VALUES ('CIS100', 0, 4);

	INSERT INTO scheduling2.coursedetails
	VALUES ('CIS495', 2, 2);
SELECT * FROM scheduling2.coursedetails;

ALTER TABLE scheduling2.roomweek;
	INSERT INTO scheduling2.roomweek
	VALUES ('F1202', 'yes', 13, 8, 12, 10, 6, 6, 0);
    
    INSERT INTO scheduling2.roomweek
	VALUES ('M1209', 'yes', 3, 0, 2, 0, 0, 0, 0);

	INSERT INTO scheduling2.roomweek
	VALUES ('M204', 'yes', 2, 0, 2, 0, 0, 0, 0);
    
	INSERT INTO scheduling2.roomweek
	VALUES ('M1218', 'yes', 2, 2, 0, 0, 0, 0, 0);
    
	INSERT INTO scheduling2.roomweek
	VALUES ('M305', 'yes', 2, 2, 0, 0, 0, 0, 0);
SELECT * FROM scheduling2.roomweek;
