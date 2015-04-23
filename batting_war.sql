create view BatterWARBirth as

select 
m.nameFirst,
m.nameLast,
m.nameGiven,
b.year_ID,
m.birthCountry,
m.birthState,
m.birthCity,
b.WAR
from scotchbox.Master m join BatterWAR b where m.playerID = b.player_ID