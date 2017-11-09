CREATE DEFINER=`cmpt370_rdynam`@`%` PROCEDURE `create_shifts_at_event_table`(
	IN event_name VARCHAR(100)
)
BEGIN
	
    SET @createTab=CONCAT("CREATE TABLE ", event_name, "
    (idShift INT  NOT NULL AUTO_INCREMENT,
    shiftLocation VARCHAR(100),
    startTime TIME,
    end_Time TIME,
    date_time DATE,
    vol_name VARCHAR(100),
    vol_phone INT,
    vol_email VARCHAR(100),
    vol_description VARCHAR(255),
    PRIMARY KEY (idShift))
    ");
    
    
    PREPARE stmtCreate FROM @createTab;
		
    EXECUTE stmtCreate;
    DEALLOCATE PREPARE stmtCreate;
    
	
END