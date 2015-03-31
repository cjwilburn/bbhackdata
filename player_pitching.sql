create view PitchingBirth as
select 
m.nameFirst,
m.nameLast,
m.nameGiven,
p.yearID,
m.birthCountry,
m.birthState,
m.birthCity,
p.ERA
from scotchbox.Master m join Pitching p where m.playerID = p.playerID