SELECT 
    e.emailaddress
FROM 
    emails e
JOIN 
    profiles p 
ON 
    e.UserRefID = p.UserRefID
WHERE 
    p.Deceased = 0
AND 
    e.Default = 1
AND 
    e.emailaddress IN (
        SELECT emailaddress
        FROM emails
        WHERE UserRefID = e.UserRefID
        GROUP BY emailaddress
    );