<?php 
//ob_start(); // auf manchen Servern kann es erforderlich sein, diese Zeile zu entkommentieren
include("wdw_suche/search_config.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="de-DE">
<head>
    	<meta charset="utf-8">
    	<title>Ralf-Peter Kleinert - Suchergebnisse</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="notepad ;-)" />
    	<link rel="stylesheet" href="style.css" media="screen">
   	<link rel="stylesheet" href="style.responsive.css" media="all">
	<script src="wdw_suche/wdw_suche.js" type="text/javascript"></script>
	<script src="jquery.js"></script>
    	<script src="script.js"></script>
    	<script src="script.responsive.js"></script>  
	<title>Suchergebnisse</title>
</head>

<body>
<div id="ssr-main">
<nav class="ssr-nav">
    <ul class="ssr-hmenu"><li><a href="/" class="">Startseite</a></li><li><a href="sicherheit-dieser-website.html" class="">Sicherheit dieser Website</a></li><li><a href="sicherheit-in-der-it.html" class="">Sicherheit in der IT</a><ul class=""><li><a href="sicherheit-in-der-it/privatpersonen.html" class="">Privatpersonen</a></li><li><a href="sicherheit-in-der-it/unternehmen.html" class="">Unternehmen</a></li></ul></li><li><a href="inhaltsverzeichnis.html" class="">Inhaltsverzeichnis</a></li><li><a href="dienstleistungen.html" class="">Dienstleistungen</a><ul class=""><li><a href="dienstleistungen/hilfe-bei-computerproblemen-aller-art.html" class="">Hilfe bei Computerproblemen</a></li></ul></li><li><a href="ueber-mich.html" class="">Über mich</a></li><li><a href="kontakt.html" >Kontakt</a></li></ul> 
    </nav>
<div class="ssr-sheet clearfix">
            <div class="ssr-layout-wrapper">
                <div class="ssr-content-layout">
                    <div class="ssr-content-layout-row">
                        <div class="ssr-layout-cell ssr-content"><article class="ssr-post ssr-article">
                                                                            
                
<div id="suchform">
	<form  id="search" method="get" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"   onsubmit="return showWait();">
		<p><label for="suchbegriff">Diese Website durchsuchen:</label><br />

<input type="search" name="q" id="suchbegriff" placeholder="Suchbegriff(e)" size="14"  />
		<input type="submit" value="Los !" />
		
            <!-- der Throbber (die Warten-Grafik) http://mentalized.net/activity-indicators/ -->
            <script type="text/javascript">
            // <![CDATA[
                  document.write ('<img id="wait" height="16" width="16" src="wdw_suche/throbber3.gif" alt="bitte warten" />');
            // ]]>
            </script>

		</p>
	</form>
</div>

<div id="output">
	<?php include("wdw_suche/search.php");?>	
</div>	

</article></div>
         <div class="ssr-layout-cell ssr-sidebar1"><div class="ssr-vmenublock clearfix">
        <div class="ssr-vmenublockcontent">
<ul class="ssr-vmenu"><li><a href="linux-server.html" class="">Linux Server</a><ul class=""><li><a href="linux-server/gitlab-auf-linux-debian-11-installieren.html" class="">Gitlab auf Linux Debian 11 installieren</a></li><li><a href="linux-server/proxmox-server-absichern-und-haerten.html" class="">Proxmox Server absichern und h rten</a></li></ul></li><li><a href="webdesign.html" class="">Webdesign und Websites</a><ul class=""><li><a href="webdesign/suchmaschinenoptimierung.html" class="">Suchmaschinenoptimierung</a></li></ul></li><li><a href="video.html" class="">Video</a><ul class=""><li><a href="video/videobearbeitung-lernen.html" class="">Videobearbeitung lernen</a></li><li><a href="video/planung-in-der-videoproduktion.html" class="">Planung in der Videoproduktion</a></li><li><a href="video/videobearbeitung-mit-magix.html" class="">Videobearbeitung mit Magix</a></li></ul></li><li><a href="sicherheit-in-der-it.html" class="">Sicherheit in der IT</a><ul class=""><li><a href="sicherheit-in-der-it/privatpersonen.html" class="">Privatpersonen</a></li><li><a href="sicherheit-in-der-it/unternehmen.html" class="">Unternehmen</a></li></ul></li><li><a href="inhaltsverzeichnis.html" class="">Inhaltsverzeichnis</a></li><li><a href="social-media-manager.html" class="">Social Media Manager werden</a><ul class=""><li><a href="social-media-manager/die-aufgaben.html" class="">Aufgaben Social Media Manager</a></li><li><a href="social-media-manager/internetrecht.html" class="">Recht im Internet</a></li><li><a href="social-media-manager/die-wichtigsten-networks.html" class="">Soziale Netzwerke</a></li><li><a href="social-media-manager/analysen.html" class="">Analysen</a></li><li><a href="social-media-manager/text-und-sprache.html" class="">Sprache richtig nutzen</a></li><li><a href="social-media-manager/hashtags.html" class="">Wie nutzt du Hashtags</a></li><li><a href="social-media-manager/bildbearbeitung.html" class="">Bildbearbeitung</a></li><li><a href="social-media-manager/videobearbeitung.html" class="">Videobearbeitung nicht schwer</a></li><li><a href="social-media-manager/video-marketing.html" class="">Videomarketing richtig nutzen</a></li><li><a href="social-media-manager/datensicherheit.html" class="">Datenschutz und Datensicherheit</a></li><li><a href="social-media-manager/lehrgang.html" class="">Social Media Manager Lehrgang</a><ul class=""><li><a href="social-media-manager/lehrgang/analysen.html" class="">Analysen</a><ul class=""><li><a href="social-media-manager/lehrgang/analysen/analysen-social-media-allgemein.html" class="">Analysen SMM allgemein erkl rt</a></li><li><a href="social-media-manager/lehrgang/analysen/bestands-analyse-fuer-sm-start.html" class="">Bestands-Analyse f r SM Start</a></li><li><a href="social-media-manager/lehrgang/analysen/bestands-analyse-sm-software.html" class="">Bestands-Analyse SM Software</a></li><li><a href="social-media-manager/lehrgang/analysen/in-das-web-hineinhoeren.html" class="">In das Web hineinh ren</a></li></ul></li><li><a href="social-media-manager/lehrgang/grundlagen-1.html" class="">Grundlagen Social Media 1</a></li><li><a href="social-media-manager/lehrgang/grundlagen-2.html" class="">Grundlagen Social Media 2</a></li><li><a href="social-media-manager/lehrgang/die-prinzipien-des-web-2-0.html" class="">Prinzipien des Web 2.0</a></li><li><a href="social-media-manager/lehrgang/social-media-charakteristika.html" class="">Charakteristika Social Media</a></li><li><a href="social-media-manager/lehrgang/begriffe-social-media.html" class="">Begriffe um Social Media</a></li><li><a href="social-media-manager/lehrgang/aktuelle-top-infos.html" class="">Up to Date bleiben</a></li><li><a href="social-media-manager/lehrgang/psychologie.html" class="">Grundlagen Psychologie 1</a></li><li><a href="social-media-manager/lehrgang/psychologie-2.html" class="">Grundlagen Psychologie 2</a></li><li><a href="social-media-manager/lehrgang/psychologie-3.html" class="">Grundlagen Psychologie 3</a></li><li><a href="social-media-manager/lehrgang/state-of-social.html" class="">State of Social</a></li><li><a href="social-media-manager/lehrgang/social-media-management-prozess.html" class="">SM-Management Prozess</a></li><li><a href="social-media-manager/lehrgang/fachbegriffe-social-media-management.html" class="">Fachbegriffe Social Media Management</a></li></ul></li><li><a href="social-media-manager/strategien.html" class="">Strategien und Planung</a><ul class=""><li><a href="social-media-manager/strategien/konzept-entwickeln.html" class="">Social Media Konzept</a></li></ul></li></ul></li></ul>
               
        </div>
</div></div>
                    </div>
                </div>
            </div><footer class="ssr-footer">
<p><a href="datenschutzerklaerung.html">Datenschutzerkärung</a> | <a href="impressum.html">Impressum</a></p>
<p>Copyright © Ralf-Peter Kleinert SocialMediaKlar DIGITALeasy 2023. All Rights Reserved.</p>
</footer>
    </div>
</div>
</div>
</body>
</html>
