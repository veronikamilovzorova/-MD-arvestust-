# Toolivalmistamine
## Selles projektis:
### Andmetabel toolid
**Vaata minu saidi selles lingis:[toolide valmistamine](https://lucagluhhov22.thkit.ee/Content/toolivara/table3.php).**


**Loonud SQL-lause tellimuse sisestamiseks**
*(värv/toon tekstina, ja tellimiskogus).*
![lisamine](https://github.com/lkuca/Toolid-viimane-projekt/blob/main/Screenshot111.png)


~~Valminuid algul 0.~~
**Loonud käskluse mis _valmistab_ koguse suurendamiseks ühe võrra**
<sup>Loonud</sup> leht tellimusele vastava valminud koguse suurendamiseks ühe võrra.
>Valminud kogust saab suurendada vaid tellimustel,
kus kogus pole veel täis.

![suurendamine](https://github.com/lkuca/Toolid-viimane-projekt/blob/main/Screenshot222.png)


<sub>Näitasin</sub> veebilehel toolide tabeli seisu.

![ilus tool](https://github.com/lkuca/Toolid-viimane-projekt/blob/main/Screenshot.png)Märge



Eraldi lehel näita valminud tellimusi.

minu projekti värv on '#97ac9f'.
minu tööd võib leida minu saidil [Luca veebirakendused](https://lucagluhhov22.thkit.ee/).


Et teha sait/veebileht loetavaks oli vaja teha:
+ lisada ühine teemakohane kujundus kõikidele lehtede eraldi css failiga.
```
body {
    //background-image: url('office-chair-spin.gif');
    //background-color: #97ac9f;
    

    background-size: cover;
    background-repeat: no-repeat;
    
}
a, h1, h2, h3, h4, h5, h6 {
    border: 2px solid rgba(0, 0, 0, 0.5);
    padding: 3px;
    margin: 3px;
    display: inline-block;

}
#spasik{
    h1{
        background-color: #C60D2E;
    }
        
                .background-img {
    background-image: url('les.jpeg');
    }
}

#logir{

    color:#fff;
    background-color:#32373c;
    background-position: center;
    text-decoration:none;
    padding:calc(.667em + 2px) calc(1.333em + 2px);
    font-size:1.125em;
    color: #97ac9f;
    pointer-events: auto;
}
#registerModal{
    color:#fff;
    background-color:#32373c;
    background-position: center;
    text-decoration:none;
    padding:calc(.667em + 2px) calc(1.333em + 2px);
    font-size:1.125em;
    color: #97ac9f;
    pointer-events: auto;
}
form{
    color:#fff;
    background-color:#32373c;
    max-width: 320px;
    text-decoration:none;
    padding:calc(.667em + 2px) calc(1.333em + 2px);
    font-size:1.125em;
    color: #97ac9f;
    input[type=submit]{
        float:right;
    }
    pointer-events: auto;
}

select{
    background-color: #97ac9f;
    text-decoration: none;
    color: black;
}
select::selection{
    color:#000;
    background: yellow;
}
option::selection{
    color:#000;
    background: yellow;
}
input{
    background-color: #97ac9f;
    text-decoration: none;
    color: black;
}
#srss{
    background-color: #32373c;
    position: absolute;
    left: 20%;
    border: 3px;
    border: #97ac9f;
    text-decoration: none;
    color: #97ac9f;

}
#srs{
    position: fixed;
    right: 0;
    top: 0;
    
}

#srss::selection{
    color:#000;
    background: yellow;
}
#echo1{
    background-color: #32373c;

    border: 3px;
    border: #97ac9f;
    text-decoration: none;
    color: #97ac9f;
}

a:hover {
    border-color: rgba(0, 0, 0, 0.8);
}
h1{
    //background-color: #C60D2E;

    text-align: center;
    text-decoration: none;
    color: #97ac9f;
    margin-bottom: 20px;
}

a{
transition: border-color 0.3s ease;
background-color: #97ac9f;
    text-decoration:none;
    color: black;
    text-align: center;



}

a::selection{
    color:#000;
    background: yellow;
}
h1::selection{
    color:#000;
    background: yellow;
}
h3::selection{
    color:#000;
    background: yellow;
}
h2::selection{
    color:#000;
    background: yellow;
}
th::selection{
    color:#000;
    background: yellow;
}
label::selection{
    color:#000;
    background: yellow;
}
input::selection{
    color:#000;
    background: yellow;
}
table td::selection{
    color:#000;
    background: yellow;
}
th, td{
    pading: 15px;
    border-left: 1px solid #97ac9f;
    border-bottom: 1px solid #97ac9f;
    border-top: 1px solid #97ac9f;
    border-right:1px solid #97ac9f;
}


table{
    border:1px solid #97ac9f;
    
    color:#fff;
    background-color:#32373c;
    background-position: center;
    text-decoration:none;
    width: 100%;
    text-align: center;
    table-layout: fixed;
    border-radius: 1px;
    padding:calc(.667em + 2px) calc(1.333em + 2px);
    font-size:1.125em;
    color: #97ac9f;
    pointer-events: auto;
}

```
+ teha ühine navigeerimismenüü


![navigeerimismenuu](https://github.com/lkuca/Toolid-viimane-projekt/blob/main/Screenshot%202024-04-03%20000147.png))
