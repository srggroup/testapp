# SRG Test list

## Az alkalmazás leírása

Ez az egy oldalas alkalmazás egy egyszerű felhasználó-kezelés. A lista oldalon a felhasználók adatait látjuk grid elrendezésben. Az egyes embereket szerkeszteni, törölni lehet, valamint újak hozzáadása is lehetséges.
A felhasználók adatai:
* ID (id)
* Felhasználónév (username)
* E-mail cím (email)
* Név (name)
* Jelszó (password)
* Nem (gender)
* Profilkép (avatar) 

A szerkesztés és hozzáadás megoldható külön oldalak használatával is, azonban az oldalon belüli szerkesztésnek (edit-in-place) vagy pl. lightbox szerű megoldásnak jobban örülünk.

------

## A rendszeralapok egyszerű leírása

A mini alkalmazás kerete a MiniVC nevű one-file MVC keretrendszerre épül. Ennek rövid dokumentációja, valamint példája megtalálható a projekt GitHub oldalán: https://github.com/mogui/MiniVC

### Controller

Az IndexControllerben megtalálhatók az előkészített alap függvények (index, add, edit, delete). **Feladat az add, edit, delete függvények megírása**

### View

A kiiratások a layout mappában lévő fájlokban találhatók meg, melyekből a layout, és az index oldal tartalma már el van készítve (természetesen ez is módosítható). **Feladat az add, edit függvényekhez tartozó view-k elkészítése, valamint az index view módosítása szükség esetén**

### Model

A rendszerhez egy kis fájl alapú adatbázist készítettünk, hogy adatbázis-beállítással ne kelljen foglalkozni. A fájl egy *serialize*-olt tömböt tartalmaz, és a root mappában található meg *database* néven. Található itt egy *database_original* fájl is, ami felhasználható backup-ként, ha bármi probléma merülne fel. Az adatbázisban kezdetben 10 felhasználó adatai találhatók meg.

Egy egyszerű "mapping" rendszer is tartozik az adatbázishoz, ez a Model mappában található két fájl.   
A **User** class egy felhasználót reprezentál, a megfelelő getter és setter függvényekkel.    
A **Users** class maga a model, ahol megtalálhatók a mentéshez, törléshez, kereséséhez, valamint új felhasználó létrehozásához szükséges függvények. A DocBlock-okban további információk találhatók a metódusok használatával kapcsolatban.

------

## Frontend

A frontend-oldali fájlok build-eléséhez létrehoztunk egy egyszerű, alap webpack konfigurációt. A webpack-et az `npm run start` paranccsal indíthatod, `npm run build`-del pedig _production_ módban futtathatod a build-et. A konfigurációt szükség szerint teljesen személyre szabhatod, akár HMR-rel kiegészítve, ahogy kényelmes.

Nem muszáj ragaszkodnod a frontend statikus felépítéséhez, bármilyen egyedi megoldásra (pl. Vue, React app) is nyitottak vagyunk.

------

## A tesztfeladat grafikai megvalósítása:

A feladathoz tartozó anyagokat a DESIGNFILES mappában találod.

A feladat ezen része a pontosságról szól.   
A grafikai kialakítás is fontos része a feladatnak, de ennek kisebb a súlya mint a technikai résznek.   
Lehetőség szerint ami megoldható CSS használatával az azzal legyen elkészítve. (Gradient, drop shadow...)   
A betűméretek, színek font stílusok egyezését is figyeljük.   

A felhasznált betűkészletet nem csatoljuk, ezek online megtalálható, ingyenes betűkészletek. A Psd file-ból a felhasznált fontok kinyerhetőek (legalábbis a nevük). Természetesen amennyiben nem áll rendelkezésre photoshop nem lesz lehetőség a fontok pontos megismerésére, kérünk ebben az esetben ezt jelezd, de ettől függetlenül is törekedj a lehető legjobban megközelíteni a kapott képi anyagot.

Fontos a responsive kialakítás.

------

Amennyiben bármilyen technikai kérdés merül fel, írj nekünk a dev@srg.hu címre, vagy tedd fel kérdésedett itt a GitHub-on egy issue formájában.   

A feladatot további elemekkel is kiegészítheted, ezt már a kreativitásodra bízzuk. Lepj meg minket :)
