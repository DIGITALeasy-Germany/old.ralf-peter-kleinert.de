# Statische Website-Suche

Die Navigation öffnet `suchle.html`. `search.js` durchsucht den statischen Index `search-index.js` im Browser. PHP und ein Suchdienst sind dafür nicht erforderlich. Die relativen Links funktionieren auch bei GitHub Pages unter einem Repository-Pfad.

Die Suche unterstützt mindestens drei Zeichen, Wortbestandteile, mehrere Wörter (alle müssen vorkommen), Phrasen in geraden Anführungszeichen und Alternativen mit `oder` oder `OR`. Titel und Artikeltexte werden durchsucht; die Navigation wird nicht indiziert.

Nach Änderungen an Seiteninhalten oder nach dem Hinzufügen neuer Seiten im Projektordner ausführen:

    python build-search-index.py

Anschließend den aktualisierten `search-index.js` zusammen mit den HTML-Dateien auf GitHub übernehmen. Python wird nur für die Aktualisierung des Index benötigt, nicht zum Betrieb der Website.

Die alten PHP-Dateien werden von der neuen Suche nicht verwendet.