CREATE USER 'proyecto'@'%' IDENTIFIED BY 'proyecto';
GRANT ALL PRIVILEGES ON `proyecto`.* TO 'proyecto'@'%';

CREATE USER 'proyecto'@'localhost' IDENTIFIED BY 'proyecto';
GRANT ALL PRIVILEGES ON `proyecto`.* TO 'proyecto'@'localhost';