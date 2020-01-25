# ShipLabels_demo
Users may print labels, adjust size of the label and font.

Data are contained in two MYSQL/Mariadb tables created by sql/labelTables.sql.
- cust_so table contains sales order number, customer code, and customer purchase
order number.
- cust_addr table contains customer code and customer address
some sample data is included in /sql directory.  Please use Phpmyadmin to import
 and create tables and data.

This program requires a configuration file to run.  The file is located in 
/config/config.xml which specifies database user name, database password, 
host name, database name, and a company name. The database user must be given
at least the privilege of select.
 

 

