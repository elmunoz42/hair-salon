
##### Production database: hair_salon
##### Development database: hair_salon_test (identical structure)


## Table: stylist

| Field | Type                | Null | Key | Default | Extra          |
|-------|---------------------|------|-----|---------|----------------|
| name  | varchar(255)        | YES  |     | NULL    |                |
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |


## Table: client

| Field | Type                | Null | Key | Default | Extra          |
|-------|---------------------|------|-----|---------|----------------|
| name       | varchar(255)        | YES  |     | NULL    |                |
| stylist_id | int(11)             | YES  |     | NULL    |                |
| id         | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
