


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Barathon Gaulois – Lille Edition</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Polices façon BD -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet" />
<?php include 'header.php'; ?>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="../leaflet/dist/leaflet.css" />

  <style>
    /* === Palette Astérix & Obélix === */
    :root {
      --asterix-yellow:#ffd83d;
      --obelix-blue:#1e64f0;
      --gaulois-red:#d82222;
      --parchment:#fff7d0;
      --ink:#000;
      --radius:1rem;
      --shadow:3px 3px 0 var(--ink);
    }

    *{margin:0;padding:0;box-sizing:border-box}

    body{
      font-family:"Comic Neue",sans-serif;
      background:var(--parchment) radial-gradient(rgba(0,0,0,.05) 1px,transparent 1px) 0 0/6px 6px;
      color:var(--ink);display:flex;flex-direction:column;min-height:100vh;
    }

    /* === Barre de commandes compacte === */
    #controls{
      position:sticky;top:.5rem;margin:.4rem auto;padding:.5rem .9rem;
      display:flex;flex-wrap:wrap;gap:.55rem;align-items:center;justify-content:center;
      background:#fff;border:3px solid var(--ink);border-radius:var(--radius);box-shadow:var(--shadow);
      max-width:950px;
      z-index: 1000;
    }
    #controls::after{
      content:"";position:absolute;bottom:-18px;left:50px;width:0;height:0;
      border:12px solid transparent;border-top-color:#fff;border-bottom:0;margin-left:-12px;
      filter:drop-shadow(2px 2px 0 var(--ink));
    }

    select,button,input[type=number]{
      font-family:"Luckiest Guy",cursive;font-size:.85rem;letter-spacing:.3px;
      padding:.4rem .75rem;border:3px solid var(--ink);border-radius:var(--radius);
      background:var(--asterix-yellow);box-shadow:var(--shadow);cursor:pointer;transition:transform .15s;
    }
    input[type=number]{width:75px;text-align:center}
    select:focus,button:focus,input[type=number]:focus{outline:none;transform:translateY(-2px) scale(1.03)}

    .btn-start{
      background-image:repeating-linear-gradient(45deg,var(--obelix-blue)0 16px,#fff 16px 32px);
      color:#fff;text-shadow:-1px 1px 0 var(--ink);
    }
    .btn-start:hover{transform:translateY(-2px) scale(1.04)}
    .btn-reset{background:var(--gaulois-red);color:#fff;text-shadow:-1px 1px 0 var(--ink)}
    .btn-reset:hover{background:#b81818}

    /* === Carte === */
    #map{flex:1;width:100%;height:calc(100vh - 190px);border-top:3px solid var(--ink);box-shadow:inset 0 6px 0 -4px var(--ink)}

    @media(max-width:640px){
      #controls{flex-direction:column;gap:.45rem}
      #controls::after{left:50%;transform:translateX(-50%)}
      select,button,input[type=number]{width:100%}
      #map{height:calc(100vh - 280px)}
    }
  </style>
</head>
<body>
  <!-- Bulle de commandes -->
  <div id="controls">
    <label>Catégorie :</label>
    <select id="barType">
      <option value="all">Tous</option>
      <option value="wine">Vin</option>
      <option value="pub">Pubs</option>
      <option value="cocktail">Cocktails</option>
      <option value="lille">Lille</option>
    </select>

    <label>Fond :</label>
    <select id="mapTheme" onchange="changeMapTheme()">
      <option value="osm">Standard</option>
      <option value="watercolor">BD</option>
      <option value="light">Clair</option>
      <option value="dark">Sombre</option>
    </select>

    <label># bars :</label>
    <input type="number" id="barLimit" min="1" max="60" value="15" />

    <button class="btn-start" onclick="startBarathon()">Par Toutatis !</button>
    <button class="btn-reset" onclick="resetMap()">Reset</button>
  </div>

  <!-- Carte -->
  <div id="map"></div>

  <script src="../leaflet/dist/leaflet.js"></script>
  <script>
    /* ===== Clés ===== */
    const OPENTRIPMAP_KEY="5ae2e3f221c38a28845f05b6fb714a08acd29d6cf08b7c04cb69cda6";
    const ORS_KEY="5b3ce3597851110001cf624818b5e7b668b04c75bde31960cef1b853";

    /* ===== Variables ===== */
    const LILLE_CENTER=[50.62925,3.057256];
    let map,userPos,routeLayer,currentBase;
    const barMarkers=[];

    /* Tuiles */
    const baseLayers={
      osm:L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{maxZoom:19}),
      watercolor:L.tileLayer("https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.jpg",{
        maxZoom:18,subdomains:"abcd",
        attribution:"Map tiles © Stamen Design, CC BY 3.0 — Map data © OpenStreetMap"}),
      light:L.tileLayer("https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png",{maxZoom:19}),
      dark:L.tileLayer("https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png",{maxZoom:19})
    };

    /* Icônes */
    const barIcon =  L.icon({iconUrl:"../leaflet/dist/images/marker-icon.png",iconSize:[32,32],iconAnchor:[16,32]});
    const heroIcon = L.icon({iconUrl:"../leaflet/dist/images/Design sans titre (10).png",iconSize:[32,32],iconAnchor:[16,32]});

    /* Init */
    navigator.geolocation.getCurrentPosition(
      p=>{userPos=[p.coords.latitude,p.coords.longitude];setupMap(...userPos);},
      ()=>{userPos=LILLE_CENTER;setupMap(...userPos);}
    );

    function setupMap(lat,lon){
      currentBase=baseLayers.osm;
      map=L.map("map",{zoomControl:false,layers:[currentBase]}).setView([lat,lon],15);
      L.marker([lat,lon],{icon:heroIcon}).addTo(map).bindPopup("Départ").openPopup();
    }

    function changeMapTheme(){
      const theme=document.getElementById("mapTheme").value;
      if(currentBase) map.removeLayer(currentBase);
      currentBase=baseLayers[theme];currentBase.addTo(map);
    }

    /* Lancer tournée */
    function startBarathon(){
      clearAll();
      const type=document.getElementById("barType").value;
      const limit=Math.max(1,Math.min(60,parseInt(barLimit.value)||10));
      const radius=type==="lille"?5000:2500;
      const [latRef,lonRef]=type==="lille"?LILLE_CENTER:userPos;

      fetch(`https://api.opentripmap.com/0.1/en/places/radius?radius=${radius}&lon=${lonRef}&lat=${latRef}&kinds=bars&limit=${limit*6}&apikey=${OPENTRIPMAP_KEY}`)
      .then(r=>r.json()).then(d=>{
        if(!d.features) return alert("Données indispo");
        const bars=d.features.filter(f=>filterByType(f,type)).slice(0,limit);
        if(!bars.length) return alert("Aucun bar trouvé");
        drawRoute([lonRef,latRef],bars);
      });
    }

    const wineKeys=["vin","vins","wine","winebar","winery","vinicole","vinothèque","oenophilie","oenophile","barrel","cave","cellar","caves","oenologie","oenothèque","caviste","cavistes","bar a vin","bar à vin","oenobar","bodega","chateau","domaine","vignoble","grape","grapes","cru","cuvee"],
          pubKeys=["pub","public house","brewpub","taproom","tap house","brasserie","microbrasserie","beer","bier","beerhall","bierstube","alehouse","ale","tavern","gastropub","saloon","irish","celtic","barley","pint","stout","lager","ipa","porter","bar a biere","bar à bière","brew house"],
          cocktailKeys=["cocktail","cocktails","mixologue","mixologist","mixology","mixologie","speakeasy","lounge","tiki","rum","gin","vodka","tequila","whisky","whiskey","spritz","martini","negroni","mojito","daiquiri","caipirinha","aperitif","nightcap","shaker","bar à cocktail","bar a cocktail","bloody mary","cosmopolitan"];

    function hasKeyword(name, list){return list.some(k=>name.includes(k));}

    function filterByType(f,type){const n=(f.properties.name||"").toLowerCase();
      if(type==="wine")     return hasKeyword(n,wineKeys);
      if(type==="pub")      return hasKeyword(n,pubKeys);
      if(type==="cocktail") return hasKeyword(n,cocktailKeys);
      return true;
    }

    function drawRoute(start,bars){
      const coords=[[...start],...bars.map(b=>b.geometry.coordinates)];
      fetch("https://api.openrouteservice.org/v2/directions/foot-walking/geojson",{
        method:"POST",headers:{Authorization:ORS_KEY,"Content-Type":"application/json"},
        body:JSON.stringify({coordinates:coords})
      }).then(r=>r.json()).then(rt=>{
        routeLayer=L.polyline(rt.features[0].geometry.coordinates.map(c=>[c[1],c[0]]),{color:"#2563EB",weight:4}).addTo(map);
        map.fitBounds(routeLayer.getBounds());
        bars.forEach((b,i)=>{
          const [lon,lat]=b.geometry.coordinates;
          barMarkers.push(L.marker([lat,lon],{icon:barIcon}).addTo(map).bindPopup(`Étape ${i+1} : ${(b.properties.name)||"Bar"}`));
        });
      }).catch(()=>alert("Itinéraire indisponible"));
    }

    /* Reset */
    function resetMap(){
      clearAll();
      fetch(`https://api.opentripmap.com/0.1/en/places/radius?radius=2500&lon=${userPos[1]}&lat=${userPos[0]}&kinds=bars&limit=200&apikey=${OPENTRIPMAP_KEY}`)
      .then(r=>r.json()).then(d=>{if(!d.features)return;d.features.forEach(b=>{const[lon,lat]=b.geometry.coordinates;barMarkers.push(L.marker([lat,lon],{icon:heroIcon}).addTo(map).bindPopup(b.properties.name||"Bar"));});});
    }

    function clearAll(){
      if(routeLayer){map.removeLayer(routeLayer);routeLayer=null;}
      barMarkers.forEach(m=>map.removeLayer(m));barMarkers.length=0;
    }
  </script>
</body>
</html>
