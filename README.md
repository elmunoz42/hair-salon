# _Hair Salon_

#### _Customer Relationship Manager for Hair Salon._

#### By _**Carlos Munoz Kampff**_

## Description

__


| Behavior                                              |   Input example   |  Output example |
|-------------------------------------------------------|:-----------------:|:---------------:|
| 1) User registers a new stylist.  | "Fernanda"| "Joaquin", "Fernanda" clickable list. |
| 2) User retrieves a list of stylists. | click on stylists anchor | "Joaquin", "Fernanda" clickable list. |
| 3) User retrieves an individual stylist information. | click on "Fernanda" | name:"Fernanda",id:2  |
| 4) User updates a stylist's information. | in "Joaquin" page input new_name = "J-quin"| name:"J-Quin",id:1 |
| 5) User deletes all stylists. | click delete button | "No stylists registered."|
| 6) User deletes an individual stylists. | in "Fernanda" page click terminate-stylist | "Fernanda's file has been deleted." |
| 7) User registers a new client |"Fernanda"| "Joaquin", "Fernanda" clickable list. |
| 8) User retrieves list of clients. |click on client anchor | "Joaquin", "Fernanda" clickable list.|
| 9) User retrieves an individual client information. | click on "Fernanda" | name:"Fernanda", stylist: "Fred" id:2 |
| 10) User updates a client's information. | in "Joaquin" page input new_name = "J-quin"| name:"J-Quin", id:1|
| 11) User deletes all clients. |click delete button | "No clients registered."|
| 12) User retrieves clients by their assigned stylist.| "Fred" | "Joaquin", "Fernanda"|




## Specifications


## Setup/Installation Requirements

# Database Tables Creation steps:
* _mysql> CREATE DATABASE hair_salon;_
* _mysql> USE hair_salon;_
* _mysql> CREATE TABLE stylist (name VARCHAR(255), id serial PRIMARY KEY);_
* _mysql> CREATE TABLE client (name VARCHAR(255), stylist_id INT, id serial PRIMARY KEY);_

* _Clone repository from github._
* _Initiate a php server in terminal within the project directory._
* _In Terminal run: Install composer_
* _Open localhost:8000_
* _Enjoy_

_web browser and PHP 5 are necessary to operate this _

## Known Bugs

_There are no known present at this time._

## Support and contact details

_No support._

## Technologies Used

* _PHP_
* _Silex_

### License

*MIT*

Copyright (c) 2017 **_Dan Lauby and Carlos Munoz Kampff_**
