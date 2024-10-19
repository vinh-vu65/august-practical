-- Drop the database if it exists
DROP DATABASE IF EXISTS example_db;

-- Create the database
CREATE DATABASE example_db;

-- Use the database
USE example_db;


-- Create a test table
CREATE TABLE IF NOT EXISTS test (
    id INT AUTO_INCREMENT PRIMARY KEY,
    propertyType VARCHAR(255) NOT NULL,
    bedrooms INT,
    created_by int NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- INSERT statements to seed data
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('House', 3, 1);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Apartment', 2, 2);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Condo', 1, 3);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Townhouse', 4, 4);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Duplex', 2, 5);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('House', 5, 6);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Apartment', 1, 7);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Condo', 3, 8);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Townhouse', 4, 9);
INSERT INTO example_db.test (propertyType, bedrooms, created_by) VALUES ('Duplex', 2, 10);
