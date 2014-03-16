
$schema['table'] = array(
  'fields' => array(
    'created' => array(
      'mysql_type' => 'datetime',
      'not null ' => TRUE,
      'default' => format_date(time(), 'custom', 'Y-m-d 00:00:00'),
    ),
    'updated' => array(
      'mysql_type' => 'timestamp',
      'not null' => TRUE,
    ),
  ),
  //other parts of the schema (indexes, keys...)
); 
//Automatically set created datetime for current timestamp upon insert
$query = db_query('
  CREATE TRIGGER triggername BEFORE INSERT ON tablename FOR EACH ROW BEGIN SET
    NEW.created=NOW(); END
');

//Automatically update 'updated' to current timestamp whenever a row is changed
$query = db_query('
  ALTER TABLE tablename
  MODIFY updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
');
