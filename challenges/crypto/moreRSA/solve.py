n=19205942852221156898699890781515241837080584135169031436636411216132202432990109911847733870225485033674983822551624507615776940025962790330420577115858894272570521751341927697606414177425469
t=19205942732194446970682334712701822784994498074481152446253604068481263884943988883269008787374871436086798878474686171293141248138816071741535636819119344134346600011388317669754142720000000
e=65537
d=pow(e,-1,t)
c=8058209183617519949213216144151488285630112551323887853601137004971852422201640612263993277619475568720819375408450196373299741266527164225922557480379608057099664017313066258293122096086406
m=pow(c,d,n)
print(bytearray.fromhex(hex(m)[2:]).decode())
