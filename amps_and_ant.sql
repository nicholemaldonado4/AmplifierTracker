DROP DATABASE IF EXISTS amps_and_ant;
CREATE DATABASE amps_and_ant;

USE amps_and_ant;

DROP TABLE IF EXISTS Location;
CREATE TABLE Location(
    Location varchar(16),
    PRIMARY KEY (Location)
);

DROP TABLE IF EXISTS EquipType;
CREATE TABLE EquipType(
    Type varchar(9),
    PRIMARY KEY (TYPE)
);

DROP TABLE IF EXISTS AmpsAndAnt;
CREATE TABLE AmpsAndAnt (
    Barcode varchar(6) NOT NULL,
    StartFrequencyRange int DEFAULT 0,
    EndFrequencyRange int DEFAULT 0,
    ModelNumber varchar(20),
    Manufacturer varchar(40),
    SerialNumber int,
    Type varchar(9) NOT NULL,
    Location varchar(6) NOT NULL,
    PRIMARY KEY (Barcode),
    FOREIGN KEY (Location) REFERENCES Location(Location),
    FOREIGN KEY (Type) REFERENCES EquipType(Type)
);

DROP TABLE IF EXISTS MaintenanceCategories;
CREATE TABLE MaintenanceCategories (
    Problem varchar(10),
    PRIMARY KEY (Problem)
);

DROP TABLE IF EXISTS MaintenanceLog;
CREATE TABLE MaintenanceLog (
    LogId int NOT NULL AUTO_INCREMENT,
    Barcode varchar(6) NOT NULL,
    ProbDescription MediumText,
    DateAdded Date,
    Problem varchar(10),
    PRIMARY KEY (LogId),
    FOREIGN KEY (Problem) REFERENCES MaintenanceCategories (Problem)
);

DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
    Id int NOT NULL AUTO_INCREMENT,
    FirstName varchar(80) NOT NULL,
    LastName varchar(80) NOT NULL,
    Email varchar(80) NOT NULL,
    `Password` varchar(80) NOT NULL,
    PRIMARY KEY (Id),
    UNIQUE KEY (Email)
);

INSERT INTO Location VALUES ("A1"), ("A2"), ("A5"), ("B3"), ("B5");
INSERT INTO EquipType VALUES ("Amplifier"), ("Antenna");
INSERT INTO MaintenanceCategories VALUES ("MCat1"), ("MCat2"), ("MCat3"), ("MCat4");
INSERT INTO AmpsAndAnt (Barcode, Type, Location) VALUES ("Amp2", "Amplifier", "A2"), ("Amp3", "Amplifier", "A2"), ("Amp4", "Amplifier", "B5"), ("Amp5", "Amplifier", "A1"), ("Ant1", "Antenna", "A1"), ("Ant2", "Antenna", "A1");
INSERT INTO MaintenanceLog (Barcode, ProbDescription, DateAdded, Problem) VALUES ("Amp3", "There was a problem.", "2021-02-06", "MCat3"), ("Amp3", "ok", "2020-02-07", "MCat1"), ("Amp4", "(.?)There(.?)", "2021-02-08", "MCat2");
INSERT INTO Users (FirstName, LastName, Email, `Password`) VALUES ("Nichole", "Maldonado", "blah@gmail.com", "bananaRama");
