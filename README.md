# _Hair Salon_

#### _Customer Relationship Manager for Hair Salon._

#### By _**Carlos Munoz Kampff**_

## Description

__


| Behavior                                              |   Input example   |  Output example |
|-------------------------------------------------------|:-----------------:|:---------------:|
| 1) User registers a new stylist  | | |
| 2) User registers a new client | | |
| 3) User retrieves clients by their assigned stylist.| | |
| 4) User retrieves clients by their assigned stylist.| | |
| 5) User updates a stylists information. | | |
| 6) User updates a clients information. | | |
| 7) User deletes all stylists. | | |
| 8) User deletes all clients. | | |
| 7) User deletes an individual stylists. | | |
| 8) User deletes an individual clients. | | |



## Specifications


## Setup/Installation Requirements

# Database Tables Creation steps:
* _mysql> CREATE DATABASE hair_salon;_
* _mysql> USE hair_salon;_
* _mysql> CREATE TABLE stylist (name VARCHAR(255), id serial PRIMARY KEY);_
* _mysql> CREATE TABLE client (name VARCHAR(255), stylist_id INT, id serial PRIMARY KEY);_
* 

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
