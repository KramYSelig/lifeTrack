/******************************************************************************
 * Title: Exercise Tracker - Table Creation Queries
 * Author: Mark Giles
 * Last Modification: 7/27/2015
 * Date Created: 7/27/2015
 * Filename: tableCreation.sql
 * Description: This file is used to create all tables for the exercise 
 *   tracker project. The first section includes the appropriate drop table
 *   files for use during testing and database setup. Ensure that these lines
 *   stay commented out if you intend to use this code in production.
 *****************************************************************************/
/******************************************************************************
 * DROP TABLE SECTION
 * This section is used to drop tables if you need to re-create them multiple
 * times during testing. It is imperative that they remain commented out if you
 * are using this code in production.
 *****************************************************************************/
/*
DROP TABLE IF EXISTS favoritePeopleFoodItems,
                     favoritePeopleExercises,
                     exerciseLogRecords,
                     foodLogRecords,
                     locations,
                     exercises,
                     foodItems,
                     people;
*/
/******************************************************************************
 * CREATE TABLE people
 * This table contains information for users of the exercise tracker. The
 * important component is related to login information including username,
 * password, and email address.
 *****************************************************************************/
CREATE TABLE people (
  id                INT(11) NOT NULL AUTO_INCREMENT,
  username          VARCHAR(50) NOT NULL,
  password          VARCHAR(50) NOT NULL,
  email             VARCHAR(100) NOT NULL,
  fName             VARCHAR(100) NOT NULL,
  lName             VARCHAR(100) NOT NULL,
  age               INT(11),
  weight            INT(11),
  PRIMARY KEY (id),
  UNIQUE (username, password),
  UNIQUE (email)
) ENGINE=InnoDB;

/******************************************************************************
 * CREATE TABLE foodItems
 * Food items are stored here. Users can create custom food items. The creator
 * ID is tracked so a user reference to created food items can be made.
 *****************************************************************************/
CREATE TABLE foodItems (
  id                INT(11) NOT NULL AUTO_INCREMENT,
  name              VARCHAR(255) NOT NULL,
  description       TEXT(500),
  category          VARCHAR(50) NOT NULL,
  sugar             INT(11),
  carbohydrate      INT(11),
  protein           INT(11),
  fat               INT(11),
  calorie           INT(11),
  unit              VARCHAR(255),
  creatorID         INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (creatorID) REFERENCES people (ID)
) ENGINE=InnoDB;

/******************************************************************************
 * CREATE TABLE locations
 * Workout and dining locations are stored here. This is useful in the log
 * records as reports are able to produce the location and experience of events
 * recorded.
 *****************************************************************************/
CREATE TABLE locations (
  id                INT(11) NOT NULL AUTO_INCREMENT,
  name              VARCHAR(255) NOT NULL,
  description       TEXT(500),
  phoneNumber       VARCHAR(10),
  addressLine1      VARCHAR(255),
  addressLine2      VARCHAR(255),
  city              VARCHAR(50),
  category          VARCHAR(50) NOT NULL,
  postalCode        VARCHAR(5),
  state             VARCHAR(25),
  creatorID         INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (creatorID) REFERENCES people (id)
) ENGINE=InnoDB;

/******************************************************************************
 * CREATE TABLE exercises
 * Exercises can be created dynamically by the user. The creator ID is tracked
 * so a user reference to created exercises can be made.
 *****************************************************************************/
CREATE TABLE exercises (
  id                INT(11) NOT NULL AUTO_INCREMENT,
  name              VARCHAR(255) NOT NULL,
  description       TEXT(500),
  muscleGroup       VARCHAR(50) NOT NULL,
  category          VARCHAR(50) NOT NULL,
  creatorID         INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (creatorID) REFERENCES people (id)
) ENGINE=InnoDB;

/******************************************************************************
 * CREATE TABLE exerciseLogRecords
 * Records an instance of exercise for a user.
 *****************************************************************************/
CREATE TABLE exerciseLogRecords (
  personID          INT(11) NOT NULL,
  exerciseID        INT(11) NOT NULL,
  locationID        INT(11) NOT NULL,
  dateTimePerformed DATETIME NOT NULL,
  dateTimeSubmitted DATETIME NOT NULL,
  duration          INT(11),
  distance          INT(11),
  speed             INT(11),
  repetitions       INT(11),
  weight            INT(11),
  notes             TEXT,
  PRIMARY KEY (personID, exerciseID, locationID, dateTimePerformed),
  FOREIGN KEY (personID) REFERENCES people (id),
  FOREIGN KEY (exerciseID) REFERENCES exercises (id),
  FOREIGN KEY (locationID) REFERENCES locations (id)
) ENGINE=InnoDB;

/******************************************************************************
 * CREATE TABLE favoritePeopleExercises
 * Relationship table that tracks users' favorite exercises.
 *****************************************************************************/
CREATE TABLE favoritePeopleExercises (
  personID          INT(11) NOT NULL,
  exerciseID        INT(11) NOT NULL,
  PRIMARY KEY (personID, exerciseID),
  FOREIGN KEY (personID) REFERENCES people (id),
  FOREIGN KEY (exerciseID) REFERENCES foodItems (id)
) ENGINE=InnoDB;

/******************************************************************************
 * CREATE TABLE foodLogRecords
 * Records an instance of eating for a user.
 *****************************************************************************/
CREATE TABLE foodLogRecords (
  personID          INT(11) NOT NULL,
  foodID            INT(11) NOT NULL,
  locationID        INT(11) NOT NULL,
  dateTimeConsumed  DATETIME NOT NULL,
  dateTimeSubmitted DATETIME NOT NULL,
  quantity          INT(11) NOT NULL,
  notes             TEXT(500),
  PRIMARY KEY (personID, foodID, locationID, dateTimeEaten),
  FOREIGN KEY (personID) REFERENCES people (id),
  FOREIGN KEY (foodID) REFERENCES foodItems (id),
  FOREIGN KEY (locationID) REFERENCES locations (id)
) ENGINE=InnoDB;

/******************************************************************************
 * CREATE TABLE favoritePeopleFoodItems
 * Relationship table that tracks users' favorite food items.
 *****************************************************************************/
CREATE TABLE favoritePeopleFoodItems (
  personID          INT(11) NOT NULL,
  foodID            INT(11) NOT NULL,
  PRIMARY KEY (personID, foodID),
  FOREIGN KEY (personID) REFERENCES people (id),
  FOREIGN KEY (foodID) REFERENCES foodItems (id)
) ENGINE=InnoDB;