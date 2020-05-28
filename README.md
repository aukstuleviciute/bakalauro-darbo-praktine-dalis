# Pavyzdinė aplikacija

Aplikacija naudoja Docker ir Docker Compose.

Jeigu veikimo aplinka palaiko Shell programavimą, paleidimui galima panaudoti pagalbinę komandą:

```$ ./run.sh```

Kitu atveju galima paleisti Docker Compose tiesiogiai:

```$ docker-compose up```

Po paleidimo, naudotojo sąsaja yra pasiekiama per žiniatinklio naršyklę adresu:

```http://127.0.0.1:9000/```

Šios komandus Paleidžia Apache serverio procesą su PHP 7 palaikymu. Direktorija `html` yra naudojama kaip kodo šaltinis.