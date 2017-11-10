CREATE DEFINER=`cmpt370_rdynam`@`%` PROCEDURE `create_shifts_at_event_table`(
	IN event_name VARCHAR(100)
)
BEGIN
	
    SET @createTab=CONCAT("CREATE TABLE ", event_name, "
    (idShift INT  NOT NULL AUTO_INCREMENT,
    shiftLocation VARCHAR(100),
    start_Time TIME,
    end_Time TIMES,
    date_Time DATE,
    number_of_volunteers INT,
    PRIMARY KEY (idShift))
    PRIMARY KEY (idShift))
    ");
    
    
    PREPARE stmtCreate FROM @createTab;
		
    EXECUTE stmtCreate;
    DEALLOCATE PREPARE stmtCreate;
    
	
END
