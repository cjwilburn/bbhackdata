create view FieldingBirth as
select 
m.nameFirst,
m.nameLast,
m.nameGiven,
f.yearID,
m.birthCountry,
m.birthState,
m.birthCity,
f.POS,
f.InnOuts,
f.PO,
f.A
from scotchbox.Master m join Fielding f where m.playerID = f.playerID