CREATE DEFINER=`cmpt370_rdynam`@`%` PROCEDURE `create_shifts_at_event_table`(
	IN event_name VARCHAR(100)
)
BEGIN
	
    SET @createTab=CONCAT("CREATE TABLE ", event_name, "
    (idShift SERIAL,
    shift_location VARCHAR(100),
    shift_position VARCHAR(100),
    start_Time TIME,
    end_Time TIME,
    date_Time DATE,
    number_of_volunteers INT,
    number_of_volunteers_in INT,
    number_of_volunteers_left INT,
    PRIMARY KEY (idShift))
    ");
    
    
    PREPARE stmtCreate FROM @createTab;
		
    EXECUTE stmtCreate;
    DEALLOCATE PREPARE stmtCreate;
    
	
END
