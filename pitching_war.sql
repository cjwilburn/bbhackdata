create view PitchingWARBirth as

select 
m.nameFirst,
m.nameLast,
m.nameGiven,
p.year_ID,
m.birthCountry,
m.birthState,
m.birthCity,
p.WAR
from scotchbox.Master m join PitcherWAR p where m.playerID = p.player_ID