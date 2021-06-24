# Website-SQL-Injection

Secured and Unsecured site demonstration using SQL Injection

PROBLEM STATEMENT:
This task is to demonstrate an insecure and secured website. We develop a web site and
demonstrate how the contents of the site can be changed by the attackers if it is http based and not secured. Then support your website by having https and demonstrate how secure the website
is.

SQL injection is a code injection technique, used to attack data-driven applications, in which diabolical SQL statements are inserted into an entry field for execution (e.g. to dump the database contents to the attacker). SQL injection must exploit a security vulnerability in an application's software, for example, when user input is either incorrectly filtered for string literal escape characters embedded in SQL statements or user input is not strongly typed and unexpectedly executed. SQL injection is mostly known as an attack vector for websites but can be used to attack any type of SQL database. SQL injection attacks allow attackers to spoof identity, tamper with existing data, cause repudiation issues such as voiding transactions or changing balances, allow the complete disclosure of all data on the system, destroy the data or make it otherwise unavailable, and become administrators of the database server.

Form
SQL injection (SQLI) was considered one of the top 10 web application vulnerabilities of 2007 and 2010 by the Open Web Application Security Project. In 2013, SQLI was rated the number one attack on the OWASP top ten. There are four main sub-classes of SQL injection:

• Classic SQLI
• Blind or Inference SQL injection
• Database management system-specific SQLI
• Compounded SQLI
• SQL injection + insufficient authentication
• SQL injection + DDoS attacks
• SQL injection + DNS hijacking
• SQL injection + XSS

This SQL code is designed to pull up the records of the specified username from its table
of users. However, if the "userName" variable is crafted in a specific way by a malicious user, the
SQL statement may do more than the code author intended. For example, setting the "userName"
variable as:
' OR '1'='1
or using comments to even block the rest of the query (there are three types of SQL comments). All three lines
have a space at the end:
' OR '1'='1' --
' OR '1'='1' {
' OR '1'='1' /\*

SQLIA is a hacking technique in which the attacker adds SQL statements through a web
application's input fields or hidden parameters to access resources. Lack of input validation in web applications causes hackers to be successful. For the following examples we will assume that a web application receives a HTTP request from a client as input and generates a SQL statement as output for the back end database server.
For example an administrator will be authenticated after typing: employee id=112 and
password=admin. Figure 1 describes a login by a malicious user exploiting SQL Injection
vulnerability.
Basically it is structured in three phases:
1.an attacker sends the malicious HTTP request to the web application
2.creates the SQL statement
3.submits the SQL statement to the back end database
