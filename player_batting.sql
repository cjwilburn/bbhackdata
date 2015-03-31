select 
m.nameFirst,
m.nameLast,
m.nameGiven,
b.yearID,
m.birthCountry,
m.birthState,
m.birthCity,
(b.H / b.AB) as battingAVG,
((b.H + b.BB + b.HBP)/(b.AB + b.BB + b.HBP + b.SF)) as OBP,
(b.H - (b.2B + b.3B + b.HR)) as singles,
(((b.H - (b.2B + b.3B + b.HR)) + b.2B + b.3B + b.HR)/b.AB) as slugging,
(((b.H - (b.2B + b.3B + b.HR)) + b.2B + b.3B + b.HR)/b.AB) + ((b.H + b.BB + b.HBP)/(b.AB + b.BB + b.HBP + b.SF)) as OPS
from scotchbox.Master m join Batting b where m.playerID = b.playerID