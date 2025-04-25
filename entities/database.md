## Data Base

CREATE DATABASE TrainTicketPhp;
USE TrainTicketPhp;

CREATE TABLE ADMIN (
    adminId INT PRIMARY KEY AUTO_INCREMENT,
    nameAdmin varchar(50) NOT NULL,
    firstNameAdmin varchar(50) NOT NULL,
    passwordAdmin varchar(50) NOT NULL
);

CREATE TABLE Train (
	trainId INT PRIMARY KEY AUTO_INCREMENT,
	nameTrain VARCHAR(50) NOT NULL,
	CapacityTrain INT NOT NULL -- Nombre total de place
);
CREATE TABLE Route (
	routeId INT PRIMARY KEY AUTO_INCREMENT,
	placeOfDeparture VARCHAR(100) NOT NULL,
	placeOfArrival VARCHAR(100) NOT NULL,
	dateLeave DATETIME,
	dateArrived DATETIME,
    delay int,
    IsActive BIT DEFAULT 1 -- 1 = Active, 0 = Terminé
);
CREATE TABLE Place (
	placeId INT PRIMARY KEY AUTO_INCREMENT,
	routeId INT,
    trainId INT,
	classePas INT   NOT NULL DEFAULT 2,
	seatNumber VARCHAR(10) NOT NULL,
    FOREIGN KEY (routeId) REFERENCES Route(routeId) ON DELETE CASCADE,
    FOREIGN KEY (trainId) REFERENCES Train(trainId) ON DELETE CASCADE,
	EstDisponible BIT DEFAULT 1, -- 1 = Libre, 0 = Occuper,
    price float
);
CREATE TABLE Passenger (
	passId INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
    firstName VARCHAR(50),
	email VARCHAR(50),
    Phone VARCHAR(20) NULL, 
	dateOfBirth date,
    passwordPassenger varchar(50) NOT NULL
);
CREATE TABLE Reservation (
    resId INT PRIMARY KEY AUTO_INCREMENT,
    passId INT,
    routeId INT,
    placeId INT,
    DateReservation DATETIME DEFAULT NOW(),
    Status INT DEFAULT 1, -- 1 : Confirmé, 0 : Annulé, 2 : Terminé
    
    -- Contraintes nommées avec syntaxe correcte
    CONSTRAINT FK_Reservation_Pass 
        FOREIGN KEY (passId) 
        REFERENCES Passenger(passId) 
        ON DELETE CASCADE,
        
    CONSTRAINT FK_Reservation_Trajet 
        FOREIGN KEY (routeId) 
        REFERENCES Route(routeId),
        
    CONSTRAINT FK_Reservation_Place 
        FOREIGN KEY (placeId) 
        REFERENCES Place(placeId)
);
CREATE TABLE Ticket (
	reference varchar(50) PRIMARY KEY NOT NULL,
    routeId INT,
    qrCode varchar(40),
    passId INT,
    placeId INT,
    FOREIGN KEY (routeId) REFERENCES Route(routeId),
    FOREIGN KEY (passId) REFERENCES Passenger(passId),
    FOREIGN KEY (placeId) REFERENCES Place(placeId)
);
-- TABLE INTERMEDIAIRE : Plusieurs trains peuvent être affectés à un trajet
CREATE TABLE TrainByRoute (
    idTBR INT PRIMARY KEY AUTO_INCREMENT,
    trainId INT,
    routeId INT,
    CONSTRAINT FK_Train_Route_Train FOREIGN KEY (trainId) REFERENCES Train(trainId) ON DELETE CASCADE,
    CONSTRAINT FK_Train_Route_Trajet FOREIGN KEY (routeId) REFERENCES Route(routeId) ON DELETE CASCADE
);