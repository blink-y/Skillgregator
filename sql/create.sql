CREATE DATABASE IF NOT EXISTS skillg;
USE skillg;

Create table IF NOT EXISTS Users (
user_id int NOT NULL AUTO_INCREMENT, 
username varchar(25), 
email varchar(25), 
password varchar(100), 
user_type varchar(20), 
PRIMARY KEY (user_id)
);

Create table IF NOT EXISTS Learners  (
learner_id int NOT NULL AUTO_INCREMENT, 
user_id int, 
full_name varchar(50), 
learning_goals MEDIUMTEXT 
current_skill_level varchar(20), 
PRIMARY KEY(learner_id), 
FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

Create table IF NOT EXISTS Educators (
educator_id int NOT NULL AUTO_INCREMENT, 
user_id int, 
education_backgroud MEDIUMTEXT, 
experience MEDIUMTEXT, 
PRIMARY KEY (educator_id), 
FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

Create table IF NOT EXISTS Admins (
adminID int NOT NULL AUTO_INCREMENT, 
user_id int, 
PRIMARY KEY (adminID), 
FOREIGN KEY (user_id) 
REFERENCES Users(user_id)
);

Create table IF NOT EXISTS Skills (
skill_id int NOT NULL AUTO_INCREMENT, 
skill_name varchar(25), 
description  MEDIUMTEXT, 
category varchar(50), 
popularity int,
PRIMARY KEY (skill_id)
);

Create table IF NOT EXISTS Teaching (
teaching_id int NOT NULL AUTO_INCREMENT, 
educator_id int, 
skill_id int, 
price decimal(7,2), 
availability DATE, 
PRIMARY KEY(teaching_id), 
FOREIGN KEY (educator_id) REFERENCES Educators(educator_id), 
FOREIGN KEY (skill_id) REFERENCES Skills(skill_id)
) ;

Create table Learning IF NOT EXISTS (
learning_id int NOT NULL AUTO_INCREMENT, 
learner_id int, 
skill_id int, 
preferred_learning_style varchar(25), 
PRIMARY KEY (learning_Id), 
FOREIGN KEY(learner_id) REFERENCES Learners(learner_id), 
FOREIGN KEY(skill_id) REFERENCES Skills(skill_id)
);

CREATE TABLE Orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  order_cost DECIMAL(10, 2),
  order_date DATE,
  user_id INT,
  user_name VARCHAR(255),
  user_email VARCHAR(255),
  user_phone VARCHAR(20),
  user_city VARCHAR(255),
  user_address VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Order_Details (
  order_id INT,
  skill_id INT,
  skill_name VARCHAR(255),
  price DECIMAL(10, 2),
  instructor VARCHAR(255),
  category VARCHAR(255)
);