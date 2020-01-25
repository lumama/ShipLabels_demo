-- MYSQL Table for ShipLabels

--customer sales order table
--sono      sales order number
--cpo       customer po number
--custno    customer number
--sono per customer shouldn't repeat
CREATE TABLE `cust_so` (
    `sono`      INT NOT NULL,                    
    `cpo`       VARCHAR(60),
    `custno`    CHAR(5),
    `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`sono`), 
    FOREIGN KEY (`custno`) 
        REFERENCES `cust_addr`(`custno`),
    CONSTRAINT sono_line UNIQUE (`sono`,`custno`)
) ENGINE=InnoDB CHARSET=utf8;

--customer address table
CREATE TABLE `cust_addr` (
    `custno`    CHAR(5),
    `company`   VARCHAR(60),
    `address`   VARCHAR(200),
    `city`      VARCHAR(60),
    `state`     VARCHAR(2),
    `zip`       VARCHAR(10),
    `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`custno`)
) ENGINE=InnoDB CHARSET=utf8;