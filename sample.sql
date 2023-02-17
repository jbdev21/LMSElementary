SELECT useremployment_history.employement_id as employment_id, 
    userbranchoffice_history.branchoffice_id as branch_office_id
    FROM user_master
    INNER JOIN useremployment_history ON user_master.user_id = useremployment_history.user_id
    INNER JOIN userbranchoffice_history ON user_master.user_id = userbranchoffice_history.user_id